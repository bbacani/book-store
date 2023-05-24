<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Author;
use App\Models\Category;
use App\Models\Book;
use App\Models\Shipment;
use App\Models\Order;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;

class UserController extends Controller
{
    public function getProfile($userId)
    {
        if (!Auth::check() || Auth::id() != $userId) {
            return view('user.profile', [
                'user' => null
            ]);
        }
        $orders = Order::where('user_id', $userId)->get();
        $shipments = [];

        foreach ($orders as $order) {
            $shipments_of_order = Shipment::where('order_id', $order->id)->get();
            foreach ($shipments_of_order as $shipment) {
                $shipments = Arr::add($shipments, $shipment->id, $shipment);
            }
        }

        return view('user.profile', [
            'user' => User::find($userId),
            'orders' => $orders,
            'shipments' => $shipments
        ]);
    }

    public function getAddress()
    {
        return view('user.update_address', ['user' => Auth::user()]);
    }

    public function updateAddress()
    {
        // Retrieve the authenticated user
        $user = Auth::user();

        // Perform validation on the new address
        $validatedData = request()->validate([
            'newAddress' => 'required|string|max:255',
        ]);

        // Update the user's address
        $user->address = $validatedData['newAddress'];
        $user->save();

        // Redirect the user back to the profile page with a success message
        return redirect()->route('user.profile', ["id" => $user->id])->with('success', 'Address updated successfully.');
    }

    public function getFavourites($userId)
    {
        if (!Auth::check() || Auth::id() != $userId) {
            return view('user.favourites', [
                'user' => null
            ]);
        }

        $user = User::find($userId);
        $books = [];

        foreach (explode('|', $user->book_favourites) as $book_id) {
            if (!empty($book_id)) {
                $book = Book::find($book_id);
                $books = Arr::add($books, $book->id, $book);
            }
        }

        return view('user.favourites', [
            'extended_info' => false,
            'canDelete' => true,
            'user' => $user,
            'books' => $books
        ]);
    }

    public function addBookToFavourites($item_id)
    {
        if (!Auth::check()) {
            return redirect('/login');
        }
        $userid = Auth::id();

        $user = User::find($userid);
        $favourites = explode('|', $user->book_favourites);
        if (!in_array($item_id, $favourites)) {
            $user->book_favourites = $user->book_favourites . '|' . $item_id;
            $user->save();
        }
        return redirect('/books');
    }

    public function removeBookFromFavourites($item_id)
    {
        if (!Auth::check()) {
            return redirect('/login');
        }
        $userid = Auth::id();

        $user = User::find($userid);
        $user->book_favourites = preg_replace('/\|' . $item_id . '/', '', $user->book_favourites, 1);
        $user->save();
        return redirect('/user/' . $userid . '/favourites');
    }

    public function index(): View
    {
        return view('admin.dashboard', [
            'users' => User::all(),
            'books' => Book::all(),
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
            'orders' => DB::table('orders')
                ->join('users', 'orders.user_id', '=', 'users.id')
                ->select('orders.*', 'users.id AS user_id', 'users.name AS user_name', 'users.address AS user_address')
                ->where('order_completed', '=', true)
                ->get(),
            'shipments' => Shipment::all(),
        ]);
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->is_admin = $request->is_admin;

        $user->save();

        return redirect()->route('dashboard')->with('status', 'User has been updated');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('dashboard')->with('status', 'User has been deleted');
    }
}
