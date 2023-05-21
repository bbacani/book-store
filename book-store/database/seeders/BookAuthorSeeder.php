<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookAuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bookAuthors = [
            ['book_title' => 'In Search of Lost Time', 'author_name' => 'Marcel Proust'],
            ['book_title' => 'Ulysses', 'author_name' => 'James Joyce'],
            ['book_title' => 'Don Quixote', 'author_name' => 'Miguel de Cervantes'],
        ];

        foreach ($bookAuthors as $author) {
            $bookId = DB::table('books')->where('book_title', $author['book_title'])->value('id');
            $authorId = DB::table('authors')->where('author_name', $author['author_name'])->value('id');

            DB::table('book_authors')->insert([
                'book_id' => $bookId,
                'author_id' => $authorId,
            ]);
        }
    }
}
