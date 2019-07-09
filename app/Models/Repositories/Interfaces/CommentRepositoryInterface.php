<?php


namespace Andens\Models\Repositories\Interfaces;


interface CommentRepositoryInterface
{
    public function findWithUser($photo_id);
}