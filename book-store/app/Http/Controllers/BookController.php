<?php

namespace App\Http\Controllers;

use App\Models\Book;

use Illuminate\Http\Request;
use Illuminate\View\View;

class BookController extends Controller
{
    public function getBooks(): View
    {
        return view('books', [
            'books' => Book::all()
        ]);
    }
}
