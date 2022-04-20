<?php

namespace Tests;
use Faker\Generator as Faker;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;


    // public function __construct()
    // {
    //     $this->token = '';
    //     $this->email = '';
    //     $this->password = '';
    //     $this->event_id = '';
    // }
}
