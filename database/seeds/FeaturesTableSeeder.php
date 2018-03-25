<?php

use Illuminate\Database\Seeder;
use App\Feature;
use App\Issue;

class FeaturesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Feature::class, 100)->create()->each(function ($feature) {
            $feature->issue()->save(factory(Issue::class)->make());
        });
    }
}
