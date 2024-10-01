<?php
namespace App\Repositories;

use App\Contracts\Interfaces\FavouritesRepositoryInterface;
use App\Models\Art;
use Auth;

class FavouriteRepository 
{
    public function favouriteArt(Art $art)
    {
        $customer = Auth::user()->customerAccount;
        if (!$customer->favourites()->where('arts_id', $art->id)->exists()) {
            $customer->favourites()->attach($art);
        }
    }
    public function unFavouriteArt(Art $art)
    {
        $customer = Auth::user()->customerAccount;
        $customer->favourites()->detach($art);
    }
}