<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laracasts\Presenter\PresentableTrait;

class CallList extends Model
{
    use PresentableTrait;
    protected $presenter = 'App\Presenters\CallListPresenter';
    protected $fillable = [];

    public function customer(){
        return $this->belongsTo('App\Customer')->withDefault();
    }
}
