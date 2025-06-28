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
        Order::create([
            'user_id' => 1,
            'product_id' => 1,
            'quantity' => 2,
            'total_price' => 200.00,
            'status' => 'pending',
            'created_at'  => Carbon::now()->subDays(2),
            'updated_at'  => Carbon::now()->subDay()
        ]);
    }
}
