<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_user_can_register()
    {
        $response = $this->postJson('/api/register', 
              ['name' => 'Sally', 
               'email' => 'test@test.com', 
               'password'=> '123456',
               'password_confirmation' => '123456'
            ]);

        $response
            ->assertStatus(201)
            ->assertJson([
                'user' => true,
                'token' => true,
            ]);
    }

    public function test_invalid_registration()
    {
        $response = $this->postJson('/api/register', 
            ['name' => 'Sally', 
            'email' => 'test@test.com', 
            'password'=> '123456'
        ]);

        $response
            ->assertStatus(422)
            ->assertJson([
                'errors' => true,
            ]);
            }
}