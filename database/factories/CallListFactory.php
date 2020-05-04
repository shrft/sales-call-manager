<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\CallList;
use Faker\Generator as Faker;

$factory->define(CallList::class, function (Faker $faker) {
    return [
        'customer_id'=>factory(App\Customer::class)->create()->id,
        'status'=>'ready'
    ];
});
