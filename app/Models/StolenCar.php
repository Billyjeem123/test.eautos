<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StolenCar extends Model
{
    use HasFactory;
     protected $fillable = ['name', 'image', 'address', 'user_id', 'color', 'views', 'is_approved'];
     protected $table= 'stolen_cars';
}
