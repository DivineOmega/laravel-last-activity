# Laravel Last Activity
Stores the last activity time of users within your Laravel application


## Installation

To install the Laravel Last Activity package, just run
the following Composer command from the root of your
project.

```bash
composer require divineomega/laravel-last-activity
```

## Setup

This package requires you to register a global middleware
within your `app\Http\Kernel.php` file. Just add the
line below to your `$middleware` array.

```php
\DivineOmega\LaravelLastActivity\Http\Middleware\LastActivity::class,
```

You also need to add the config file and migration to your project. 
To do so, simply run the following Artisan command.

```bash
php artisan vendor:publish --provider="DivineOmega\LaravelLastActivity\ServiceProvider"
```

You can then run the provided migration to add a `last_activity` field
to your `users` table.

```bash
php artisan migrate
```

That's it. The `last_activity` field within your `users` will be
automatically updated whenever the user interacts with your application
via the web or API.

## Alternative field name

If you do not wish to use `last_activity` as the field name, this
can be changed by changing the provide migration. You will also need
to alter the configuration file  

The published configuration file for this package can be found at 
`config/last-activity.php`.

```php
<?php

return [
    
    // Field in which the last activity date time will be stored.
    'field' => 'last_activity',
    
];
```
