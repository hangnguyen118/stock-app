<?php

namespace App\Repositories;

use App\Contracts\interfaces\EloquentRepositoryInterface;
use App\Traits\HasMakeBuilder;
use App\Traits\HasSorts;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

abstract class EloquentRepository implements EloquentRepositoryInterface
{
    use HasMakeBuilder, HasSorts;
    protected $_model;

    protected int $_paginate = 20;

    protected string $_default_sort = '';

    public function __construct()
    {
        $this->setModel();
    }

    private function setModel()
    {
        $this->_model = app()->make(
            $this->getModel()
        );
    }

    abstract public function getModel(): string;

    public function getAll($builder = null)
    {
        $query = !empty($builder) ? $builder : $this->makeQueryBuilder();
        return $query
            ->defaultSort($this->getDefaultSort())
            ->allowedFields($this->getFields())
            ->allowedSorts($this->getAllowSorts())
            ->get();
    }

    public function getWithPagination($builder = null) 
    {
        $query = !empty($builder) ? $builder : $this->makeQueryBuilder();

        return $query
            ->defaultSort($this->getDefaultSort())
            ->allowedFields($this->getFields())
            ->paginate($this->_paginate);
    }

    public function store(array $data)
    {
        return $this->_model->create($data);
    }

    public function update($model, array $data)
    {
        $model->update($data);
        return $model;
    }

    public function delete($model)
    {
        return $model->delete();
    }

    public function findById($id)
    {
        return $this->_model->find($id);
    }
}
