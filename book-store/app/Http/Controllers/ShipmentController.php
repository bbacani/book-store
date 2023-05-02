<?php

namespace App\Http\Controllers;

use App\Models\Shipment;

use Illuminate\Support\Facades\DB;

class ShipmentController extends Controller
{
    public function destroy(Shipment $shipment)
    {
        $shipment->delete();
        return redirect()->route('dashboard')->with('status', 'Shipment has been deleted');
    }
}
