<?php

namespace App\Observers;

use App\Contracts\Interfaces\UserRepositoryInterface;
use App\Models\User;

class UserObserver
{
    protected $userRepository;
    public function __construct(UserRepositoryInterface $userRepository){
        $this->userRepository = $userRepository;
    }
    /**
     * Handle the User "created" event.
     */
    public function created(User $user): void
    {
        $this->userRepository->createOwnCustomersAccount($user);
    }

    /**
     * Handle the User "updated" event.
     */
    public function updated(User $user): void
    {
        //
    }

    /**
     * Handle the User "deleted" event.
     */
    public function deleted(User $user): void
    {
        //
    }

    /**
     * Handle the User "restored" event.
     */
    public function restored(User $user): void
    {
        //
    }

    /**
     * Handle the User "force deleted" event.
     */
    public function forceDeleted(User $user): void
    {
        //
    }
}
