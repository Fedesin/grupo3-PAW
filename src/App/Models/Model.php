<?php

namespace Paw\Core;

use Paw\Core\Database\QueryBuilder;
use Paw\Core\Traits\Loggable;

class Models
{
    use Loggable;

    public function setQueryBuilder(QueryBuilder $qb)
    {
        $this->queryBuilder = $qb;
    }
}