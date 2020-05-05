<?php

use App\CallList;
use Illuminate\Database\Seeder;

class CallListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(CallList::class)->create();
        factory(CallList::class)->create();
        factory(CallList::class)->create();
        factory(CallList::class)->create();
        factory(CallList::class)->create();
        //
    }
}
