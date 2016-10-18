# Categorizable

Categorizable is a package for Laravel that adds the ability to categorize your models into nested categories.

## Installation

### Step 1: Composer

From the command line, run:

```
composer require programmende/laravel-categorizable
```

### Step 2: Service Provider

For your Laravel app, open `config/app.php` and, within the `providers` array, append:

```
Programmende\Commentable\CategorizableServiceProvider::class,
```

This will bootstrap the package into Laravel.

### Step 3: Migrate the database

Migrate the database to add the 'categories' table

```
php artisan migrate
```

## Usage

### The Basics

With the package now installed, you may use the provided `favoritable` trait in your models, like so:

```php
<?php

namespace App;

use Programmende\Commentable\Commentable;

class Post extends Model
{
    use commentable;

    ...
}
```
