<?php

use App\Models\User;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase {

    /** @test */
    public function that_we_can_get_first_name()
    {
        $user = new User;

        $user->setFirstName('Mustafa');

        $this->assertEquals($user->getFirstName(),'Mustafa');
    }

    /** @test */
    public function that_we_can_get_last_name()
    {
        $user = new User;

        $user->setLastName('Emam');

        $this->assertEquals($user->getLastName(),'Emam');
    }

    /** @test */
    public function that_we_can_get_full_name()
    {
        $user = new User;

        $user->setFirstName('Mustafa');
        $user->setLastName('Emam');

        $this->assertEquals($user->getFullName(),'Mustafa Emam');
    }

    /** @test */
    public function that_first_name_and_last_name_are_trimmed()
    {
        $user = new User;

        $user->setFirstName("Mustafa              ");
        $user->setLastName("       Emam   ");

        $this->assertEquals($user->getFirstName(),'Mustafa');
        $this->assertEquals($user->getLastName(),'Emam');
    }

    /** @test */
    public function that_we_can_get_email(){
        $user = new User();

        $user->setEmail('mustafa@test.com');

        $this->assertEquals($user->getEmail(),'mustafa@test.com');
    }

    /** @test */
    public function that_email_variables_contains_correct_values()
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