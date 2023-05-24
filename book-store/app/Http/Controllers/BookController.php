<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    public function index(Request $request): View
    {
        $query = Book::query();

        if ($request->filled('author')) {
            $query->whereHas('authors', function ($q) use ($request) {
                $q->where('id', $request->author);
            });
        }

        if ($request->filled('category')) {
            $query->whereHas('categories', function ($q) use ($request) {
                $q->where('id', $request->category);
            });
        }

        $books = $query->get();

        return view('books.index', [
            'books' => $books,
            'book_authors' => DB::table('author_books')
                ->join('books', 'author_books.book_id', '=', 'books.id')
                ->join('authors', 'author_books.author_id', '=', 'authors.id')
                ->select('author_books.*', 'books.*', 'authors.author_name')
                ->get(),
            'book_categories' => DB::table('book_categories')
                ->join('books', 'book_categories.book_id', '=', 'books.id')
                ->join('categories', 'book_categories.category_id', '=', 'categories.id')
                ->select('book_categories.*', 'books.*', 'categories.category_name')
                ->get(),
            'authors' => Author::all(),
            'categories' => Category::all(),
            'selected_author' => $request->author,
            'selected_category' => $request->category,
        ]);
    }

    public function getBook($book_id)
    {
        return view('books.profile', [
            'book' => Book::find($book_id),
            'book_authors' => DB::table('author_books')
                ->join('books', 'author_books.book_id', '=', 'books.id')
                ->join('authors', 'author_books.author_id', '=', 'authors.id')
                ->select('author_books.*', 'books.*', 'authors.author_name')
                ->get(),
            'book_categories' => DB::table('book_categories')
                ->join('books', 'book_categories.book_id', '=', 'books.id')
                ->join('categories', 'book_categories.category_id', '=', 'categories.id')
                ->select('book_categories.*', 'books.*', 'categories.category_name')
                ->get(),
        ]);
    }

    public function create()
    {
        $authors = Author::all();
        $categories = Category::all();

        return view('admin.books.create', compact('authors', 'categories'));
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

        $authors = $request->input('authors', []);
        $categories = $request->input('categories', []);
        $book->authors()->sync($authors);
        $book->categories()->sync($categories);

        return redirect()->route('dashboard')->with('status', 'Book has been created');
    }

    public function edit($id)
    {
        $book = Book::findOrFail($id);
        $authors = Author::all();
        $categories = Category::all();

        $previousValues = [
            'title' => $book->book_title,
            'description' => $book->book_description,
            'image' => $book->book_image,
            'pages' => $book->book_pages,
            'price' => $book->book_price,
            'authors' => $book->authors->pluck('id')->toArray(),
            'categories' => $book->categories->pluck('id')->toArray(),
        ];

        return view('admin.books.edit', compact('book', 'authors', 'categories', 'previousValues'));
    }

    public function update(Request $request, $id)
    {
        $book = Book::findOrFail($id);

        $book->book_title = $request->title;
        $book->book_description = $request->description;
        $book->book_image = $request->image;
        $book->book_pages = $request->pages;
        $book->book_price = $request->price;

        $book->authors()->sync($request->authors);
        $book->categories()->sync($request->categories);

        $book->save();

        return redirect()->route('dashboard')->with('status', 'Book has been updated');
    }

    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()->route('dashboard')->with('status', 'Book has been deleted');
    }
}
