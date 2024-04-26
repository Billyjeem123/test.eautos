<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Part extends Model
{
    use HasFactory;

    protected $fillable = [
        'part_name', 'image', 'location', 'user_id', 'price', 'part_category_id', 'active'
    ];

    protected  $table  = 'car_part';
    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function partcategories(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(CarPartCategory::class, 'part_category_id');
    }

}
