<?php


namespace Andens\Services;


use Andens\Http\Requests\UserProfileRequest;
use Andens\Models\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Storage;

class UserService
{
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Get user by nickname
     *
     * @param $nickname
     * @return UserRepository|\Illuminate\Database\Eloquent\Model|object|null
     */
    public function index($nickname)
    {
        return $this->userRepository->findByNickname($nickname);
    }

    /**
     * Update user profile with avatar
     *
     * @param $request
     * @return int
     */
    public function update($request)
    {
        $attributes = $request->except('_token', '_method');
        $avatar = $request->avatar;

        if ($request->hasFile('avatar')) {
            $filename = $this->uploadAvatar($avatar);
            $attributes['avatar'] = $filename;
        }

        return $this->userRepository->update(Auth::id(), $attributes);
    }

    /**
     * Upload avatar to storage
     *
     * @param $image
     * @return string|void
     */
    protected function uploadAvatar($image)
    {
        if ($image == null) {
            return;
        }
        if ($image != null) {
            Storage::delete('img' . $image);
        }
        $filename = Str::random(10) . '.' . $image->extension();
        $image->storeAs('img', $filename);

        return $filename;
    }
}