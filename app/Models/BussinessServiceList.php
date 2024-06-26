<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BussinessServiceList extends Model
{
    use HasFactory;

    protected  $table = 'bussiness_service_lists';

    protected  $guarded = [];


    public function users()
    {
        return $this->belongsToMany(User::class, 'business_services', 'bussiness_name', 'user_id');
    }
}
