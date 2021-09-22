<?php

namespace PaulhenriL\LaravelEncryptable\Tests;

use PaulhenriL\LaravelEncryptable\Tests\Concerns\ManagesDatabase;

class TestCase extends \PHPUnit\Framework\TestCase
{
    use ManagesDatabase;

    protected function setUp(): void
    {
        $this->prepareDbIfNecessary();
        $this->freshSchema();
    }
}
