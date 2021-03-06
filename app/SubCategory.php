<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    
    protected $fillable = [
        'subcategory_name',
        'parent_id',
    ];


    public function categories()
    {
        return $this->belongsTo('App\Category', 'id');
    }

   
}
