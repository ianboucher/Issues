<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(OrganisationsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(IssuesTableSeeder::class);
    }
}
