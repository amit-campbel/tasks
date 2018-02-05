# Prerequisites-

1) Apache2/nginx1.9
2) Php7(min)
3) mysql 5.5(min)
4) Composer 1.6(min)
5) Laravel 5.5

# Installation & Setup-

Laravel tasks application needs laravel 5.5 to run.
Please visit/refer below links for setup of laravel 5.5,
https://www.digitalocean.com/community/tutorials/how-to-deploy-a-laravel-application-with-nginx-on-ubuntu-16-04
https://gist.github.com/santoshachari/87bf77baeb45a65eb83b553aceb135a3
https://www.howtoforge.com/tutorial/install-laravel-on-ubuntu-for-apache/

Official url
https://laravel.com/docs/5.5#server-requirements

Once you are done with setup,
1) Download this package into your web directory
Inside directory,
2) Change permissions of bootstrap/cache and storage folder to 777
3) Copy .env.example file to .env and configure settings accordingly.
4) Run “composer update” which will pull all laravel plugins and providers to run app.
5) Run “php artisan key:generate” to generate your applications key if not created
6) Create a database my_tasks or any other name which is mentioned in .env, then Run “php artisan migrate” to establish database schema and necessary tables.
7) Run php artisan db:seed, to load few users

A bit More-
1) routes/api.php – all api routes of your application go here
2) config/local.php - holds all task related options such as status, type etc

# Usage -
http://{your domain}/api/tasks?api_token={user token} - to get all tasks
http://{your domain}/api/tasks/3/comments?api_token={user token}

more reference in routes/api.php