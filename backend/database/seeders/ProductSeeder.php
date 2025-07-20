<?php
namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'category_id' => 1,
            'name' => 'Fresh Milk',
            'description' => '1 litre fresh cow milk',
            'price' => 70,
            'image' => 'milk.jpg'
        ]);
        Product::create([
            'category_id' => 1,
            'name' => 'Fresh Ghee',
            'description' => '1 litre fresh cow Ghee',
            'price' => 70,
            'image' => 'ghee.jpg'
        ]);
    }
}
