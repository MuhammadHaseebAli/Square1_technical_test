## Requirements
### The project is tested on php 7.4.3
You should have following installed on your machine (these are basic 
requirements there may be some other extensions/libraries for laravel project)
 * mysql
 * php
 * composer

##Explanation
- I have tried to develop the project in a way that I have to give minimum time and give maximum output.
- There is a polling of data from API (https://sq1-api-test.herokuapp.com/posts) After every minute.
  Ideally in this type of scenario we should make architecture in a way that we don't have to pull the data instead 
  other application should tell us that there is a new blog but if not possible we should poll after 1 hour or once 
  in a day depending upon the business requirement but in this project I am getting data after every minute for 
  testing or demo purposes.
- After polling the execution/insertion into DB is sending in a queue for scalability purposes
 
##Setup
1) Clone the repository
2) cd into the project directory
3) create .env file and give database configuration values. set QUEUE_CONNECTION=database so blogs data 
   which are getting from API should be put in queue for scalability purposes
4) run "composer update"
5) run "npm install && npm run dev"
6) run " php artisan key:gen"
7) run migrations from command "php artisan migrate"
8) create admin user using seed. run "php artisan db:seed"
9) run the project using command "php artisan serve"
10) to process the queue run "php artisan queue:work --tries=3"
11) run "php artisan schedule:work" this is for Task Schedulling and we need 
   this because we want to pull posts data
