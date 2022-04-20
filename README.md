1. git clone https://github.com/jasmineNik/movies.git
2. composer install
3. copy .env.example to .env
4. php artisan key:generate
5. php artisan migrate
6. php artisan db:seed --class=MovieSeeder
7. php artisan serve
