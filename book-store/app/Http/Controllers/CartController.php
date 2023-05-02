<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Book;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Carbon\Carbon;

class CartController extends Controller
{
    public function getCart(): View
    {

        Log::debug(Auth::id());
        return view('cart', [
            'cart' => Order::where('user_id', Auth::id())->where('order_completed', false)->first()

        ]);
    }

    public function add($item_id)
    {
        $userid = Auth::id();
        Log::debug($userid);
        if ($userid == null) {
            redirect('/login');
        }
        $order = Order::where('user_id', $userid)->where('order_completed', false)->first();
        if ($order == null) {
            $order = new Order();
            $order->order_date = Carbon::create('2024', '02', '25');
            $order->order_completed = false;
            $order->user_id = $userid;
        } else {
            $order->order_items = $order->order_items . '|';
        }
        $order->order_items = $order->order_items . $item_id;
        $order->save();
        return redirect('/books');
    }
}
