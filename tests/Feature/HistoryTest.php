<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HistoryTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_authenticate()
    {
        $user = $this->postJson('/api/register', 
        ['name' => 'Sally', 
         'email' => 'test@test.com', 
         'password'=> '123456',
         'password_confirmation' => '123456'
      ]);

      $response = $this->withHeaders([
        'Authorization' => 'Bearer '. $user['token'],
        'Accept' => 'application/json'
        ])->json('get', '/api/history');

      $response->assertStatus(200);


    }

    public function test_bad_token()
    {

        $response = $this->json('get', '/api/history', [
            'headers' => [
                'Authorization' => 'Bearer '. "PAAISDAOSASKDAJSDASO",
                'Accept' => 'application/json'
            ]
        ]);

        $response->assertStatus(401);
 
    }
}