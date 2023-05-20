<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AuthorController extends Controller
{
    public function index(): View
    {
        $authors = Author::all();

        return view('authors.index', ['authors' => $authors]);
    }

    public function create()
    {
        return view('admin.authors.create');
    }

    public function store(Request $request)
    {
        $author = new Author();

        $author->author_name = $request->name;

        $author->save();

        return redirect()->route('dashboard')->with('status', 'Author has been created');
    }

    public function edit($id)
    {
        $author = Author::findOrFail($id);

        $previousValues = [
            'name' => $author->author_name,
        ];

        return view('admin.authors.edit', compact('author', 'previousValues'));
    }

    public function update(Request $request, $id)
    {
        $author = Author::findOrFail($id);

        $author->author_name = $request->name;

        $author->save();

        return redirect()->route('dashboard')->with('status', 'Author has been updated');
    }

    public function destroy(Author $author)
    {
        $author->delete();

        return redirect()->route('dashboard')->with('status', 'Author has been deleted');
    }
}
