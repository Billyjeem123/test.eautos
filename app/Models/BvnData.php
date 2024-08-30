<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BvnData extends Model
{
    use HasFactory;

    protected $table = 'bvn_data';

    protected  $guarded = [];
}
