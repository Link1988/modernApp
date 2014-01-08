<?php

class UserControllerTest extends TestCase
{

    public function setUp()
    {
        parent::setUp();
    }

    public function teardown()
    {

    }

    // Prueba para el metodo index() de UserController
    public function testIndex()
    {
        $this->client->request('GET', '/admin/user');
        $this->assertResponseOk();
    }

} 