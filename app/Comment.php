<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    // Relationship with hotel

    protected $table = 'comments';
    protected $fillable = ['id','hotel_id','description'];
    protected $hidden = ['created_at', 'updated_at'];
     
    public function hotel()
    {
        return $this->belongsTo('App\Hotel');
    }
}
