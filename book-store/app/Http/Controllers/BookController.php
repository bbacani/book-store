<?php

namespace App\Http\Controllers;

use App\Models\Book;
// use App\Models\BookCategory;
// use App\Models\Category;

use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class BookController extends Controller
{
    public function getBooks(): View
    {
        // return view('books', [
        //     'books' => Book::all(),
        //     'bookcategory' => BookCategory::all(),
        //     'category' => Category::all(),
        // ]);
        return view('books', [
            'books' => Book::all(),
            'book_categories' => DB::table('book_categories')
                ->join('books', 'book_categories.book_id', '=', 'books.id')
                ->join('categories', 'book_categories.category_id', '=', 'categories.id')
                ->select('book_categories.*', 'books.*', 'categories.category_name')
                ->get()
        ]);
    }

    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('dashboard')->with('status', 'Book has been deleted');
    }
}
