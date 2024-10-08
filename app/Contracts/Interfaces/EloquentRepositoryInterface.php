<?php

namespace App\Contracts\interfaces;

interface EloquentRepositoryInterface
{
    public function getAll();
    public function getWithPagination($builder = null);    
    public function store(array $data);
    public function update($id, array $data);
    public function delete($id);
}
