<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BussinessReview extends Model
{
    use HasFactory;

    protected  $table='bussiness_review';

    protected $fillable = ['reviewer_id', 'bussiness_id', 'reviews'];

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, 'reviewer_id');
    }
}
