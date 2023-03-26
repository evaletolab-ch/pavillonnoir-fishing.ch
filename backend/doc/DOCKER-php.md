
sudo docker ps
sudo docker exec -it [ID] /bin/bash
tail -f /var/log/apache2/error.log

sudo docker stop [ID]


# Images 
sudo docker pull [image]



# Delete all
sudo docker rm $(sudo docker ps -a -q)
sudo docker rmi $(sudo docker images -q)


# Info
- https://fr.jeffprod.com/blog/2015/lamp-sous-docker/
- https://marcit.eu/en/2021/04/28/dockerize-webserver-nginx-php8/
- https://github.com/IshtarStar/docker-compose-nginx-phpfpm
- https://github.com/khromov/alpine-nginx-php8



