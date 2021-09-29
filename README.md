# LaravelEncryptable

[![PHP Tests](https://github.com/paulhenri-l/laravel-encryptable/actions/workflows/php-tests.yml/badge.svg)](https://github.com/paulhenri-l/laravel-encryptable/actions/workflows/php-tests.yml)
[![PHP Code Style](https://github.com/paulhenri-l/laravel-encryptable/actions/workflows/php-code-style.yml/badge.svg)](https://github.com/paulhenri-l/laravel-encryptable/actions/workflows/php-code-style.yml)
[![License: MIT](https://img.shields.io/badge/License-MIT-blue.svg)](LICENSE)

Encrypts your model attributes in the background so that they are encrypted in DB.

## Installation

```
composer require paulhenri-l/laravel-encryptable
```

## Usage

Since encryption makes the values longer think about changing your column type 
to text.

```php
<?php

namespace App\Models;

class Person extends Illuminate\Database\Eloquent\Model
{
    use PaulhenriL\LaravelEncryptable\Encryptable;

    protected $encryptedFields = [
        'lastname',
        'email'
    ];
}

$person = new Person([
    'lastname' => 'I will be encrypted',
    'email' => 'I will be encrypted too',
]);

echo $person->lastname; // output will not be encrypted

$person->lastname = 'I will be encryted too';
```
