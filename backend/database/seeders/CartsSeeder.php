<?php
namespace Database\Seeders;

use App\Models\Cart;
use Illuminate\Database\Seeder;

class CartsSeeder extends Seeder
{
    public function run(): void
    {
        $cart = Cart::create(['user_id' => 1]);

        $cart->items()->createMany([
            ['product_id' => 1, 'quantity' => 2],
            ['product_id' => 2, 'quantity' => 1],
        ]);
    }
}
