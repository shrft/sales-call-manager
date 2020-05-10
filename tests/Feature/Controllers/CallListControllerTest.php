<?php

namespace Tests\Feature\Controllers;

use App\CallList;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CallListControllerTest extends TestCase
{
    use RefreshDatabase;
    public function testUpdateDetail(){
        $this->withoutExceptionHandling();

        $callList = factory(CallList::class)->create();

        $res = $this->post('call-list/' . $callList->id, [
            'note'=>'my memo',
            'phone'=>'0312345678',
            'status'=>'done'
            ]);
        $callList = $callList->fresh();
        $this->assertEquals('0312345678', $callList->customer->phone);
        $this->assertEquals('my memo', $callList->note);
        $this->assertEquals('done', $callList->status);
        $res->assertRedirect(route('cl'));
        $res = $this->followRedirects($res);
        $res->assertSee('Successfully updated.');
    }
    public function testValidateUpdateDetail(){
        // $this->withoutExceptionHandling();

        $callList = factory(CallList::class)->create();

        $res = $this->from(route('cl.dtl.updt', ['id'=>$callList->id]))->post('call-list/' . $callList->id, [
            'note'=>'my memo',
            'phone'=>'03-1234-5678',
            'status'=>'done'
            ]);
        $res->assertRedirect(route('cl.dtl.updt', ['id'=>$callList->id]));
        $res = $this->followRedirects($res);
        $res->assertSee('The phone must be a number.');
    }
}
