<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{   
    
    // public function __construct()
    // {
    //     parent::__construct();
    // }

    /**
     * @group users
     */
    public function testUserStore()
    {
        factory(\App\Account::class)->create();
        // $response = $this->get('api/users');
        // $response->assertStatus(200);
    }
    // /**
    //  * Api doc:
    //  * @group users
    //  * https://api.evius.co/docs/#index-its-not-posible-to-query-all-users-in-the-platform
    //  */
    // public function testUserIndex()
    // {
    //     $response = $this->get('api/users');
    //     $response->assertStatus(200);
    // }

    // /**
    //  * https://api.evius.co/docs/#store-create-new-user-and-send-confirmation-email
    //  */
    // public function testUserStore()
    // {
    //     $response = $this->postJson(
    //         `api/users/` , 
    //         [
    //             'email' => UserTest::EMAIL,
    //             'names' => UserTest::NAMES,
    //             'picture' => UserTest::PICTURE,
    //             'password' => UserTest::PASSWORD,

    //         ]
    //     );
    // }

    // /**
    //  * https://api.evius.co/docs/#show-view-a-specific-registered-user
    //  */
    // public function testUserShow()
    // {
    //     $response = $this->get(`api/users/${UserTest::USER_ID}`);
    //     $response->assertStatus(200);
    // }

    // /**
    //  * 
    //  */
    // public function testUserUpdate()
    // {
    //     $response = $this->putJson(
    //         `api/users/${UserTest::USER_ID}` , 
    //         [
    //             'email' => UserTest::EMAIL,
    //             'names' => UserTest::NAMES,
    //             'picture' => UserTest::PUCTURE,
    //             'password' => UserTest::PASSWORD,

    //         ]
    //     );
    // }


    // /**
    //  * A basic feature test example.
    //  *
    //  * @return void
    //  */
    // public function testGetLoginLink()
    // {
    //     $response = $this->postJson('api/getloginlink' , ['email' => UserTest::EMAIL]);

    //     $response->assertStatus(200);
    // }

    // /**
    //  * 
    //  */
    // public function testChangeUserPassword(){
        
    //     $response = $this->putJson('api/changeuserpassword' , ['email' => UserTest::EMAIL , 'event_id' => UserTest::EVENT_ID]);

    //     $response->assertStatus(200);
    // }


    // /**
    //  * @group currentUser
    //  */
    // public function testGetCurrentUser()
    // {
    //     $response = $this->get(`api/users/currentUser?evius_token=${UserTest::TOKEN}`);
    //     $response->assertStatus(200);
    // }
}
