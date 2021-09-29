<?php

namespace PaulhenriL\LaravelEncryptable\Tests\Fakes;

use Illuminate\Database\Eloquent\Model;
use PaulhenriL\LaravelEncryptable\Encryptable;

class Person extends Model
{
    use Encryptable;

    protected $guarded = [];

    protected $encryptedFields = [
        'lastname',
        'email'
    ];
}
