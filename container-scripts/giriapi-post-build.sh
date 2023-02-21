#!/bin/bash

cd /var/www

#only migrate after db is up
while [[ $(nmap -p 3306 db | grep open) == '' ]]
do
    sleep 2
done

php artisan migrate
