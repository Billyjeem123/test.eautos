<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarPartCategory extends Model
{
    use HasFactory;

    protected $table = 'car_part_categories';

    protected $fillable = ['part_category'];

    public function parts()
    {
        return $this->hasMany(Part::class);
    }
}
