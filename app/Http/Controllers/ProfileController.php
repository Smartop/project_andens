<?php

namespace Andens\Http\Controllers;

use Andens\Http\Requests\UserProfileRequest;
use Illuminate\Http\Request;
use Andens\Models\User;
use Auth;
use Storage;

class ProfileController extends Controller
{
    /**
     * Auth user update own profile
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UserProfileRequest $request)
    {
        $user = Auth::user();
        $avatar = $request->avatar;
        $user->nickname = request('nickname');
        $user->real_name = request('real_name');
        $user->bio = request('bio');
        $user->country = request('country');
        $user->gender = request('gender');
        $user->email = request('email');
        $user->password = bcrypt(request('password'));

        if ($request->hasFile('avatar')) {
            $user->uploadAvatar($avatar);
        }
        //$user = User::add($request->all());

        $user->save();

        return back();
    }

    public function updateAvatar(Request $request)
    {

    }
}
