
# default testing user 


# install cockpit,

* destination directory `./cockpit`
* remove `config.yaml` file
* `cp cockpi-config.php => ./cockpit/config/`

# doc
* https://zeraton.gitlab.io/cockpit-docs/guide/api/
* https://github.com/raffaelj/cockpit-scripts/tree/master/custom-fields
* https://getcockpit.com/documentation/reference/fieldtypes
* https://discourse.getcockpit.com/
* [https://github.com/agentejo/lime](lime, a php micro web framework)
* [https://discourse.getcockpit.com/t/restrict-content-to-the-content-authors/285](restrict-content-to-the-content-authors)
* [https://discourse.getcockpit.com/t/repeater-with-collectionlink/57](repeater-with-collectionlink)
* [https://discourse.getcockpit.com/t/beginner-single-entry-read-permission/2195](beginner-single-entry-read-permission)

# install addons

* `cd cockpit`
* `git clone https://github.com/raffaelj/cockpit_ImageResize addons/ImageResize`
* `git clone https://github.com/pauloamgomes/CockpitCMS-Helpers addons/Helpers`
* `git clone https://github.com/pauloamgomes/CockpitCMS-Comments addons/Comments`
* `git clone https://github.com/pauloamgomes/CockpitCMS-Moderation addons/Moderation`
* `git clone https://github.com/MangoArt/CockpitCMSAddon-ContentValidation addons/ContentValidation`

# install docker
* https://www.digitalocean.com/community/tutorials/how-to-install-and-use-docker-on-ubuntu-20-04

# build docker image
* `source alias.sh`
* `docker build -t self/cockpit - < Dockerfile`

# docker images

* `docker images`

# run docker

* `cd backend`
* `sudo docker run -i -t -p "8080:80" -v "$PWD/cockpit/:/var/www/html"  self/cockpit:latest`

# remove images

* `sudo docker rm $(sudo docker ps -a -q)`
* `sudo docker rmi $(sudo docker images -q)`

# shell 

``` bash
docker ps
docker exec -it [ID] /bin/bash
tail -f /var/log/apache2/error.log
sudo docker stop [ID]
```
