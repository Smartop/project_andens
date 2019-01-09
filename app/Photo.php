<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class Photo extends Model
{

    protected $fillable = ['title', 'desc', 'category', 'camera'];

    public function author()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function stars()
    {
        return $this->hasMany(Rating::class, 'photo_id', 'id');
    }

    public function getStarCountAttribute($photo_id)
    {
        $sum = $this->stars->sum('rating_value');
        $count = $this->stars->count('rating_value');
        if($count == 0) {
            return 3;
        }
        return round($sum/$count, 1);
    }

        public static function add($fields)
    {
        $photo = new static;
        $photo->fill($fields);
        $photo->user_id = Auth::user()->id;

        return $photo;
    }

    public function uploadImage($image)
    {
        if($image == null) { return; }
        //Storage::delete('uploads/' . $this->image);
        $file_name = str_random(10).'.'. $image->extension();
        $image->storeAs('public/img', $file_name);
        $this->file_name = $file_name;
        $this->save();
    }
    public function getImage()
    {
        if($this->image == null)
        {
            return '/img/no-image.png';
        }
        return '/uploads/' . $this->image;
    }
    public function setCategory($id)
    {
        if($id == null) { return;}
        $this->category_id = $id;
        $this->save();
    }
}
