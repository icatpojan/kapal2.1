<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userAdmin = \App\User::create([
            'name' => 'admin',
            'role' => 1,
            'username' => 'admin',
            'email' => 'admin',
            'password' => Hash::make('admin'),
        ]);
    }
}
