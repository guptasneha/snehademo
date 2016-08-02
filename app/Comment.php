<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    // Relationship with hotel
     
    public function hotel()
    {
        return $this->belongsTo('App\Hotel');
    }
}
