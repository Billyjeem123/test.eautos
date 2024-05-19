<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bid extends Model
{
    use HasFactory;

    protected $table = 'auction_bids';

    protected $fillable = ['auction_id', 'user_id', 'price', 'owner_id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    #  Bid belongs to an auction
    public function auction()
    {
        return $this->belongsTo(Auction::class);
    }


}
