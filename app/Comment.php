<?php

namespace Andens;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['user_id', 'body'];
    
    public function photo()
    {
        return $this->belongsTo('Andens\Photo');
    }

    public function user()
    {
        return $this->belongsTo('Andens\User', 'user_id');
    }
}
