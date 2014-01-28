<?php

use Illuminate\Database\Eloquent\Collection as Collection;

class UserControllerTest extends TestCase
{
    protected $user;
    protected $foundUser;
    protected $collection;

    public function setUp()
    {
        parent::setUp();

        $this->user = Mockery::mock(new User);

        $this->foundUser = Mockery::mock(new User);
        $this->foundUser->id = 1;
        $this->foundUser->username = "Alejandro";
        $this->foundUser->email = "alec_899@hotmail.com";

        $this->app->instance('User', $this->user);

    }

    public function teardown()
    {
        Mockery::close();
    }

    public function getJsonResponse()
    {
        return json_decode($this->client->getResponse()->getContent(), true);
    }

    // Prueba para el metodo index() de UserController
    public function testIndex()
    {
        $collection = new Collection();
        $collection->push($this->foundUser);

        $this->user->shouldReceive('all')
            ->once()
            ->andReturn($collection);

        $this->client->request('GET', '/admin/user');

        // De esta peticion obten la respuesta(getResponse) y despues obten el contenido(getContent)
        $response = $this->getJsonResponse();

        $this->assertResponseOk();

        // El valor que tiene debe de ser true
        $this->assertTrue($response[0]['id'] == $this->foundUser->id);
        $this->assertTrue($response[0]['username'] == $this->foundUser->username);
        $this->assertTrue($response[0]['email'] == $this->foundUser->email);
    }

    public function testStore()
    {
        $this->user->id = $this->foundUser->id;
        // Tiene que recibir save una sola vez y retornar true
        $this->user->shouldReceive('save')
            ->once()
            ->andReturn(true);

        $this->client->request('POST', 'admin/user', $this->foundUser->toArray());

        // Veo que es lo que va a guardar
        //$response = $this->getJsonResponse();
        //var_dump($response);

        //$this->assertTrue($this->user->id == $this->foundUser->id);
        $this->assertTrue($this->user->username == $this->foundUser->username);
        $this->assertTrue($this->user->email == $this->foundUser->email);
    }

    public function testShow()
    {
        $this->user->shouldReceive('find')
            ->once()
            ->with($this->foundUser->id)
            ->andReturn($this->foundUser);

        $this->client->request('GET', 'admin/user/'.$this->foundUser->id);

        $response = $this->getJsonResponse();

        $this->assertTrue($response['id'] == $this->foundUser->id);
        $this->assertTrue($response['username'] == $this->foundUser->username);
        $this->assertTrue($response['email'] == $this->foundUser->email);

    }

    public function testUpdate()
    {
        $this->user
            ->shouldReceive('find')
            ->once()
            ->with($this->foundUser->id)
            ->andReturn($this->foundUser);

        $this->foundUser
            ->shouldReceive('save')
            ->once()
            ->andReturn(true);

        $datos = array(
            'username' => 'testUser',
            'email'    => 'alez.hdz.88@gmail.com'
        );

        $this->client->request('PUT', '/admin/user/'.$this->foundUser->id, $datos);

        $this->assertTrue($this->foundUser->username == $datos['username']);
        $this->assertTrue($this->foundUser->email== $datos['email']);
    }

    public function testDestroy()
    {
        $this->user
            ->shouldReceive('find')
            ->once()
            ->with($this->foundUser->id)
            ->andReturn($this->foundUser);

        $this->foundUser
            ->shouldReceive('delete')
            ->once()
            ->andReturn(true);

        $this->client->request('DELETE', '/admin/user/'.$this->foundUser->id);
    }

} 