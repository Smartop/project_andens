<?php

namespace App\Http\Controllers;

use App\Photo;
use App\User;
use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($nick)
    {
        $user = User::where('nickname', "$nick")->first();
        $user_id = $user->id;
        $photos = Photo::where('user_id', $user_id)->paginate(5);
        return view('profile.index', compact('user', 'photos'));
    }

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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:60',
            'desc' => 'nullable',
            'category' => 'required|max:20',
            'camera' => 'nullable',
            'image' => 'required|mimes:jpeg,bmp,png'
        ]);
        $photo = Photo::add($request->all());
        $photo->uploadImage($request->file('image'));
        return redirect()->back();        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function show(Photo $photo_id)
    {
        $photo = Photo::findOrFail($photo_id)->first();
        $id = $photo->id;
        $comments = Comment::where('photo_id', $id)->get();
        return view('profile.photoView', compact('photo', 'comments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function edit(Photo $photo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Photo $photo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Photo $photo)
    {
        //
    }

    public function iVue() {
        $data = Photo::orderBy('created_at')->paginate(6);
        //return $photos;
        return response()->json($data);
    }
}
