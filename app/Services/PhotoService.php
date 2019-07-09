<?php


namespace Andens\Services;

use Andens\Http\Requests\PhotoStoreRequest;
use Andens\Models\Photo;
use Andens\Models\Repositories\PhotoRepository;
use Illuminate\Support\Str;

class PhotoService
{
    public function __construct(PhotoRepository $photoRepository)
    {
        $this->photoRepository = $photoRepository;
    }

    public function index()
    {
        return $this->photoRepository->paginateAll();
    }

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
        if($image == null) { return; }
        //Storage::delete('uploads/' . $this->image);
        $file_name = Str::random(10).'.'. $image->extension();
        $image->storeAs('public/img', $file_name);
        $attributes['file_name'] = $file_name;
        $attributes['user_id'] = \Auth::id();

        return $this->photoRepository->store($attributes);
    }
}