<?php


namespace Andens\Models\Repositories;


use Andens\Models\Comment;
use Andens\Models\Repositories\Interfaces\CommentRepositoryInterface;

class CommentRepository implements CommentRepositoryInterface
{
    protected $comment;

    public function __construct(Comment $comment)
    {
        $this->comment = $comment;
    }

    public function findWithUser($photo_id)
    {
        $comments = $this->comment->where('photo_id', $photo_id)->with(['user' => function ($query) {
            return $query->select(['id', 'nickname']);
        }])->get();

        return $comments;
    }
}