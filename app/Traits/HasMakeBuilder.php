<?php

namespace App\Traits;
use Spatie\QueryBuilder\QueryBuilder;

trait HasMakeBuilder
{
    private function getFields()
    {
        if (property_exists($this, 'fields')) {
            return $this->fields;
        }
        return [];
    }
 
    private function makeQueryBuilder(): QueryBuilder
    {
        return QueryBuilder::for($this->getModel());
    }
}
