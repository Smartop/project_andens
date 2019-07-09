<?php


namespace Andens\Models\Repositories\Interfaces;

use Andens\Models\User;

interface PhotoRepositoryInterface
{
    public function paginateAll();

    public function findById($id);

    public function store($request);
}