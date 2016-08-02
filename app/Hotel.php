<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    //
    protected $fillable = [
    'name',
    'address',
    'price',
    'image',
    ];

    /********* Relationship with comment ********/
     
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
}
