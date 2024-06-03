<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BussinessService extends Model
{
    use HasFactory;

    protected $table  = 'business_services';

    protected  $fillable = ['user_id', 'bussiness_name'];



    public function users()
    {
        return $this->belongsToMany(User::class, 'business_services');
    }
}
