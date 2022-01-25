#!/bin/bash

mkdir -p /vagrant/keys/ssl/api

mkdir -p /vagrant/keys/ssl/front

echo "Creates selfsigned certificates"

sudo openssl req -x509 -nodes -days 365 -newkey rsa:2048 -keyout /vagrant/keys/ssl/api/nginx-selfsigned.key -out /vagrant/keys/ssl/api/nginx-selfsigned.crt -subj "/C=GR/L=Athens/O=marinetraffic/OU=marinetraffic.test/CN=marinetraffic.test/emailAddress=info@example.test"

sudo openssl req -x509 -nodes -days 365 -newkey rsa:2048 -keyout /vagrant/keys/ssl/front/nginx-selfsigned.key -out /vagrant/keys/ssl/front/nginx-selfsigned.crt -subj "/C=GR/L=Athens/O=marinetraffic/OU=marinetraffic.test/CN=marinetraffic.test/emailAddress=info@example.test"