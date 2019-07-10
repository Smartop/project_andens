<?php

namespace Andens\Http\Controllers;

use Andens\Http\Requests\UserProfileRequest;
use Andens\Services\PhotoService;
use Andens\Services\UserService;
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
     * @param UserProfileRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UserProfileRequest $request)
    {
        $this->userService->update($request);

        return back();
    }
}
