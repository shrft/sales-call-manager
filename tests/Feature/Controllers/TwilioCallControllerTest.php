<?php

namespace Tests\Feature\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TwilioCallControllerTest extends TestCase
{
    public function testNewCall(){
        $response = $this->post('/support/call', ['phoneNumber'=>'818027281252']);
        $response->assertStatus(200);

    }
}
