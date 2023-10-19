# Library Application

- Postman collection in "postman" folder

## Step-by-step installation guide
- Copy `.env.example` to `.env`
- Start `docker containers with docker-composer up -d --build`
- Run `docker-compose exec php-fpm composer install`
- Run `docker-compose exec php-fpm php artisan key:generate`
- Run `docker-compose exec php-fpm php artisan migrate --seed`
- Run `docker-compose exec php-fpm npm i`
- Run `docker-compose exec php-fpm npm run build`
- Go to localhost:8330
