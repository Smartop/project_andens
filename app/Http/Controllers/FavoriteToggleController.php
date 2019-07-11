<?php

namespace Andens\Http\Controllers;

use Andens\Services\PhotoService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Andens\Models\Favorite;
use Andens\Models\Photo;

use Response;

class FavoriteToggleController extends Controller
{
    protected $photoService;

    /**
     * FavoriteToggleController constructor
     *
     * @param PhotoService $photoService
     */
    public function __construct(PhotoService $photoService)
    {
        $this->photoService = $photoService;
    }

    /**
     * Make photo`s favorite or cancel that
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function toggleFavorite(Request $request)
    {
        $this->photoService->toggleFavorite($request);

        return redirect()->back();
    }

    /**
     * Get photo`s status - favorite or not
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function status(Request $request)
    {
        $fstatus = $this->photoService->favoriteStatus($request);

        return response()->json($fstatus);
    }
}
