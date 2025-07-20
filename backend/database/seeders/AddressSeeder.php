<?php

namespace Database\Seeders;

use App\Models\Address;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       Address::create([
            'user_id' => 1,
            'name' => 'Nabnit Jha',
            'phone' => '9800000001',
            'address_line' => 'Janakpur-4, Ramanand Chowk',
            'city' => 'Janakpur',
            'district' => 'Dhanusha',
            'state' => 'Madhesh Pradesh',
            'postal_code' => '45600',
            'country' => 'Nepal',
        ]);
    }
}
