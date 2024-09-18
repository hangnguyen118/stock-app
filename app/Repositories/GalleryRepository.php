<?php

namespace App\Repositories;
use App\Contracts\Interfaces\GalleryRepositoryInterface;
use App\Models\Gallery;
use Auth;

class GalleryRepository extends EloquentRepository implements GalleryRepositoryInterface
{
    public function getModel(): string
    {
        return Gallery::class;
    }
    public function getAll($builder = null)
    {
        $query = Gallery::query();
        return $query->where('customers_id', Auth::user()->id)->get();
    }
}