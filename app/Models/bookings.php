<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bookings extends Model
{
    use HasFactory;

    protected $fillable = [
        "date_booking",
        "start_booking",
        "end_booking",
        "field_id",
    ];
}
