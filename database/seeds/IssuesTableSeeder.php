<?php

use Illuminate\Database\Seeder;
use App\Issue;
use App\User;

class IssuesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Issue::class, 100)->create();
    }
}
