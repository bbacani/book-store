<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'category_name' => 'Classic Literature',
        ]);

        DB::table('categories')->insert([
            'category_name' => 'Philosophy',
        ]);

        DB::table('categories')->insert([
            'category_name' => 'Irish Literature',
        ]);

        DB::table('categories')->insert([
            'category_name' => 'Adventure',
        ]);

        DB::table('categories')->insert([
            'category_name' => 'Historical Fiction',
        ]);

        DB::table('categories')->insert([
            'category_name' => 'Fantasy',
        ]);

        DB::table('categories')->insert([
            'category_name' => 'Latin American',
        ]);

        DB::table('categories')->insert([
            'category_name' => 'Romance',
        ]);
    }
}
