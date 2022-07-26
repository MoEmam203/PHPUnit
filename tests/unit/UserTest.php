<?php

use App\Models\User;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase {

    protected $user;

    protected function setUp() : void
    {
        $this->user = new User();
    }

    /** @test */
    public function that_we_can_get_first_name()
    {
        $this->user->setFirstName('Mustafa');

        $this->assertEquals($this->user->getFirstName(),'Mustafa');
    }

    /** @test */
    public function that_we_can_get_last_name()
    {
        $this->user->setLastName('Emam');

        $this->assertEquals($this->user->getLastName(),'Emam');
    }

    /** @test */
    public function that_we_can_get_full_name()
    {
        $this->user->setFirstName('Mustafa');
        $this->user->setLastName('Emam');

        $this->assertEquals($this->user->getFullName(),'Mustafa Emam');
    }

    /** @test */
    public function that_first_name_and_last_name_are_trimmed()
    {
        $this->user->setFirstName("Mustafa              ");
        $this->user->setLastName("       Emam   ");

        $this->assertEquals($this->user->getFirstName(),'Mustafa');
        $this->assertEquals($this->user->getLastName(),'Emam');
    }

    /** @test */
    public function that_we_can_get_email()
    {
        $this->user->setEmail('mustafa@test.com');

        $this->assertEquals($this->user->getEmail(),'mustafa@test.com');
    }

    /** @test */
    public function that_email_variables_contains_correct_values()
    {
        // set first name , last name , email 
        $this->user->setFirstName('Mustafa');
        $this->user->setLastName('Emam');
        $this->user->setEmail('mustafa@test.com');

        // get email variables
        $emailVariables = $this->user->getEmailVariables();

        // check that email variables contains full_name & email keys
        $this->assertArrayHasKey('full_name',$emailVariables);
        $this->assertArrayHasKey('email',$emailVariables);

        // check the equality of these keys to what we expected
        $this->assertEquals($emailVariables['full_name'],'Mustafa Emam');
        $this->assertEquals($emailVariables['email'],'mustafa@test.com');
    }
}