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



    public static function getValueAssetsWithDocsAndImages()
    {
        return DB::table('value_asset')
            ->select('value_asset.*', 'value_asset_docs.docs', 'value_asset_images.images')
            ->leftJoin('value_asset_docs', 'value_asset.id', '=', 'value_asset_docs.value_asset_id')
            ->leftJoin('value_asset_images', 'value_asset.id', '=', 'value_asset_images.value_asset_id')
            ->whereIn('value_asset.id', function ($query) {
                $query->select('id')
                    ->from('value_asset')
                    ->distinct();
            })
            ->get();
    }



}
