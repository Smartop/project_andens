<?php


namespace Andens\Models\Repositories;


use Andens\Models\Favorite;
use Andens\Models\Repositories\Interfaces\PhotoRepositoryInterface;
use Andens\Models\Photo;
use Illuminate\Support\Facades\Auth;

class PhotoRepository implements PhotoRepositoryInterface
{
    public function paginateAll()
    {
        return Photo::paginate(5);
    }

    public function findById($id)
    {
        return Photo::findOrFail($id);
    }

    public function store($attributes)
    {
        return Photo::create($attributes);
    }

    public function findByUser($user_id)
    {
        return Photo::whereUserId($user_id)->paginate(6);
    }

    public function toggleFavorite($attributes)
    {
        return Favorite::updateOrCreate(
            [
                'user_id' => $attributes['user_id'],
                'photo_id' => $attributes['photo_id']
            ],
            [
                'favor' => $attributes['favor'],
                'user_id' => $attributes['user_id'],
                'photo_id' => $attributes['photo_id']
            ]
        );
    }

    public function favoriteStatus($photo_id)
    {
        $photo = Photo::findOrFail($photo_id);

        return $photo->favorite()->where('user_id', Auth::id())->first();
    }

}