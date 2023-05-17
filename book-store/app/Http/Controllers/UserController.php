<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Category;
use App\Models\Book;
use App\Models\Shipment;
use App\Models\Order;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index(): View
    {
        return view('admin.dashboard', [
            'users' => User::all(),
            'books' => Book::all(),
            'book_categories' => DB::table('book_categories')
                ->join('books', 'book_categories.book_id', '=', 'books.id')
                ->join('categories', 'book_categories.category_id', '=', 'categories.id')
                ->select('book_categories.*', 'books.*', 'categories.category_name')
                ->get(),
            'categories' => Category::all(),
            'orders' => DB::table('orders')
                        ->join('users', 'orders.user_id', '=', 'users.id')
                        ->select('orders.*', 'users.id AS user_id', 'users.name AS user_name')
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
