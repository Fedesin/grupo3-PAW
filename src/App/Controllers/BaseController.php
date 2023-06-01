<?php

namespace Paw\App\Controllers;

use Paw\Core\Model;
use Paw\Core\Database\QueryBuilder;

class BaseController
{
    private string $viewsDir;

    private ?string $modelName = null;



    public function __construct()
    {
        global $connection, $log;
        $this->viewsDir = __DIR__ . "/../Views/";
        if(!is_null($this->modelName)){
            $qb = new QueryBuilder($connection, $log);
            $model = new $this->modelName;
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