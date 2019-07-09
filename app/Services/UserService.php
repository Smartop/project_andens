<?php


namespace Andens\Services;


use Andens\Models\Repositories\UserRepository;

class UserService
{
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index($nickname)
    {
        return $this->userRepository->findByNickname($nickname);
    }
}