<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestCar extends Model
{
    use HasFactory;

    protected  $table= "request_car";

    protected $fillable = [
        'brand', 'model', 'budget', 'body', 'country', 'user_id',  'phone',
    ];


}
