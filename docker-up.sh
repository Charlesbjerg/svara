#!/bin/bash
# Manually creates a docker container for the DB.
# Had local performance issues with mysql so using docker
# to get get around that.
docker run \
--detach \
--name=svara_mysql \
--env="MYSQL_ROOT_PASSWORD=password" \
--publish 6603:3306 \
--volume=/root/docker/svara_mysql/conf.d:/etc/mysql/conf.d \
--volume=/home/charlesbjerg/docker/mysql-data:/var/lib/mysql \
mysql
echo "Docker container created!";

docker exec -it svara_mysql > mysql --user=root --password=password --execute="DROP DATABASE svara; CREATE DATABASE svara;"
echo "Created DB for Svara";