#!/bin/bash

echo "start app..."

chmod +x /app/start.sh
chmod -R 777 storage

composer config -g repo.packagist composer https://mirrors.aliyun.com/composer/

#composer clearcache
#composer selfupdate

composer install
cp /app.env.example /app.env
php artisan key:generate