<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $guarded = [];

    public function levels()
    {
        return $this->belongsTo('App\Level');
    }

    public function videos()
    {
        return $this->hasMany('App\Video');
    }
}
