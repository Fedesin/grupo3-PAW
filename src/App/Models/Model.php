<?php

namespace Paw\App\Models;

use Paw\Core\Database\QueryBuilder;
use Paw\Core\Traits\Loggable;
use Exception;

class Model
{
    use Loggable;

    protected $fields = [];

    public function setQueryBuilder(QueryBuilder $qb)
    {
        $this->queryBuilder = $qb;
    }

    public function __get($name)
    {
        if(array_key_exists($name, $this->fields))
            return $this->fields[$name];
    }

    public function __set($name, $value)
    {
        $this->fields[$name] = $value;
    }
}