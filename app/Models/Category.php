<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['catname', 'cat_image'];

    // A category ahs many subcatgories

    public function subcategories(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(SubCategory::class);
    }

    // The Category model has a hasMany relationship defined with the Product model, indicating that a category can have multiple products associated with it.

    public function products()
    {
        return $this->hasMany(Product::class);
    }

}
