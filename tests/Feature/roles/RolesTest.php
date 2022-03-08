<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RolTest  extends TestCase
{
    //events/{event}/rolevents

    const EVENT_ID = '';
    const NAMES = '';
    protected $rol_id; 


    /**
     * 
     */
    public function testRolEventStore()
    {
        $response = $this->postJson(
            `api/events/${self::EVENT_ID}/rolevents` , 
            [
                'event_id' => self::EVENT_ID,
                'name' => self::NAMES
            ]
        );
        dd($response);
        $response
            ->assertStatus(201)
            ->assertJson([
                'created' => true,
            ]);
    }

    /**
     * 
     */
    public function testRolEventUpdate()
    {
        $response = $this->putJson(
            `api/events/${self::EVENT_ID}/rolevents/${$rol_id}` , 
            [
                'event_id' => self::EVENT_ID,
                'name' => self::NAMES
            ]
        );

        $response
            ->assertStatus(201)
            ->assertJson([
                'created' => true,
            ]);
    }

    /**
     * 
     */
    public function testRolEventIndex()
    {
        $response = $this->get(`api/events/${self::EVENT_ID}/rolevents`);
        $response->assertStatus(200);
    }

    /**
     * 
     */
    public function testRolEventShow()
    {
        $response = $this->get(`api/events/${self::EVENT_ID}/rolevents/${$rol_id}`);
        $response->assertStatus(200);
    }
}