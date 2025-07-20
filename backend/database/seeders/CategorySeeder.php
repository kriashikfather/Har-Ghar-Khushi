<?php
namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::insert([
            ['name' => 'Dairy'],
            ['name' => 'Meat'],
            ['name' => 'Grocery'],
            ['name' => 'Celebration']
        ]);
    }
}
