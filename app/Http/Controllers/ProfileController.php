<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Storage;

class ProfileController extends Controller
{
    public function update(Request $request) {
    
    $user = Auth::user();
    $this->validate($request, [
            'nickname' => 'max:25|unique:users,nickname,'.$user->id,
            'real_name' => 'nullable|max:60',
            'bio' => 'nullable',
            'country' => 'required',
            'gender' => 'required',
            'email' => 'email|unique:users,email,'.$user->id,
            'password' => 'min:6|confirmed',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);
        $avatar = $request->avatar;
        $user->nickname = request('nickname');
        $user->real_name = request('real_name');
        $user->bio = request('bio');
        $user->country = request('country');
        $user->gender = request('gender');
        $user->email = request('email');
        $user->password = bcrypt(request('password'));

        if($request->hasFile('avatar')) {
            $user->uploadAvatar($avatar);
        }
        //$user = User::add($request->all());

        $user->save();

        return back();  
    }

    public function updateAvatar(Request $request) {
        
    }
}
