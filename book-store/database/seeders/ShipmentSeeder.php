<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ShipmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('shipments')->insert([
            'shipment_date' => Carbon::create('2024', '02', '24'),
            'shipment_items' => '1|2',
            'shipment_completed' => true,
            'order_id' => '1',
        ]);

        DB::table('shipments')->insert([
            'shipment_date' => Carbon::create('2024', '02', '24'),
            'shipment_items' => '1',
            'shipment_completed' => false,
            'order_id' => '2',
        ]);

        DB::table('shipments')->insert([
            'shipment_date' => Carbon::create('2024', '02', '27'),
            'shipment_items' => '3',
            'shipment_completed' => false,
            'order_id' => '2',
        ]);
    }
}
