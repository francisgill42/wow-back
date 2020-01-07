<?php

namespace App;
use DB;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $fillable = [
        'brand_name',
        'parent_id',
    ];
  
    // public static function get_brands_with_categories()
    // {
    //    return DB::table('brands')
    //    ->join('categories', 'brands.parent_id', '=', 'categories.id')
    //    ->select('brands.id','brands.brand_name' , 'categories.id as category_id','categories.category_name')
    //    ->orderBy('brands.id','desc')
    //    ->get();
    // }
}
