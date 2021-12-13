<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {   
        $email = 'geraldine.garcia+2@mocionsoft.com';
        $event_id = '61b3b7819a1e9c1e2c57812f';
        
        $response = $this->putJson('api/changeuserpassword' , ['email' => $email , 'event_id' => $event_id]);

        $response->assertStatus(200);
    }
}
