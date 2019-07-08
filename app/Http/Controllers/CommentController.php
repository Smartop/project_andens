<?php

namespace Andens\Http\Controllers;

use Illuminate\Http\Request;
use Andens\Models\Comment;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    /**
     * Publish comment
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function publish(Request $request)
    {
        $this->validate($request, [
            'body' => 'required|max:200'
        ]);
        $comment = new Comment;
        $comment->body = $request->get('body');
        $comment->photo_id = $request->get('photo_id');
        $comment->user_id = Auth::user()->id;
        $comment->save();

        return redirect()->back()->with('status', 'Ваш коментар успішно додано');
    }
}
