<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
   protected $fillable = [
        'user_id', 'name', 'phone', 'address_line',
        'city', 'district', 'state', 'postal_code', 'country'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
