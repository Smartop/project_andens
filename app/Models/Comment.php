<?php

namespace Andens\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['user_id', 'body'];
    
    public function photo()
    {
        return $this->belongsTo('Andens\Models\Photo');
    }

    public function user()
    {
        return $this->belongsTo('Andens\Models\User', 'user_id');
    }
}
