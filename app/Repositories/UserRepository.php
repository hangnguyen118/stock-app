<?php

namespace App\Repositories;
use App\Contracts\Interfaces\UserRepositoryInterface;
use App\Models\User;
use DB;

class UserRepository extends EloquentRepository implements UserRepositoryInterface
{
    public function getModel(): string
    {
        return User::class;
    }
    public function createOwnCustomersAccount($user): void
    {
        DB::transaction(function () use ($user) {
            $user->customerAccount()->create(['users_id' => $user->id]);
        });
    }
}