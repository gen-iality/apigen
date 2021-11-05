<?php

namespace Tests\Unit;

// use PHPUnit\Framework\TestCase;
use Tests\TestCase;
// models
use App\Attendee;

class EventUserTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_hide_password_all_event_user()
    {
        $response = $this->get('api/events/602ecc7d52fc536415397962/eventusers'); // dummy url
        $properties = $response['data'][2]['properties']; // select test resource
        $result = empty($properties['password']) ? true : false;
        $this->assertTrue($result);
    }
    public function test_hide_password_event_user()
    {
        $response = $this->get('api/events/602ecc7d52fc536415397962/eventusers/61829d5cc936090c981a0e73'); // dummy url
        $properties = $response['properties'];
        $result = empty($properties['password']) ? true : false;
        $this->assertTrue($result);
    }
}
