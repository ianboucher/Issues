<?php

use Illuminate\Database\Seeder;
use App\Bug;
use App\Issue;


class BugsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Bug::class, 100)->create()->each(function ($bug) {
            $bug->issue()->save(factory(Issue::class)->make());
        });
    }
}
