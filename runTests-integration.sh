#!/usr/bin/env bash

docker run -d --name rabbitmq-for-tests -p="5672:5672" rabbitmq:3.6.10

## I know it's not perfect solution
## TODO: improve that
sleep 10

# how to check is working
#docker exec rabbitmq-for-tests service --status-all | grep 'rabbitmq-server' | grep '+' | wc -l

./vendor/bin/phpunit ./tests/integration

docker stop rabbitmq-for-tests
docker rm rabbitmq-for-tests
