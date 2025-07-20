<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Service::insert([
            ['name' => 'Birthday Cooking', 'description' => 'Cook and serve for birthday party', 'price' => 2500],
            ['name' => 'Marriage Service', 'description' => 'Complete marriage meal arrangement', 'price' => 15000],
        ]);
    }
}
