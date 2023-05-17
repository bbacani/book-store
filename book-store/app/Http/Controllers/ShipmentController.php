<?php

namespace App\Http\Controllers;

use App\Models\Shipment;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class ShipmentController extends Controller
{
    public function create($order_id)
    {
        $order = DB::table('orders')->find($order_id);
        return view('admin.shipments.create', compact('order'));
    }

    public function store(Request $request, $order_id)
    {
        $shipment = new Shipment();

        $shipment->shipment_date = $request->shipment_date;
        $shipment->shipment_items = implode('|', $request->shipment_items);
        $shipment->shipment_sent = false;
        $shipment->order_id = $order_id;

        $shipment->save();

        return redirect()->route('dashboard')->with('status', 'Shipment has been created');
    }

    public function destroy(Shipment $shipment)
    {
        $shipment->delete();
        
        return redirect()->route('dashboard')->with('status', 'Shipment has been deleted');
    }
}
