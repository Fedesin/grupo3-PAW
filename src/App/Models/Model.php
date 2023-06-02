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
        $method = "set" . ucfirst($name);
        if(method_exists($this, $method)) {
            if($name == "nombre")
                echo "Existe\n";
            $this->$method($value);
        } else if (array_key_exists($name, $this->fields)) {
            if($name == "nombre")
                echo "No existe";
            $this->fields[$name] = $value;
        }
    }

    public function set(array $values)
    {
        foreach (array_keys($this->fields) as $field) {
            if (!isset($values[$field]))
                continue;
            
            $this->$field = $values[$field];
        }
    }
}