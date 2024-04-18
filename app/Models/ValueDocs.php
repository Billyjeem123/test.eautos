<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ValueDocs extends Model
{
    use HasFactory;

    protected $table = 'value_asset_docs';

    protected $fillable = ['value_asset_id', 'file_name', 'type'];
}
