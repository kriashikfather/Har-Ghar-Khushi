<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            ['name' => 'Milk', 'price' => 60, 'unit' => 'Litre', 'category_id' => 1],
            ['name' => 'Chicken', 'price' => 250, 'unit' => 'Kg', 'category_id' => 2],
            ['name' => 'Rice', 'price' => 50, 'unit' => 'Kg', 'category_id' => 3],
            ['name' => 'Birthday Celebration', 'price' => 5000, 'unit' => 'Package', 'category_id' => 4],
        ]);
    }
}
