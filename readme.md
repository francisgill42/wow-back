Instructions
-------------

0  git clone https://github.com/francisgill42/wow-back.git

1 php artisan key:generate

2 composer update

3 copy .env.example .env and env configuration with database

4 php artisan migrate

5 php artisan passport:install --force

6 php artisan db:seed



copy address http://localhost/wow-back/api/login (only used in postman or api tester)

user name : master@erp.com
password : secret
