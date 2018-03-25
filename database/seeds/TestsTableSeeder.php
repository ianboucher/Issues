<?php

use Illuminate\Database\Seeder;
use App\Test;
use App\Issue;

class TestsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Test::class, 100)->create()->each(function ($test) {
            $test->issue()->save(factory(Issue::class)->make());
        });
    }
}
