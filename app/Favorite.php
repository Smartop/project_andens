<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    protected $fillable= ['photo_id', 'user_id', 'favor'];

    public function photo()
    {
        return $this->belongsTo('App\Photo', 'photo_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }


}
