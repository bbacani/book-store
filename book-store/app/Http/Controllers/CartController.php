<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\Book;
use App\Mail\OrderConfirmation;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Arr;
use Illuminate\View\View;
use Carbon\Carbon;

class CartController extends Controller
{
    public function getCart(): View
    {
        $book_ids = Order::where('user_id', Auth::id())->where('order_completed', false)->first();
        $books = [];
        $subtotal = 0;
        $cart_elem_idx = 0;

        if (!is_null($book_ids)) {
            foreach (explode('|', $book_ids->order_items) as $book_id) {
                if (!empty($book_id)) {
                    $books = Arr::add($books, $cart_elem_idx, Book::find($book_id));
                    $cart_elem_idx += 1;
                }
            }
            foreach ($books as $book) {
                $subtotal += $book->book_price;
            }
        }
        return view('cart.cart', [
            'books' => $books,
            'subtotal' => $subtotal
        ]);
    }

    public function add($item_id)
    {
        if (!Auth::check()) {
            return redirect('/login');
        }
        $userid = Auth::id();
        $order = Order::where('user_id', $userid)->where('order_completed', false)->first();
        if ($order == null) {
            $order = new Order();
            $order->order_date = Carbon::create('2024', '02', '25');
            $order->order_completed = false;
            $order->order_subtotal = 0;
            $order->user_id = $userid;
        }
        $order->order_items = $order->order_items . '|' . $item_id;
        $order->save();
        return redirect('/books');
    }

    public function remove($item_id)
    {
        if (!Auth::check()) {
            return redirect('/login');
        }
        $userid = Auth::id();

        $order = Order::where('user_id', $userid)->where('order_completed', false)->first();
        $order->order_items = preg_replace('/\|' . $item_id . '/', '', $order->order_items, 1);
        $order->save();
        return redirect('/cart');
    }

    public function payment($subtotal)
    {
        return view('cart.payment', ['subtotal' => $subtotal]);
    }

    public function buy($subtotal)
    {
        if (!Auth::check()) {
            return redirect('/login');
        }
        $order = Order::where('user_id', Auth::id())->where('order_completed', false)->first();
        $order->order_completed = true;
        $order->order_subtotal = $subtotal;
        $order->save();

        $user = User::where('id', Auth::id())->first();

        // Send email to user
        Mail::to($user->email)->send(new OrderConfirmation($order));

        return redirect('/books');
    }
}
