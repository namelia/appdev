Mobile Device Lending Project - by Nancy Amelia, Aksel Cakmak, Pierce Grannell

Setup instructions:
Configure an Apache 2.4.17 server with PHP 5.6.19, and MySQL via phpMyAdmin 4.5.1. This is easiest done using XAMPP Control Panel 3.2.2, which comes with these versions by default. Newer minor versions will likely work just as well, but it is reccomended to stay on the PHP 5.6.x branch as many PHP functions we have used do not work perfectly with PHP 7.

Open up phpMyAdmin and create a new Collation called "mobiledevicelendingproject" (no quotation marks). Once this database is selected, click "import" and select the mobiledevicelendingproject.sql file included in this folder (leave all settings as they are).

Then, put the entirety of the files from this Github repository (inside a folder called "appdev") inside the "htdocs" folder of XAMPP; other server executables will have different names but similar concepts.

Now you will be able to access the Mobile Device Lending Project via http://localhost/appdev/Combine/index.php. The default log-in information is "user@ucl.ac.uk" and the default password is "password".

Please note that if you change the login settings of the phpMyAdmin server, you will need to update these in the file "appdev/Combine/config.php".