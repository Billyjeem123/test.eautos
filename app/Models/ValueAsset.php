<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ValueAsset extends Model
{
    use HasFactory;

    protected $table = 'value_asset';

    protected $fillable = ['user_id', 'brand', 'model', 'color', 'mileage', 'engine_type', 'desc', 'asset_type'];




     public function  asset_docs(): \Illuminate\Database\Eloquent\Relations\HasMany
     {
    return $this->hasMany(ValueDocs::class);
}



}
