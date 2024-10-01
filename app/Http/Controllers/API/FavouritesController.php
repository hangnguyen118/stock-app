<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Art;
use App\Repositories\FavouriteRepository;

class FavouritesController extends Controller
{
    protected $favouriteRepository;
    public function __construct(FavouriteRepository $favouriteRepository)
    {
        $this->favouriteRepository = $favouriteRepository;
    }
    public function favouriteArt(Art $art)
    {
        $this->favouriteRepository->favouriteArt( $art);
        return response()->json(['message' => 'Art added to favourites']);
    }

    public function unFavouriteArt(Art $art)
    {
        $this->favouriteRepository->unFavouriteArt($art);
        return response()->json(['message' => 'Art removed from favourites']);
    }
}
