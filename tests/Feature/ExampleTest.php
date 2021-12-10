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
        $response = $this->put('changeuserpassword' , ['email' => 'geraldine.garcia+1@mocionsoft.com']);

        $response->assertStatus(200);
    }
}
