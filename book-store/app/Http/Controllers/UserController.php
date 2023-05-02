<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Category;
use App\Models\Book;
use App\Models\Shipment;
use App\Models\Order;

use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class UserController extends Controller
{
    public function getAll(): View
    {
        return view('admin.dashboard', [
            'users' => User::all(),
            'books' => Book::all(),
            'categories' => Category::all(),
            'orders' => DB::table('orders')
                ->join('users', 'orders.user_id', '=', 'users.id')
                ->select('orders.*', 'users.id AS user_id', 'users.name AS user_name')
                ->get(),
            'shipments' => Shipment::all(),
        ]);
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('dashboard')->with('status', 'User has been deleted');
    }
}
