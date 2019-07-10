<?php


namespace Andens\Models\Repositories\Interfaces;

interface UserRepositoryInterface
{
    public function findByNickname($nickname);

    public function update($user_id, $attributes);
}