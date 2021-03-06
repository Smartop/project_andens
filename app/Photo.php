<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

use App\Favorite;

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

    public function favorite() 
    {
        return $this->hasMany(Favorite::class);
    }

    public function getStarCountAttribute($photo_id)
    {
        $sum = $this->stars->sum('rating_value');
        $count = $this->stars->count('rating_value');
        if($count == 0) {
            return "No rating";
        }
        return round($sum/$count, 1,1);
    }

    public function getCommentCountAttribute($photo_id)
    {
        $count = $this->comments->count('id');
        if($count == 0) {
            return "No comments";
        }
        return $count;
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
        $file_name = Str::random(10).'.'. $image->extension();
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
    public function isFavorite($photo_id) 
    {
        $value = $this->favorite()->where('user_id', Auth::id() )->first();
        //dd($value);
        if ($value === null || $value->favor == 0)
        {
            return 0;
        }
        else 
        {
            return 1;
        }
        
    }
}
