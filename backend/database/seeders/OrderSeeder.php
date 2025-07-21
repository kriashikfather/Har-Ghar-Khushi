<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Order;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $order = Order::create([
            'user_id' => 1,
            'total_price' => 210.00,
            'status' => 'pending',
        ]);

        // $order->items()->createMany([
        //     ['product_id' => 1, 'quantity' => 2, 'price' => 70],
        //     ['product_id' => 2, 'quantity' => 1, 'price' => 70],
        // ]);
    }
}
