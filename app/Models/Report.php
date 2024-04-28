<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_of_offender', 'bussines_name', 'is_viewed', 'offernder_location', 'complaint', 'reporter_name', 'user_id',  'country', 'reporter_phone', 'reporter_phone',
    ];
}
