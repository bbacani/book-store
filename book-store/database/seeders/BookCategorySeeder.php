<?php

namespace Database\Seeders;

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
        $bookCategories = [
            ['book_title' => 'In Search of Lost Time', 'category_name' => 'Classic Literature'],
            ['book_title' => 'In Search of Lost Time', 'category_name' => 'Philosophy'],
            ['book_title' => 'Ulysses', 'category_name' => 'Classic Literature'],
            ['book_title' => 'Ulysses', 'category_name' => 'Irish Literature'],
            ['book_title' => 'Don Quixote', 'category_name' => 'Adventure'],
            ['book_title' => 'Don Quixote', 'category_name' => 'Classic Literature'],
            ['book_title' => 'Don Quixote', 'category_name' => 'Historical Fiction'],
        ];

        foreach ($bookCategories as $category) {
            $bookId = DB::table('books')->where('book_title', $category['book_title'])->value('id');
            $categoryId = DB::table('categories')->where('category_name', $category['category_name'])->value('id');

            DB::table('book_categories')->insert([
                'book_id' => $bookId,
                'category_id' => $categoryId,
            ]);
        }
    }
}
