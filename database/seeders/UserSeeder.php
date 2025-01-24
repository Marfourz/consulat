<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'firstname' => "BOUKARI",
            'lastname' => "Marfourz",
            'email' => "boukarimarfourz@gmail.com",
            'password' => Hash::make('C++afond'),
            'role' => "secretary"
        ]);
    }
}
