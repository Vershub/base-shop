sleep 10
php artisan migrate --force
php artisan db:seed
php artisan storage:link
php artisan optimize:clear
php artisan optimize
php-fpm
