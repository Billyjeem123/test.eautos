<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Part extends Model
{
    use HasFactory;

    protected $fillable = [
        'part_name', 'image', 'location', 'user_id', 'price',
    ];

    protected  $table  = 'car_part';
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
