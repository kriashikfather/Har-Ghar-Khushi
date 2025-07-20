<?php

namespace Database\Seeders;

use App\Models\Payment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Payment::create([
            'order_id' => 1,
            'method' => 'esewa',
            'amount' => 210.00,
            'status' => 'completed',
            'transaction_id' => 'TXN1234567890',
        ]);
    }
}
