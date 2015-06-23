<?php

class UserTest extends TestCase 
{

    protected $user;

    public function setup()
    {
        parent::setUp();

        Artisan::call('migrate:refresh');

        $this->getInstance();

    }

    public function teardown()
    {
    }

    public function getInstance()
    {

        if(! $this->user) {
            $user = new User();
            $user->username = "asd";
            $user->email = "asd";
            $user->setPassword("asd");
            $user->save();
            $this->user = $user;
        }

        return $this->user;
    }

    public function testInstance()
    {
        $this->assertTrue($this->user->id != null);
    }

}