<field-location-ext>

    <div class="uk-alert" if="{!apiready}">
        Loading maps api...
    </div>

    <div show="{apiready}">
        <div class="uk-form uk-position-relative uk-margin-small-bottom uk-width-1-1" style="z-index:1001">
            <input id="{opts.instance}" ref="autocomplete" class="uk-width-1-1" placeholder="Vous cherchez une adresse ?">
        </div>
        <div ref="map" style="min-height:300px; z-index:0;">
            Loading map...
        </div>
   </div>


    <script>

        var map, marker;

        var locale = document.documentElement.lang.toUpperCase();

        var loadApi = App.assets.require([
            'https://cdn.jsdelivr.net/npm/leaflet@1.3.1/dist/leaflet.min.css',
            'https://cdn.jsdelivr.net/npm/leaflet@1.3.1/dist/leaflet.min.js'
        ]);

        function loadGoogleApiScript(key) {            
            if(!key) {
                return;
            }
            var url = "https://maps.googleapis.com/maps/api/js?libraries=places&callback=initPlace&key="+key;
            var script = document.createElement('script');
            script.type = 'text/javascript';
            script.src = url;
            document.body.appendChild(script);
        }        


        var $this = this, defaultpos = {lat:46.2025761, lng:6.1352433};
        this.latlng = defaultpos;

        window.initPlace = function() {
            // google is loaded
        }
        function initializePlace(instance) {

            var input = document.getElementById(instance);
            var options = {
                componentRestrictions: { country: "ch" },
                fields: ["address_components", "geometry", "icon", "name"],
                strictBounds: false
            };

            $this.opts.$place = new google.maps.places.Autocomplete(input, options);

            google.maps.event.addListener($this.opts.$place, 'place_changed', function() {
                var data = $this.opts.$place.getPlace();
                if(data && data.geometry && data.geometry.location) {
                   var latlng = {
                     lat: parseFloat(data.geometry.location.lat()),
                     lng: parseFloat(data.geometry.location.lng())
                   };
                   $this.$setValue(latlng);
                   $this.marker.setLatLng(latlng).update();
                   $this.map.panTo($this.marker.getLatLng());
                }
            });

        }


        this.$updateValue = function(value) {

            if (!value || value == defaultpos) {
                value = opts.latlng || defaultpos;
            }

            if (this.latlng != value) {
                this.latlng = value;

                if (marker) {
                    marker.setLatLng([this.latlng.lat, this.latlng.lng]).update();
                    map.panTo(marker.getLatLng());
                }

                this.update();
            }

        }.bind(this);

        this.on('mount', function(event) {
            var instance = $this.opts.instance;
            loadGoogleApiScript($this.opts.token);
            loadApi.then(function() {

                $this.apiready = true;


                setTimeout(function(){

                    var map = $this.map = L.map($this.refs.map).setView([$this.latlng.lat, $this.latlng.lng], opts.zoomlevel || 13);

                    L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
                        attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
                    }).addTo(map);

                    var marker = $this.marker = new L.marker([$this.latlng.lat, $this.latlng.lng], {draggable:'true'});


                    marker.on('dragend', function(e) {
                        $this.$setValue(marker.getLatLng());
                    });

                    map.addLayer(marker);


                    initializePlace(instance)

                }, 200);

                $this.update();
            });

        });


    </script>

</field-location-ext>
