<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Contact;
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

        $contact = new Contact();

        $contact->id = $author->id;
        $contact->phone = $request->phone;
        $contact->email = $request->email;

        $contact->save();

        return redirect()->route('dashboard')->with('status', 'Author has been created');
    }

    public function edit($id)
    {
        $author = Author::findOrFail($id);

        $previousValues = [
            'name' => $author->author_name,
            'phone' => $author->contact->phone,
            'email' => $author->contact->email,
        ];

        return view('admin.authors.edit', compact('author', 'previousValues'));
    }

    public function update(Request $request, $id)
    {
        $author = Author::findOrFail($id);

        $author->author_name = $request->name;

        $author->save();

        $contact = $author->contact;

        $contact->id = $author->id;
        $contact->phone = $request->phone;
        $contact->email = $request->email;

        $contact->save();

        return redirect()->route('dashboard')->with('status', 'Author has been updated');
    }

    public function destroy(Author $author)
    {
        $author->delete();

        return redirect()->route('dashboard')->with('status', 'Author has been deleted');
    }
}
