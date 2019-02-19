This is an example of how to create a new Laravel project using composer, 
and create a virtual host for our project so we can use 'app.test' in our URL
instead of 'localhost/app/public/'. 

Please replace the navigation and project_names to your desired application. 

Open cmd (Command Prompt)
-------------------------
cd to C:/users/xampp/htdocs (server location) 

Use composer to create a new Laravel project 
--------------------------------------------
composer create-project --prefer-dist projectname version 

Create a virtual host 
---------------------
navigate to C:/users/xampp/apache/conf/vhosts/extra/httpd-vhosts.conf 
and open the file with a text editor. 

Add the virtual host to the end of the file like so:

- <VirtualHost *:80>
- ServerAdmin brad@todoapp.com
- DocumentRoot "D:/xampp/htdocs/todoapp/public"
- ServerName todoapp.test
- ErrorLog "logs/todoapp.example.local-error.log"
- CustomLog "logs/todoapp.example.local-access.log" common
- **Include VirtualHost Closing Tag Here

Insert the new virtual host into our hosts file on our system 
-----------------------------------------------
navigate to C:/users/Windows/Sys32/drivers/etc/hosts 
and open the file with a text editor. 

Add the local and new virtual host to the systems hosts file. 

127.0.0.1 localhost 
127.0.0.1 projectname.test

*** Assuming setup went smoothly you can now open the project in your IDE. ***
Your project will be created in the directory that you wrote the composer command into, 
for us this should have been C:/users/xampp/htdocs/projectname. 

We can load our webpage once we turn on the apache server using the URL: projectname.test

Useful 'php artisan' commands
----------------------------- 
php artisan make:migration create_table --create=table_name

php artisan make:migration add_to_table --table=table_name

php artisan migrate:refresh, rollback

php artisan make:controller --resource MyController

php artisan route:list

php artisan make:model Posts (- this will assume we have a table names posts. 
(- Go into the Posts.php class and create a protected variable named $table. 
(- The value of that variable will be the correct name of the table in our tb. 
