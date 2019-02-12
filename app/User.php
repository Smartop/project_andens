<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Cashier\Cashier;
use Laravel\Cashier\Billable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Storage;

class User extends Authenticatable
{
    use Notifiable;
    use Billable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nickname', 'real_name', 'bio', 'country', 'sex', 'gender' ,'email',
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
        Storage::delete('img' . $this->avatar);
        }
        $filename = str_random(10) . '.' . $image->extension();
        $image->storeAs('img', $filename);
        $this->avatar = $filename;
        $this->save();
    }
    public function getImage()
    {
        if($this->avatar == null)
        {
            return 'img/no-avatar.png';
        }
        return 'storage/img/' . $this->avatar;
    }
}
