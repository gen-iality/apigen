<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{   
    const EMAIL = 'geraldine.garcia+2@mocionsoft.com';
    const EVENT_ID = '61b3b7819a1e9c1e2c57812f';
    const NAMES = 'TEST';
    const PICTURE = 'https://www.gravatar.com/avatar/00000000000000000000000000000000?d=mp&f=y';
    const PASSWORD = '123456';     
    const TOKEN = 'eyJhbGciOiJSUzI1NiIsImtpZCI6IjM1MDZmMzc1MjI0N2ZjZjk0Y2JlNWQyZDZiNTlmYThhMmJhYjFlYzIiLCJ0eXAiOiJKV1QifQ.eyJpc3MiOiJodHRwczovL3NlY3VyZXRva2VuLmdvb2dsZS5jb20vZXZpdXNhdXRoIiwiYXVkIjoiZXZpdXNhdXRoIiwiYXV0aF90aW1lIjoxNjQxOTEyMDY2LCJ1c2VyX2lkIjoiaTk3RUx0S3BtOFY3MXBIemYxR1dkVEpPVlFhMiIsInN1YiI6Imk5N0VMdEtwbThWNzFwSHpmMUdXZFRKT1ZRYTIiLCJpYXQiOjE2NDE5MTIwNjYsImV4cCI6MTY0MTkxNTY2NiwiZW1haWwiOiJnZXJhbGRpbmUuZ2FyY2lhK2RldkBtb2Npb25zb2Z0LmNvbSIsImVtYWlsX3ZlcmlmaWVkIjpmYWxzZSwiZmlyZWJhc2UiOnsiaWRlbnRpdGllcyI6eyJlbWFpbCI6WyJnZXJhbGRpbmUuZ2FyY2lhK2RldkBtb2Npb25zb2Z0LmNvbSJdfSwic2lnbl9pbl9wcm92aWRlciI6InBhc3N3b3JkIn19.BrdZp505V-2TLooovI8qxIpRk47lfdw2Vfu3vzF2Z985mSvOAV6pcwBnjl_p_7NsLCwqq2Kabh5DD-I6hLmKyFYtqK7q7D4nJN6ZMCPraXhXU8do5qi6Au7MwW_s7D4lAjosZEQUYBgJDnKp8M7O7lTqr-VIkTM--vmHnpzeGCmXgGOhTwHa3IKksYZBJvSASNcVJg5jTH2QSeEFNpuwaxPtA7egNyOKSxvHsDlePg_HDqf0L30ZBsBTufj85036relonil5C9juP8EHMeqGM1pSKpeMHAruD-KRsjRmdGa_vX0Ey4n8WSVEXhisW5FcGA4Qvzq243CnvNORCXUVug';


    /**
     * https://api.evius.co/docs/#index-its-not-posible-to-query-all-users-in-the-platform
     */
    public function testUserIndex()
    {
        $response = $this->get('api/users');
        $response->assertStatus(200);
    }

    /**
     * https://api.evius.co/docs/#store-create-new-user-and-send-confirmation-email
     */
    public function testUserStore()
    {
        $response = $this->postJson(
            `api/users/` , 
            [
                'email' => UserTest::EMAIL,
                'names' => UserTest::NAMES,
                'picture' => UserTest::PICTURE,
                'password' => UserTest::PASSWORD,

            ]
        );
    }

    /**
     * https://api.evius.co/docs/#show-view-a-specific-registered-user
     */
    public function testUserShow()
    {
        $response = $this->get(`api/users/${UserTest::USER_ID}`);
        $response->assertStatus(200);
    }

    /**
     * 
     */
    public function testUserUpdate()
    {
        $response = $this->putJson(
            `api/users/${UserTest::USER_ID}` , 
            [
                'email' => UserTest::EMAIL,
                'names' => UserTest::NAMES,
                'picture' => UserTest::PUCTURE,
                'password' => UserTest::PASSWORD,

            ]
        );
    }


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

    /**
     * 
     */
    public function testChangeUserPassword(){
        
        $response = $this->putJson('api/changeuserpassword' , ['email' => UserTest::EMAIL , 'event_id' => UserTest::EVENT_ID]);

        $response->assertStatus(200);
    }


    /**
     * https://api.evius.co/docs/#getcurrentuser-returns-current-user-information-using-valid-token-send-with-the-request
     */
    public function testGetCurrentUser()
    {
        $response = $this->get(`api/users/currentUser?evius_token=${UserTest::TOKEN}`);
        $response->assertStatus(200);
    }
}
