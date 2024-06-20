<?php

namespace Tests\Unit;

use app\Models\Users;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;

use Tests\TestCase;

class user_test extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    // check if email is not taken
    public function test_database_email()
    {
        $userEmail='mohamed@gmail.com';
        $this->assertDatabaseMissing('users',[
            'email' => $userEmail
        ]);
    }

    public function test_register_name(){
        $response = [
            'name' => '',
            'email' => 'mohamed@gmail.com',
            'password' => 'moh123',
            'confirmpassword' => 'moh123',
        ];
        //$this->post(route('register.action'),$response)->assertSessionHasErrors(['email']);
        $this->post(route('register.action'),$response)->assertSessionDoesntHaveErrors(['name']);
    }
    public function test_register_pass(){
        $response = [
            'name' => 'mohamed',
            'email' => 'mohamed@gmail.com',
            'password' => 'moh123',
            'confirmpassword' => 'moh123',
        ];
        //$this->post(route('register.action'),$response)->assertSessionHasErrors(['email']);
        $this->post(route('register.action'),$response)->assertSessionDoesntHaveErrors();
    }
    public function test_register_email(){
        $response = [
            'name' => 'mohamed',
            'email' => 'mohamed@gmail.com',
            'password' => 'moh123',
            'confirmpassword' => 'moh123',
        ];
        //$this->post(route('register.action'),$response)->assertSessionHasErrors(['email']);
        $this->post(route('register.action'),$response)->assertSessionDoesntHaveErrors(['email']);
    }
}
