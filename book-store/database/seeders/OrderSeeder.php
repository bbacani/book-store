<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('orders')->insert([
            'order_subtotal' => '84.41',
            'order_date' => Carbon::create('2024', '02', '24'),
            'order_items' => '1|2',
            'order_completed' => true,
            'user_id' => '2',
        ]);

        DB::table('orders')->insert([
            'order_subtotal' => '91.78',
            'order_date' => Carbon::create('2024', '02', '24'),
            'order_items' => '1|3',
            'order_completed' => true,
            'user_id' => '3',
        ]);
    }
}
