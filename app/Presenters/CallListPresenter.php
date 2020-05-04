<?php

namespace App\Presenters;

use Laracasts\Presenter\Presenter;

class CallListPresenter extends Presenter
{

    public function statusName()
    {
        $names = [
            'ready'=>'未対応',
            'hold'=>'保留',
            'done'=>'完了'
        ];
        return $names[$this->status];
    }
}
