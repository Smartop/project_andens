<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Favorite;
Use App\Photo;

use Response;

class FavoriteToggleController extends Controller
{
    public function toggleFavorite(Request $request) 
    {
        $user_id = Auth::id();
        $favor = Favorite::updateOrCreate(
        [
            'user_id' => $user_id, 
            'photo_id' => $request->input('photo_id')
        ],
        [
            'favor' => $request->input('favor'),
            'user_id' => $user_id,
            'photo_id' => $request->input('photo_id')
        ]    
        );
        $favor->save();
        return redirect()->back();
    }

    public function status(Request $request) {
        if (Auth::check()) {
            $photo_id = $request->photo_id;
            $photo = Photo::findOrFail($photo_id);
            $fstatus = $photo->isFavorite($photo_id);
            return response()->json($fstatus);
        }
    }
}
