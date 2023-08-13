#!/usr/bin/env bash

export CURRENT_USER_ID=$(id -u)

docker-compose stop

    docker-compose rm -v
    docker-compose build --force-rm
    docker-compose up -d

set -x

docker-compose exec php composer install -o
docker-compose exec php composer dump-autoload