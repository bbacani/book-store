<?php

namespace App\Http\Controllers;

use App\Models\Order;

use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function destroy(Order $order)
    {
        $order->delete();
        
        return redirect()->route('dashboard')->with('status', 'Order has been deleted');
    }
}
