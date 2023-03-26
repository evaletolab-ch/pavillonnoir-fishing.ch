// version: 0.1.0

// not needed
//App.Utils.renderer['text-autocomplete'] = function(v) {
//    console.log('----DEBUG Utils.renderer.autocomplete',v);
   //return App.Utils.renderer.tags(v);
//};

<field-text-autocomplete>

    <style>

        [ref="input"][type=text] {
            padding-right: 30px !important;
            position: relative;
        }

        .field-text-container span {
            position: absolute;
            top: 50%;
            right: 0;
            font-family: monospace;
            transform: translateY(-50%) scale(.9);
        }

        .autocomplete-items {
        position: absolute;
        border: 1px solid #d4d4d4;
        border-bottom: none;
        border-top: none;
        z-index: 99;
        /*position the autocomplete items to be the same width as the container:*/
        top: 100%;
        left: 0;
        right: 0;
        }
        .autocomplete-items div {
        padding: 10px;
        cursor: pointer;
        background-color: #fff;
        border-bottom: 1px solid #d4d4d4;
        }
        .autocomplete-items div:hover {
        /*when hovering an item:*/
        background-color: #e9e9e9;
        }
        .autocomplete-active {
        /*when navigating through the items using the arrow keys:*/
        background-color: DodgerBlue !important;
        color: #ffffff;
        }        
    </style>

    <div class="uk-position-relative field-text-container">
        <input ref="input" list="datalist-{ opts.field }" class="uk-width-1-1" bind="{opts.bind}" type="{ opts.type || 'text' }" oninput="{updateLengthIndicator}" placeholder="{ opts.placeholder }">
        <span class="uk-text-muted" ref="lengthIndicator" show="{type=='text'}" hide="{opts.showCount === false}"></span>


        <datalist id="datalist-{ opts.field }">
            <option value="{ _tag }" each="{ _tag,idx in datalist }"></option>
        </datalist>
    </div>

    <div class="uk-text-muted uk-text-small uk-margin-small-top" if="{opts.slug}" title="Slug">
        { slug }
    </div>

    <script>

        var $this = this;

        this.on('mount', function() {

            var url = '/get-autocomplete/'+opts.collection+'/'+opts.field;
            //var url = '/get-autocomplete/pipo?collection='+opts.collection+'&field='+opts.field;
            // console.log('----DEBUG element',url, opts);
            //console.log('----DEBUG element',this.refs.input);
            //console.log('----DEBUG element',App.$(this.refs.input));
            App.request(url).then(function(data) {
                if (data) {
                    //console.log('----DEBUG autocomplete data',data);
                    $this.opts.autocomplete = data;
                    $this.datalist = data;
                    $this.update();
                }
            });


            this.type = opts.type || 'text';

            if (opts.cls) {
                App.$(this.refs.input).addClass(opts.cls);
            }

            if (opts.required) {
                this.refs.input.setAttribute('required', 'required');
            }

            if (opts.slug) {
                this.slug = this.$getValue(opts.bind+'_slug') || '';
            }

            (['maxlength', 'minlength', 'step', 'placeholder', 'pattern', 'size', 'min', 'max']).forEach( function(key) {
                if (opts[key]) $this.refs.input.setAttribute(key, opts[key]);
            });

            this.updateLengthIndicator();

            this.update();
        });

        this.$updateValue = function(value) {

            if (opts.slug) {
                this.slug = App.Utils.sluggify(value || '');
                this.$setValue(this.slug, false, opts.bind+'_slug');
                this.update();
            }

            this.updateLengthIndicator();

        }.bind(this);

        this.updateLengthIndicator = function() {

            if (this.type != 'text' || opts.showCount === false) {
                return;
            }

            this.refs.lengthIndicator.innerText = Math.abs((opts.maxlength || 0) - this.refs.input.value.length);
        }

    </script>
</field-text-autocomplete>
