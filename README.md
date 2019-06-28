# tests-laravel

Running project:

1. Copy file `src/.env.example` to `src/.env`
2. `docker-compose up -d`
3. `docker exec -it laravelcuritiba-php-fpm sh -c "composer install"`
4. `docker exec -it laravelcuritiba-php-fpm sh -c "php artisan migrate"`
5. `docker exec -it laravelcuritiba-php-fpm sh -c "php artisan route:list"` to check available routes that you can access in `http://localhost`

Running tests:
1. `docker-compose exec -it laravelcuritiba-php-fpm sh -c "php ./vendor/bin/phpunit"`
