<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('111111'),
            'is_admin' => '1',
        ]);

        DB::table('users')->insert([
            'name' => 'Test User 1',
            'email' => 'test1@gmail.com',
            'password' => Hash::make('111111'),
            'is_admin' => '0',
        ]);

        DB::table('users')->insert([
            'name' => 'Test User 2',
            'email' => 'test2@gmail.com',
            'password' => Hash::make('111111'),
            'is_admin' => '0',
        ]);

        DB::table('users')->insert([
            'name' => 'Test User 3',
            'email' => 'test3@gmail.com',
            'password' => Hash::make('111111'),
            'is_admin' => '0',
        ]);

        DB::table('users')->insert([
            'name' => 'Test User 4',
            'email' => 'test4@gmail.com',
            'password' => Hash::make('111111'),
            'is_admin' => '0',
        ]);
    }
}
