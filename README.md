This is an example of how to create a new Laravel project using composer, 
create virtual hosts for our project so we can use 'app.test' in our URL
instead of 'localhost/app/public/'. Please replace the navigations and 
project_names to your desired application. 

Open cmd (Command Prompt)
-------------------------
cd to C:/users/xampp/htdocs (server location) 

Use composer to create a new Laravel project 
--------------------------------------------
composer create-project --prefer-dist projectname version 

Create a virtual host 
---------------------
navigate to C:/users/xampp/htdocs/apache/.../vhosts file 

Create the virtual host for our Laravel project 
-----------------------------------------------
navigate to C:/users/Windows/Sys32/drivers/etc/hosts 

Add the local and new virtual host to the systems hosts file. 
-------------------------------------------------------------
127.0.0.1 localhost 
127.0.0.1 projectname 

*** Assuming setup went smoothly you can now open the project in your IDE. ***




