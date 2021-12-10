<?php

namespace Tests\Feature\Http\Controllers\Auth;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ChangeUserPsswordControllerTest extends TestCase
{
    /**@test */
    public function change_user_password()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
