<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    protected $table = 'hotel';
    protected $fillable = [
    'name',
    'address',
    'price',
    ];

    /********* Relationship with comment ********/
     
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
}
