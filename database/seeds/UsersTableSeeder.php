<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Organisation;
use App\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class, 10)->create();

        $user = User::firstOrCreate([
            'name' => 'Dave',
            'email' => 'dave@example.com',
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10),
            'organisation_id' => Organisation::inRandomOrder()->first()->id,
        ]);

        $admin = Role::where('name', 'admin')->first();

        $user->attachRole($admin);
    }
}
