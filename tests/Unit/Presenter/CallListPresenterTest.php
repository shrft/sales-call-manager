<?php

namespace Tests\Unit\Presenter;

use App\CallList;
use Tests\TestCase;
use App\Presenters\CallListPresenter;

class CallListPresenterTest extends TestCase
{
    public function testStatus(){
        $callList = CallList::make();
        $callList->status='ready';
        
        $this->assertEquals('未対応', $callList->present()->statusName);
        $callList->status='done';
        $this->assertEquals('完了', $callList->present()->statusName);
    }
    
}
