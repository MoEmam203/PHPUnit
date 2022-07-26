<?php

use App\Models\User;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase {

    public function testThatWeCanGetFirstName()
    {
        $user = new User;

        $user->setFirstName('Mustafa');

        $this->assertEquals($user->getFirstName(),'Mustafa');
    }

    public function testThatWeCanGetLastName()
    {
        $user = new User;

        $user->setLastName('Emam');

        $this->assertEquals($user->getLastName(),'Emam');
    }

    public function testWeCanGetFullName()
    {
        $user = new User;

        $user->setFirstName('Mustafa');
        $user->setLastName('Emam');

        $this->assertEquals($user->getFullName(),'Mustafa Emam');
    }

    public function testFirstNameAndLastNameAreTrim()
    {
        $user = new User;

        $user->setFirstName("Mustafa              ");
        $user->setLastName("       Emam   ");

        $this->assertEquals($user->getFirstName(),'Mustafa');
        $this->assertEquals($user->getLastName(),'Emam');
    }

    public function testThatWeCanGetEmail(){
        $user = new User();

        $user->setEmail('mustafa@test.com');

        $this->assertEquals($user->getEmail(),'mustafa@test.com');
    }

    // get email variables
    public function testThatEmailVariablesContainsCorrectValues()
    {
        // set first name , last name , email 
        $user = new User();
        $user->setFirstName('Mustafa');
        $user->setLastName('Emam');
        $user->setEmail('mustafa@test.com');

        // get email variables
        $emailVariables = $user->getEmailVariables();

        // check that email variables contains full_name & email keys
        $this->assertArrayHasKey('full_name',$emailVariables);
        $this->assertArrayHasKey('email',$emailVariables);

        // check the equality of these keys to what we expected
        $this->assertEquals($emailVariables['full_name'],'Mustafa Emam');
        $this->assertEquals($emailVariables['email'],'mustafa@test.com');
    }
}