<?php

namespace App\Repositories;

use App\Contracts\Interfaces\ArtRepositoryInterface;
use Auth;
use App\Models\Art;

class ArtRepository extends EloquentRepository implements ArtRepositoryInterface
{
    public function getModel(): string
    {
        return Art::class;
    }

    public function getAll($builder = null)
    {
        $query = Art::query();
        return $query->where('customers_id', Auth::user()->id)->get();
    }
}