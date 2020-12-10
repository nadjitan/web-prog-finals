<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FlightTicket extends Model 
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'origin',
        'destination',
        'price',
        'full_name',
        'nationality',
        'gender',
        'passport_number',
        'surname',
        'date_of_birth',
        'passport_expiry_date',
    ];

    public function user() 
    {
        return $this->belongsTo(User::class);
    }
}
