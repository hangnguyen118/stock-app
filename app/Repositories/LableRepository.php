<?php

namespace App\Repositories;

use App\Contracts\interfaces\LableRepositoryInterface;
use App\Models\Lable;
use Illuminate\Support\Facades\DB;

class LableRepository extends EloquentRepository implements LableRepositoryInterface
{
    public function getModel(): string
    {
        return Lable::class;
    }
}