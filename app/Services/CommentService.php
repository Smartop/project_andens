<?php


namespace Andens\Services;


use Andens\Models\Repositories\CommentRepository;

class CommentService
{
    public function __construct(CommentRepository $commentRepository)
    {
        $this->commentRepository = $commentRepository;
    }

    public function findWithUser($photo_id)
    {
        return $this->commentRepository->findWithUser($photo_id);
    }
}