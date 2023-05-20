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
            'shipment_address' => 'C. Fray Tomás de Berlanga, 7, 41010 Sevilla',
            'shipment_date' => Carbon::create('2024', '02', '24'),
            'shipment_items' => '1|2',
            'shipment_sent' => true,
            'order_id' => '1',
        ]);

        DB::table('shipments')->insert([
            'shipment_address' => 'C. Fray Tomás de Berlanga, 7, 41010 Sevilla',
            'shipment_date' => Carbon::create('2024', '02', '24'),
            'shipment_items' => '1',
            'shipment_sent' => true,
            'order_id' => '2',
        ]);

        DB::table('shipments')->insert([
            'shipment_address' => 'C. Fray Tomás de Berlanga, 7, 41010 Sevilla',
            'shipment_date' => Carbon::create('2024', '02', '27'),
            'shipment_items' => '3',
            'shipment_sent' => false,
            'order_id' => '2',
        ]);
    }
}
