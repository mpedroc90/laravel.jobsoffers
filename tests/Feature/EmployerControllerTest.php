<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EmployerControllerTest extends TestCase
{

    protected $password ='mySecurePassword123';
    protected $name = 'fake name';
    protected $email = 'fake@email.com';


    protected function setUp()
    {
        parent::setUp();
        $this->password ='mySecurePassword123';
        $this->name = 'fake name';
        $this->email = 'fake@email.com';
    }



    /**
     *  Should create_user and employer
     *
     * @return void
     */
    public function test_should_create_user()
    {

        $response =$this->registerEmployer();
        $this->assertTrue(  $response->isOk());
        $this->assertDatabaseHas('users',['email' =>$this->email]);
        $this->assertDatabaseHas('employers', ['name'=> $this->name]);

    }



    public function test_should_return_bad_request()
    {
        $this->password='';

        $response =$this->registerEmployer();

        $this->assertTrue(  $response->getStatusCode() == 400);
    }



    private function registerEmployer()
    {

        return $this->post("/employer/register",[
            'name' => $this->name,
            'email' => $this->email,
            'password'=> $this->password,
            'password_confirmation'=>  $this->password,
            'description' => 'my big description'
        ]);
    }

}

