<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{   
    const EMAIL = 'geraldine.garcia+2@mocionsoft.com';
    const EVENT_ID = '61b3b7819a1e9c1e2c57812f';

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testGetLoginLink()
    {
        $response = $this->postJson('api/getloginlink' , ['email' => UserTest::EMAIL]);

        $response->assertStatus(200);
    }

    // /**
    //  * 
    //  */
    // public function testChangeUserPassword(){

        
    //     $response = $this->putJson('api/changeuserpassword' , ['email' => UserTest::EMAIL , 'event_id' => UserTest::EVENT_ID]);

    //     $response->assertStatus(200);
    // }
}
