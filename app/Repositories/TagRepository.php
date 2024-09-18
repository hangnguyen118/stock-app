<?php

namespace App\Repositories;

use App\Contracts\Interfaces\TagRepositoryInterface;
use App\Models\Tag;

class TagRepository extends EloquentRepository implements TagRepositoryInterface
{
    public function getModel(): string
    {
        return Tag::class;
    }
}