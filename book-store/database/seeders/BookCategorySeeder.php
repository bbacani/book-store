<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bookcategorys')->insert([
            'book_id' => '1',
            'category_id' => '1',
        ]);
        
        DB::table('bookcategorys')->insert([
            'book_id' => '1',
            'category_id' => '2',
        ]);

        DB::table('bookcategorys')->insert([
            'book_id' => '2',
            'category_id' => '1',
        ]);

        DB::table('bookcategorys')->insert([
            'book_id' => '2',
            'category_id' => '3',
        ]);

        DB::table('bookcategorys')->insert([
            'book_id' => '3',
            'category_id' => '4',
        ]);

        DB::table('bookcategorys')->insert([
            'book_id' => '3',
            'category_id' => '1',
        ]);

        DB::table('bookcategorys')->insert([
            'book_id' => '3',
            'category_id' => '5',
        ]);
    }
}
