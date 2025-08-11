#!/bin/bash

docker-compose down
docker-compose up -d --build
docker-compose exec php_gateiro composer install
docker ps

firefox localhost:800
