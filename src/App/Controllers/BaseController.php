<?php

namespace Paw\App\Controllers;

class BaseController
{
    private string $viewsDir;
    protected $log;

    public function __construct()
    {
        $this->viewsDir = __DIR__ . "/../Views/";
    }

    protected function showView(String $view)
    {
        require $this->viewsDir . $view;
    }
}