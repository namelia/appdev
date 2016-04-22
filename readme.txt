Mobile Device Lending Project - by Nancy Amelia, Aksel Cakmak, and Pierce Grannell

Setup instructions:
Configure an Apache 2.4.x server with PHP 5.6.x, and MySQL via 10.1.13-MariaDB and phpMyAdmin 4.5.x. This is easiest done using XAMPP Control Panel 3.2.x, which comes with compatible versions by default. Newer minor versions will likely work just as well for most of these, but it is reccomended to stay on the PHP 5.6.x branch as many PHP functions we have used do not work perfectly with PHP 7.

Open up phpMyAdmin and create a new Collation called "mobiledevicelendingproject" (no quotation marks). Once this database is selected, click "import" and select the mobiledevicelendingproject.sql file included in this folder (leave all settings on this page as they are).

Then, put the entirety of the files from this Github repository (inside a folder called "appdev") inside the "htdocs" folder of XAMPP; other server executables will have different names but similar concepts.

Now you will be able to access the Mobile Device Lending System via http://localhost/appdev/Combine/index.php. The default log-in information is "user@ucl.ac.uk" and the default password is "password". If you ever lose access to the system, the email is stored in plaintext in the login database and the password is hashed with PHP's default md5().

Please note that if you change the login settings of the phpMyAdmin server, you will need to update these in the file "appdev/Combine/config.php". The email mailer, meanwhile, is configured in /mailing/sendemail.php, and is currently using a generic gmail account - it is up to you whether it is worth configuring a new local email address to send from.
