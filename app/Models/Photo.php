<?php

namespace Andens\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

use Andens\Models\Favorite;

class Photo extends Model
{

    protected $fillable = ['title', 'desc', 'category', 'camera', 'file_name', 'user_id'];

    public function author()
    {
        return $this->belongsTo('Andens\Models\User', 'user_id');
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

    /**
     * Get average photo`s rating
     *
     * @return float
     */
    public function getStarCountAttribute()
    {
        $sum = $this->stars->sum('rating_value');
        $count = $this->stars->count('rating_value');
        if($count == 0) {
            return "No rating";
        }
        return round($sum/$count, 1,1);
    }

    /**
     * Count the photo`s comments
     *
     * @return int|string
     */
    public function getCommentCountAttribute()
    {
        $count = $this->comments->count('id');
        if($count == 0) {
            return "No comments";
        }
        return $count;
    }

    /**
     * Get image source or default
     *
     * @return string
     */
    /*public function getImage()
    {
        if($this->image == null)
        {
            return '/img/no-image.png';
        }
        return '/uploads/' . $this->image;
    }*/

    /*public function setCategory($id)
    {
        if($id == null) { return;}
        $this->category_id = $id;
        $this->save();
    }*/

    /**
     * Get photo`s status - favorite or not
     *
     * @return boolean
     */
    public function isFavorite()
    {
        $value = $this->favorite()->where('user_id', Auth::id() )->first();
        if ($value === null || $value->favor == 0)
        {
            return false;
        }
        else 
        {
            return true;
        }
        
    }
}
