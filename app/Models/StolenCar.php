<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StolenCar extends Model
{
    use HasFactory;
     protected $fillable = ['name', 'image', 'address', 'user_id', 'color', 'views', 'is_approved', 'brand_id', 'plate_number'];
     protected $table= 'stolen_cars';

    /**
     * Get the user that reported the car stolen.
     */
    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Get the brand that owns the car reported.
     */
    public function brand(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }


}
