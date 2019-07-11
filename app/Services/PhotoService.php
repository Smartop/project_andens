<?php


namespace Andens\Services;

use Andens\Http\Requests\PhotoStoreRequest;
use Andens\Models\Photo;
use Andens\Models\Repositories\PhotoRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PhotoService
{
    /**
     * PhotoService constructor
     *
     * @param PhotoRepository $photoRepository
     */
    public function __construct(PhotoRepository $photoRepository)
    {
        $this->photoRepository = $photoRepository;
    }

    /**
     * Get all photos with pagination
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function index()
    {
        return $this->photoRepository->paginateAll();
    }

    /**
     * Show photo by id
     *
     * @param $photo_id
     * @return PhotoRepository|PhotoRepository[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model
     */
    public function show($photo_id)
    {
        return $this->photoRepository->findById($photo_id);
    }

    /**
     * Store photo service
     *
     * @param PhotoStoreRequest $request
     * @return PhotoRepository|\Illuminate\Database\Eloquent\Model|void
     */
    public function store(PhotoStoreRequest $request)
    {
        $attributes = $request->all();
        $image = $request->file('image');
        if ($image == null) {
            return;
        }
        //Storage::delete('uploads/' . $this->image);
        $file_name = Str::random(10) . '.' . $image->extension();
        $image->storeAs('public/img', $file_name);
        $attributes['file_name'] = $file_name;
        $attributes['user_id'] = \Auth::id();

        return $this->photoRepository->store($attributes);
    }

    /**
     * Get all user`s photos with pagination
     * @param $user_id
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getUserPhotos($user_id)
    {
        return $this->photoRepository->findByUser($user_id);
    }

    /**
     * Make photo favorite or not
     *
     * @param Request $request
     * @return PhotoRepository|\Illuminate\Database\Eloquent\Model
     */
    public function toggleFavorite(Request $request)
    {
        $user_id = Auth::id();
        $attributes = $request->all();
        $attributes['user_id'] = $user_id;

        return $this->photoRepository->toggleFavorite($attributes);
    }

    /**
     * Get photo favorite status for user
     *
     * @param Request $request
     * @return bool
     */
    public function favoriteStatus(Request $request)
    {
        if (Auth::check()) {
            $photo_id = $request->photo_id;
            $fstatus = $this->photoRepository->favoriteStatus($photo_id);

            if ($fstatus === null || $fstatus->favor == 0) {
                return false;
            } else {
                return true;
            }
        }
    }
}