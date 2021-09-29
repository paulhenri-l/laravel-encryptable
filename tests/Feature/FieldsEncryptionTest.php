<?php

namespace PaulhenriL\LaravelEncryptable\Tests\Feature;

use Illuminate\Support\Facades\Crypt;
use PaulhenriL\LaravelEncryptable\Tests\Fakes\Person;
use PaulhenriL\LaravelEncryptable\Tests\TestCase;

class FieldsEncryptionTest extends TestCase
{
    public function test_fields_are_decrypted_when_needed()
    {
        $person = new Person([
            'firstname' => 'PH',
            'lastname' => 'L',
            'email' => 'ph@l.com'
        ]);

        $firstname = $person->getAttributes()['firstname'];
        $lastname = $person->getAttributes()['lastname'];
        $email = $person->getAttributes()['email'];

        $this->assertNotEquals('L', $lastname);
        $this->assertNotEquals('ph@l.com', $email);

        $this->assertEquals('PH', $firstname);
        $this->assertEquals('L', Crypt::decrypt($lastname));
        $this->assertEquals('ph@l.com', Crypt::decrypt($email));
    }

    public function test_fields_are_encrypted_when_needed()
    {
        $person = new Person([
            'lastname' => 'L',
            'email' => 'ph@l.com'
        ]);

        $this->assertNotEquals('L', $person->getAttributes()['lastname']);
        $this->assertNotEquals('ph@l.com', $person->getAttributes()['email']);

        $this->assertEquals('L', $person->lastname);
        $this->assertEquals('ph@l.com', $person->email);
    }

    public function test_null_values_are_correctly_handled()
    {
        $person = new Person();
        $person->setRawAttributes(['lastname' => null]);

        $this->assertNull($person->getAttributes()['lastname']);
        $this->assertNull($person->lastname);
    }
}
