<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Notification;
use App\Notifications\StockRequest;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class StockTest extends TestCase
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
        ])->json('get', '/api/stock?q=aapl.us');

      $response->assertStatus(200);


    }

    public function test_bad_request()
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
        ])->json('get', '/api/stock?q=');

      $response->assertStatus(400);

    }

    public function test_bad_token()
    {

        $response = $this->json('get', '/api/stock?q=aapl.us', [
            'headers' => [
                'Authorization' => 'Bearer '. "PAAISDAOSASKDAJSDASO",
                'Accept' => 'application/json'
            ]
        ]);

        $response->assertStatus(401);
 
    }

    // public function test_mail_send()
    // {
    //     Notification::fake();

    //     $user = $this->postJson('/api/register', 
    //     ['name' => 'Sally', 
    //      'email' => 'test@test.com', 
    //      'password'=> '123456',
    //      'password_confirmation' => '123456'
    //   ]);

    //   $response = $this->withHeaders([
    //     'Authorization' => 'Bearer '. $user['token'],
    //     'Accept' => 'application/json'
    //     ])->json('get', '/api/stock?q=aapl.us');

    //     // Assert a notification was sent to the given users...
    //     Notification::assertSentTo(
    //         [$user], StockRequest::class
    //     );
    // }
}