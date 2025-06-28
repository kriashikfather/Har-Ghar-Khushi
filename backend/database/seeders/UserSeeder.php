<?php
namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name'       => 'Admin User',
                'email'      => 'admin@ghar.com',
                'password'   => Hash::make('admin123'),
                'role'       => 'admin',
                'created_at' => Carbon::now()->subDays(2),
                'updated_at' => Carbon::now()->subDay(),
            ],
            [
                'name'       => 'Normal User',
                'email'      => 'user@ghar.com',
                'password'   => Hash::make('user123'),
                'role'       => 'user',
                'created_at' => Carbon::now()->subDays(2),
                'updated_at' => Carbon::now()->subDay(),
            ],
        ]);

    }
}
