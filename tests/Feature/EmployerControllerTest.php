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
     *  Should register and employer and redirect to login
     */
    public function test_should_create_user()
    {

        $response =$this->registerEmployer();

        $response->assertRedirect('login');
        $this->assertDatabaseHas('users',['email' =>$this->email]);
        $this->assertDatabaseHas('employers', ['name'=> $this->name]);

    }



    /**
     *  Should redirect to registerEmployer if something goes wrong.
     */
    public function test_should_return_bad_request()
    {
        $this->password='';

        $response =$this->registerEmployer();

        $response->assertRedirect('employer/register');
    }


    /**
     *
     * Register an user
     * @return \Illuminate\Foundation\Testing\TestResponse
     */
    private function registerEmployer()
    {
        return $this->post(route("registerEmployer"),[
            'name' => $this->name,
            'email' => $this->email,
            'password'=> $this->password,
            'password_confirmation'=>  $this->password,
            'description' => 'my big description'
        ]);
    }

}

