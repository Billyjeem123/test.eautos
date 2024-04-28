<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestCar extends Model
{
    use HasFactory;

    protected  $table= "request_car";

    protected $fillable = [
        'brand', 'model', 'budget', 'body', 'country', 'user_id',  'phone', 'user_name', 'is_viewed'
    ];

    /**
     * Get the user that owns the product.
     */
    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }


}
