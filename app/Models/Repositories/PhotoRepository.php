<?php


namespace Andens\Models\Repositories;


use Andens\Models\Repositories\Interfaces\PhotoRepositoryInterface;
use Andens\Models\Photo;

class PhotoRepository implements PhotoRepositoryInterface
{
    protected $photo;

    public function __construct(Photo $photo)
    {
        $this->photo = $photo;
    }

    public function paginateAll()
    {
        return $this->photo->paginate(5);
    }

    public function findById($id)
    {
        return $this->photo->findOrFail($id);
    }

    public function store($attributes)
    {
        return $this->photo->create($attributes);
    }
}