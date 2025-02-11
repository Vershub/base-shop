sleep 10
php artisan migrate --force
php artisan db:seed
php artisan optimize
php-fpm
