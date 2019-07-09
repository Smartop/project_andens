<?php


namespace Andens\Models\Repositories;


use Andens\Models\Repositories\Interfaces\UserRepositoryInterface;
use Andens\Models\User;

class UserRepository implements UserRepositoryInterface
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function findByNickname($nickname)
    {
        return $this->user->where('nickname', $nickname)->first();
    }
}