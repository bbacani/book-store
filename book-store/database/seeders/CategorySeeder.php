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
        DB::table('categorys')->insert([
            'category_name' => 'Classic Literature',
        ]);

        DB::table('categorys')->insert([
            'category_name' => 'Philosophy',
        ]);

        DB::table('categorys')->insert([
            'category_name' => 'Irish Literature',
        ]);

        DB::table('categorys')->insert([
            'category_name' => 'Adventure',
        ]);

        DB::table('categorys')->insert([
            'category_name' => 'Historical Fiction',
        ]);

        DB::table('categorys')->insert([
            'category_name' => 'Fantasy',
        ]);

        DB::table('categorys')->insert([
            'category_name' => 'Latin American',
        ]);

        DB::table('categorys')->insert([
            'category_name' => 'Romance',
        ]);
    }
}
