<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Rating;

class RatingController extends Controller
{
    /**
     * Set rating to photo
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function setRating(Request $request)
    {

        $this->validate($request, [
            'rating' => 'required|max:2'
        ]);

        $user_id = Auth::id();
        // $rating = new Rating;
        // $rating->rating_value = $request->input('rating');
        // $rating->user_id = $request->input('user_id');
        // $rating->photo_id = $request->input('photo_id');

        $rating = Rating::updateOrCreate(
            [
                'user_id' => $user_id,
                'photo_id' => $request->input('photo_id')
            ],
            [
                'rating_value' => $request->input('rating'),
                'user_id' => $user_id,
                'photo_id' => $request->input('photo_id')
            ]
        );

        $rating->save();
        return redirect()->back();
    }

    /**
     * Show photo`s rating
     *
     * @param $id
     */
    /*public function show($id)
    {
        $sum = Rating::where('photo_id', $request->input('photo_id'))->sum('rating_value');
        $count = Rating::where('photo_id', $request->input('photo_id'))->count();
    }*/
}
