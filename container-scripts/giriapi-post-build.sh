#!/usr/bin/env bash

FILE="/var/www/composer.json"

until test -f "$FILE";
do
    echo "Waiting for volume to mount"
done
composer install
