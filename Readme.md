# LBM-MVC 

This is not a full-featured php framework like Zend or Laravel, but a case study to show how a simple mvc framework could be set up. It is more a skeleton application than a framework and may be useful for rapid prototyping or setting up example applications. 

It is not intended to be used in production environments but for studying and experimenting purposes only. Even though there remains a lot to do. Since I am working on this project alone up to now, there won't be any support of any kind. Anyone who knows php-oop basics will quickly find his or her way through and find out if this could be of any use for him or her.

For quick prototyping and setting up demo applications you may want to have a look at the projects of panique: [TINY](https://github.com/panique/tiny), [MINI](https://github.com/panique/mini) and [HUGE](https://github.com/panique/huge). Especially the latter is more grown-up than my project, but may be over the top for some use cases.


##Installation


- copy or clone the folder structure to your web server's document root

- create the database with the sql dump supplied in the sql dir

- update the Config.php in the app dir with your database connection settings

- point your browser to *localhost/lbm-mvc/index.php* 

If all permissions are set, you should see the home page of the application.
To access the Admin or User area you need to authenticate. (Demo admin 'Admin', Password:'123', demo user: 'User', Password: '123' without quotes.)

####Optional *composer install*

LBM-MVC is a standalone application, so installation is easy and requires no external packages. However if you want to use composer to import external packages you can do so. A composer.json file is provided. To use composer's autoloader instead of the provided *Autoloader.php* remove or comment the following lines in   *index.php*:

	require 'Autoloader.php';
	
	$loader = new Psr4Autoloader();
	$loader->register();
	$loader->addNamespace('Lbm\Mvc', __DIR__.'/app');

and add this line instead:
	
	$loader = require __DIR__ . '/vendor/autoload.php';

####Optional vhost installation

If you want to run LBM-MVC in its own virtualhost, you may need to edit the URL constant in *Config.php*. (Probably to '/'). 


##Purpose

This is a demo application for the use case of a depot management system. Users can pick assets ('instruments') from a given source (db table here) and add to/edit/delete from their depot. 

Admins can manage users and 'lock' them out. That's it.

Latest feature added is the 'CMS' section. Up to now you can edit the homepage here  only. It is meant to provide the editing of content pages and add by slug. 

##Known Issues

- Basic Authentication only
There is no session handling or logout. If you are looking for a more grown-up login system, you may have a look at [HUGE](https://github.com/panique/huge).
- No error handling
- There is no change password feature implemented yet.
- Instruments cannot be edited up to now.
- No editable routing mechanism. Every route/page needs its own controller action.











