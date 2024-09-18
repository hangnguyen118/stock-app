<?php

namespace App\Repositories;
use App\Contracts\Interfaces\CustomerRepositoryInterface;
use App\Models\Customer;

class CustomerRepository extends EloquentRepository implements CustomerRepositoryInterface
{
    public function getModel(): string
    {
        return Customer::class;
    }
}