<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['user_id', 'body'];
    
    public function photo()
    {
        return $this->belongsTo('App\Photo');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
