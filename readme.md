# Instructions

- vagrant version **2.2.19**
- virtualbox version **6.1.30**

### Add this on hosts file of your machine
- 192.168.5.10	api.marinetraffic.test marinetraffic.test

### Install vagrant plugins and start vagrant

1. vagrant plugin install vagrant-docker-compose
2. vagrant plugin install vagrant-vbguest
3. vagrant up

### Enter vbox and migrate database and test database

1. vagrant ssh
2. docker exec phpfpm php artisan migrate:refresh --seed
3. docker exec phpfpm php artisan migrate --env=testing

### On browser
- Enter api.marinetraffic.test and allow browser to trust self-signed encryption

## Use endpoint
```
https://api.marinetraffic.test/v1/vessels/get
```
### url query
1. for pagination use ```page=``` value: ```2```
2. for mmsi use ```mmsi=``` value: ```247039300,311486000```
3. for date use ```date=``` value: ```2013-07-01 13:05:00, 2013-07-01 13:07:00```
4. for lat lon range use ```geo=``` value: ```42.7517800,15.4415000,1```

## Full example url
```
https://api.marinetraffic.test/v1/vessels/get?page=2&mmsi=247039300,311486000&date=2013-07-01 13:05:00, 2013-07-01 13:07:00&geo=42.7517800,15.4415000,1
```