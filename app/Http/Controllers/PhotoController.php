<?php

namespace Andens\Http\Controllers;

use Andens\Http\Requests\PhotoStoreRequest;
use Andens\Models\User;
use Andens\Models\Photo;
use Andens\Models\Comment;
use Andens\Services\CommentService;
use Andens\Services\PhotoService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Types\Integer;

class PhotoController extends Controller
{
    protected $photoService;
    protected $commentService;

    public function __construct(PhotoService $photoService,
                                CommentService $commentService)
    {
        $this->photoService = $photoService;
        $this->commentService = $commentService;
    }

    /**
     * Display last photos
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $photos = $this->photoService->index();

        return view('gallery', compact('photos'));
    }

    /**
     * Store a newly created resource in storage
     *
     * @param PhotoStoreRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(PhotoStoreRequest $request)
    {
        $photo = $this->photoService->store($request);

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
        $photo = $this->photoService->show($photo_id);
        $comments = $this->commentService->findWithUser($photo_id);

        return view('profile.photoView', compact('photo', 'comments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \Andens\Models\Photo $photo
     * @return \Illuminate\Http\Response
     */
    /*public function edit(Photo $photo)
    {
        //
    }*/

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Andens\Models\Photo     $photo
     * @return \Illuminate\Http\Response
     */
    /*public function update(Request $request, Photo $photo)
    {
        //
    }*/

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
        $photo = $this->photoService->getPhoto($photo_id);
        $comment_count = $this->commentService->getCount($photo);
        $star_count = $this->photoService->starCount($photo);

        return response()->json([
            'photo' => $photo,
            'comment_count' => $comment_count,
            'star_count' => $star_count,
        ]);
    }

}
