<?php
namespace Database\Seeders;

use App\Models\Booking;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class BookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Booking::create([
            'user_id' => 1,
            'service_id' => 1,
            'booking_date' => now()->addDays(2),
            'status' => 'pending'
        ]);
    }
}
