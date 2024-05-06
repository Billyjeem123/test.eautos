<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    // public $timestamps = false;
    protected $fillable = [
        'category_id',
        'sub_category_id',
        'brand_id',
        'model',
        'color',
        'address',
        'location',
        'price',
        'deed',
        'car_receipt',
        'car_docs',
        'mileage',
        'desc',
        'is_installemt',
        'is_approved',
        'user_id',
        'car_name',
        'cylinder',
        'is_viewed'

    ];

     /**
     * Get the brand that owns the product.
     */
    public function brand(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }

    /**
     * Get the images for the product.
     */
    public function images(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Image::class, 'product_id', 'id');
    }

    public function categories(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function subcategories(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(SubCategory::class, 'sub_category_id');
    }

    /**
     * Get the user that owns the product.
     */
    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }


}
