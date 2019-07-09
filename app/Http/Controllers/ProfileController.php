<?php

namespace Andens\Http\Controllers;

use Andens\Http\Requests\UserProfileRequest;
use Andens\Services\PhotoService;
use Andens\Services\UserService;
use Illuminate\Http\Request;
use Andens\Models\User;
use Auth;
use Storage;

class ProfileController extends Controller
{
    protected $photoService;
    protected $userService;

    public function __construct(PhotoService $photoService,
                                UserService $userService)
    {
        $this->photoService = $photoService;
        $this->userService = $userService;
    }

    public function index($nickname)
    {
//        $user = User::where('nickname', $nickname)->first();
        $user = $this->userService->index($nickname);
        $user_id = $user->id;
        $photos = $this->photoService->index();

        return view('profile.index', compact('user', 'photos'));
    }

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
