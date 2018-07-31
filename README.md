# pluf demo

[![Build Status](https://travis-ci.org/pluf/demo.svg?branch=master)](https://travis-ci.org/pluf/demo)

The "Pluf demo project" is a simple, yet reference, pluf-based application to show how to use, develop and test complete set of pluf modules. This project amid to be a demo of total plugins and modules.

**Requirements**

PHP 7.1.3 or higher;

PDO-SQLite PHP extension enabled;

**Installation**

To download pluf demo project to your local development *server*, use either of following methods:

run following command in your terminal:

    git clone https://github.com/pluf/demo.git

Or, you can download Zip file and extract it to your desired location.


Then go to extracted folder and run 

    composer install

This installs necessary modules. If you don't have composer, look at [this link](https://getcomposer.com).

After successful completion of previous step you must provide a server that can be accomplished in varitey of ways, but most handy ways are using PHP built-in server or Apache virtual host.

*  PHP built-in server

go to the extracted folder and run:

    sudo php -S localhost:port ./index.php

*  Apache Virtual Host

In order to use Apache you must create a virtual host. *Virtual Host* refers to the practice of running more than one web site (such as company1.example.com and company2.example.com ) on a single machine. 
   
Sample Virtual Host 


    <VirtualHost *:port>
		<Directory /home/user/demo>
		        Options FollowSymLinks
		        AllowOverride All
		        Require all granted
		</Directory>
	ServerAdmin webmaster@localhost
	DocumentRoot /home/user/demo
	ErrorLog ${APACHE_LOG_DIR}/error.log
	CustomLog ${APACHE_LOG_DIR}/access.log combined
	</VirtualHost>

**Usage**

Go to `localhost:port` and you can see a simple single page application brought to you by pluf demo application.

**Issues**

You can search in other's issues or submit your own issue in [issues page](https://github.com/pluf/demo/issues). We will be glad to solve your problems related to pluf. 
