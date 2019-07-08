<?php

namespace Andens;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $fillable = array('photo_id','user_id', 'rating_value');

    public function photo()
    {
        return $this->belongsTo('Andens\Photo', 'photo_id');
    }

    public function user()
    {
        return $this->belongsTo('Andens\User', 'user_id');
    }

    public function avges($photo_id) 
    {
        $sum = $this->where('photo_id', $photo_id)->sum('rating_value');
        dd($sum);
        $count = $this->where('photo_id', $photo_id)->count();
        $avg = round($sum/$count, 1,1);
    }
}
