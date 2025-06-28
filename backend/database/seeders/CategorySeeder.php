<?php
namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            ['name'      => 'Dairy', 'created_at' => Carbon::now()->subDays(2),
                'updated_at' => Carbon::now()->subDay()],
            ['name'      => 'Meat', 'created_at' => Carbon::now()->subDays(2),
                'updated_at' => Carbon::now()->subDay()],
            ['name'      => 'Grocery', 'created_at' => Carbon::now()->subDays(2),
                'updated_at' => Carbon::now()->subDay()],
            ['name'      => 'Celebration', 'created_at' => Carbon::now()->subDays(2),
                'updated_at' => Carbon::now()->subDay()],
        ]);
    }
}
