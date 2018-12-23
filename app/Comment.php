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

    public function author()
    {
        return $this->belongsTo('App\User');
    }

    public function commentable()
    {
        return $this->morphTo();
    }
}
