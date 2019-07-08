<?php

namespace Andens\Models;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    protected $fillable= ['photo_id', 'user_id', 'favor'];

    public function photo()
    {
        return $this->belongsTo('Andens\Models\Photo', 'photo_id');
    }

    public function user()
    {
        return $this->belongsTo('Andens\Models\User', 'user_id');
    }


}
