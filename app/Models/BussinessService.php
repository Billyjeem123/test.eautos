<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BussinessService extends Model
{
    use HasFactory;

    protected $table  = 'business_services';

    protected  $fillable = ['user_id', 'bussiness_name'];



    /**
     * Get the user that owns the business service.
     */
    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
