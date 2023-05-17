<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    public function index(Request $request): View
    {
        $query = Book::query();

        if ($request->has('category')) {
            $query->whereHas('categories', function ($q) use ($request) {
                $q->where('id', $request->category);
            });
        }

        $books = $query->get();
        $categories = Category::all();

        return view('books.index', [
            'books' => $books,
            'book_categories' => DB::table('book_categories')
                ->join('books', 'book_categories.book_id', '=', 'books.id')
                ->join('categories', 'book_categories.category_id', '=', 'categories.id')
                ->select('book_categories.*', 'books.*', 'categories.category_name')
                ->get(),
            'categories' => $categories,
            'selected_category' => $request->category
        ]);
    }

    public function create()
    {
        return view('admin.books.create');
    }

    public function store(Request $request)
    {
        $book = new Book();

        $book->book_title = $request->title;
        $book->book_description = $request->description;
        $book->book_image = $request->image;
        $book->book_pages = $request->pages;
        $book->book_price = $request->price;

        $book->save();

        return redirect()->route('dashboard')->with('status', 'Book has been created');
    }

    public function edit($id)
    {
        $book = Book::findOrFail($id);

        return view('admin.books.edit', compact('book'));
    }

    public function update(Request $request, $id)
    {
        $book = Book::findOrFail($id);

        $book->book_title = $request->title;
        $book->book_description = $request->description;
        $book->book_image = $request->image;
        $book->book_pages = $request->pages;
        $book->book_price = $request->price;

        $book->save();

        return redirect()->route('dashboard')->with('status', 'Book has been updated');
    }

    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()->route('dashboard')->with('status', 'Book has been deleted');
    }
}
