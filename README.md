

## Description

This is a laravel project for jobsity test, the project has JWT, RabbitMQ, Unit Test and docker. 
You have to run all this scripts in order.

- Clone the repository.
- Create an .env file and copy all the data from .env.example and paste it into the .env file
- run this script to install all dockers and composer dependencies 
        docker run --rm \
            -u "$(id -u):$(id -g)" \
            -v $(pwd):/var/www/html \
            -w /var/www/html \
            laravelsail/php80-composer:latest \
            composer install --ignore-platform-reqs
- run this command to create an alias for Sail :   alias sail='[ -f sail ] && bash sail || bash vendor/bin/sail'
- run this command to star docker:  sail up -d.
- run this command to run the migrations to DB:  sail php artisan migrate
- run this command to star the queue:   sail php artisan queue:work


## ENDPOINTS

- the registration endpoint  http://0.0.0.0/api/register
- the stocks endpoint  http://0.0.0.0/api/stock?q=aapl.us
- the history endpoint  http://0.0.0.0/api/history
- you can check the email send in http://localhost:8025/#


