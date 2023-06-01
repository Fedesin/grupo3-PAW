<?php

namespace Paw\App\Controllers;

use Paw\App\Models\Model;
use Paw\Core\Database\QueryBuilder;
use Paw\App\Models;

class BaseController
{
    private string $viewsDir;

    protected ?string $modelName = null;



    public function __construct()
    {
        global $connection, $log;
        $this->viewsDir = __DIR__ . "/../Views/";
        if(!is_null($this->modelName)){
            $qb = new QueryBuilder($connection, $log);
            $modelClass = "\\Paw\\App\\Models\\{$this->modelName}";
            $model = new $modelClass;
            $model->setQueryBuilder($qb);
            $this->setModel($model);
        }
    }

    public function setModel(Model $model)
    {
        $this->model = $model;
    }


    protected function showView(String $view, array $data = null)
    {
        if (isset($data)) {
            extract($data);
        }
        require $this->viewsDir . $view;
    }

    protected function json($data)
    {
        echo json_encode($data);
    }
}