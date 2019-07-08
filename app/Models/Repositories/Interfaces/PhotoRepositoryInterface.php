<?php


namespace Andens\Models\Repositories\Interfaces;

use Andens\Models\User;

interface PhotoRepositoryInterface
{
    public function all();

    public function getByUser(User $user);
}