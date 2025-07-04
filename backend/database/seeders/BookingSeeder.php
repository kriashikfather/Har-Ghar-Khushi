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
            'user_id'      => 1,
            'service_name' => 'Birthday Party',
            'booking_date' => now()->addDays(7),
            'details'      => 'Need full catering + decoration',
            'status'       => 'pending',
            'created_at'   => Carbon::now()->subDays(2),
            'updated_at'   => Carbon::now()->subDay(),
        ]);
    }
}
