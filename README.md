## Arxmin - Simple Admin package for Laravel Project

Arxmin is a simple Admin package for Laravel. It simply consist of some helpers to help you to build an awesome admin for your Laravel project.

## Composer

To install Administrator as a Composer package to be used with Laravel 5, simply run:

```sh
composer require "arx/arxmin: 5.*"
```

Once it's installed, you can register the service provider in `config/app.php` in the `providers` array:

```php
'providers' => [
	'Arxmin\ArxminServiceProvider',
]
```

Then publish Administrator's assets with `php artisan vendor:publish`.

After that, you need to go to : 

$$your_url$$/arxmin/install and follow the instructions.

## Documentation

The documentation is available at www.arx.io.

### Philosophy

The Arxmin package is totally agnostic. It means that everything is separated as a module so you download only that you really needs in your Laravel Project.

The package consist of some helper to build your admin but you are free to manage your User management, Blog and Data management as you want.

Please go to Modules Tab and begin to build or explore something amazing !

### How to create/load a module ?

To create a module, you can run in your terminal : 

```sh
php artisan module:make your_module
```

Then after that you will see a modules/$$your_module$$  folder with a start.php at the begining.



#### How to add your module in the Arxmin ?

To add your module inside the admin interface.

1. You need to register the menu in your start.php file. 

Example :
 
In start.php
 
````php
Arxmin::registerMenu(array(
    'name' => 'Dashboard', # Name of your Dashboard
    'ref' => 'dashboard', # absolute ref of your module
    'type' => 'module', # type of element (by default module)
    'ico' => 'fa-home', # font-awesome icon to use
    'link' => url('/arxmin/modules/dashboard'), # the absolute module path
    'position' => 0, # the wanted position in the Admin
));
````

2. In your controller who handle your link url. You need to extend the Arxmin\ModuleController.

Example : 

````php

use Arxmin\ModuleController;

class DashboardController extends ModuleController {
	public function anyIndex()
	{
		$title = __("Dashboard example");

		$description = __("This dashboard can be customised in /modules/Dashboard");

		return $this->viewMake('dashboard::index', get_defined_vars());
	}
}

````

3. In your view, you need to extend arxmin::layouts.admin.

Example

````html
@extends('arxmin::layouts.admin')

@section('content')
	ENTER YOUR CUSTOM CONTENT
@stop
````

* Please look at the Arxmin documentation for available section.


For more information, please go to [(http://www.arx.io)](http://www.arx.io)


