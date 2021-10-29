<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absen extends Model
{
    use HasFactory;
    protected $fillable = [
        "date",
        "time_in",
        "time_out",
        "longitude",
        "latitude",
        "user_id",
    ];
}
