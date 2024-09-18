<?php

namespace App\Contracts\Interfaces;

interface UserRepositoryInterface extends EloquentRepositoryInterface
{
    public function createOwnCustomersAccount($user):void;
}
