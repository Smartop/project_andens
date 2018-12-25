<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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

    public function uploadImage($image)
    {
        if($image == null) { return; }
        Storage::delete('uploads/' . $this->image);
        $filename = str_random(10).'.'. $image->extension();
        $image->storeAs('uploads', $filename);
        $this->image = $filename;
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
