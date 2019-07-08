<?php

namespace Andens\Http\Controllers;

use Andens\Models\User;
use Andens\Models\Photo;
use Andens\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Andens\Http\Requests\PhotoStoreRequest;
use phpDocumentor\Reflection\Types\Integer;

class PhotoController extends Controller
{
    /**
     * Display a listing of user`s photos.
     *
     * @var $nick
     * @return \Illuminate\Http\Response
     */
    public function index($nick)
    {
        $user = User::where('nickname', "$nick")->first();
        $user_id = $user->id;
        $photos = Photo::where('user_id', $user_id)->paginate(5);

        return view('profile.index', compact('user', 'photos'));
    }

    /**
     * Display last photos
     *
     * @return \Illuminate\Http\Response
     */
    public function galleryShow()
    {
        $photos = Photo::orderBy('created_at')->paginate(3);

        return view('gallery', compact('photos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage
     *
     * @param PhotoStoreRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(PhotoStoreRequest $request)
    {
        $photo = Photo::add($request->all());
        $photo->uploadImage($request->file('image'));

        return redirect()->back();
    }

    /**
     * Display the specified resource
     *
     * @param $photo_id
     * @return \Illuminate\Http\Response
     */
    public function show($photo_id)
    {
        $photo = Photo::findOrFail($photo_id)->first();
        $id = $photo->id;
        $comments = Comment::where('photo_id', $id)->get();

        return view('profile.photoView', compact('photo', 'comments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \Andens\Models\Photo $photo
     * @return \Illuminate\Http\Response
     */
    public function edit(Photo $photo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Andens\Models\Photo               $photo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Photo $photo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \Andens\Models\Photo $photo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Photo $photo)
    {
        //
    }

    /**
     * Get json of photos with pagination
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function iVue()
    {
        $data = Photo::orderBy('created_at')->paginate(6);
        //return $photos;
        //dd($data);

        return response()->json($data);
    }

    /**
     * Get photo information in json format
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function info(Request $request)
    {
        $photo_id = $request->photo_id;
        $photo = Photo::where('id', $photo_id)->first(); //FIXME find not working
        $comment_count = $photo->getCommentCountAttribute($photo_id);
        $star_count = $photo->getStarCountAttribute($photo_id);
        //dd($data);

        return response()->json([
            'photo' => $photo,
            'comment_count' => $comment_count,
            'star_count' => $star_count,
        ]);
    }
}
