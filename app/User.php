<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nickname', 'real_name', 'bio', 'country', 'sex', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
        
    public function stars()
    {
        return $this->hasMany(Rating::class);
    }

    public function photos()
    {
        return $this->hasMany('App\Comment');
    }


    public static function add($fields)
    {
        $user = new static;
        $user->fill($fields);
        $user->password = bcrypt($fields['password']);
        $user->save();
        return $user;
    }    
    
    public function uploadAvatar($image)
    {
        if($image == null) 
        { 
            return; 
        }
        if($this->avatar != null)
        {
        Storage::delete('uploads/' . $this->avatar);
        }
        $filename = str_random(10) . '.' . $image->extension();
        $image->storeAs('uploads', $filename);
        $this->avatar = $filename;
        $this->save();
    }
    public function getImage()
    {
        if($this->avatar == null)
        {
            return '/img/no-user-image.png';
        }
        return '/uploads/' . $this->avatar;
    }
}
