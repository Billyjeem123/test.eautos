<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SoldItems extends Model
{
    use HasFactory;

    protected $fillable = [
        'owner_id', 'buyer_id', 'price', 'item_name', 'is_viewed'
    ];

    protected $table='sold_items';


    /**
     * Get the user that purchased an  item
     */
    public function buyer_details(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, 'buyer_id');
    }

    /**
     * Get the user that  owness the item
     */
    public function  owner_details(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

}
