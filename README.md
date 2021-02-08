## Requirements
### The project is tested on php 7.4.3
You should have following installed on your machine (these are basic 
requirements there may be some other extensions/libraries for laravel project)
 * mysql
 * php
 * composer
 
##Setup
1) Clone the repository
2) cd into the project directory
3) create .env file and give database configration values. set QUEUE_CONNECTION=database so blogs data 
   which are getting from API should be put in queue for scalability purposes
4) run "composer update"
5) run "npm install && npm run dev"
6) run migrations from command "php artisan migrate"
7) create admin user using seed. run "php artisan db:seed"
8) run the project using command "php artisan serve"
9) to process the queue run "php artisan queue:work --tries=3"
10) run "php artisan schedule:work" this is for Task Schedulling and we need 
   this because we want to pull posts data
