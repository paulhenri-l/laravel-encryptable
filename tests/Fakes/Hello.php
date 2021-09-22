<?php

namespace PaulhenriL\LaravelEncryptable\Tests\Fakes;

use Illuminate\Database\Eloquent\Model;
use PaulhenriL\LaravelEncryptable\Encryptable;

class Hello extends Model
{
    use Encryptable;
}
