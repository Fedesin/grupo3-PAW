<?php

namespace Paw\App\Controllers;
use Paw\Core\Validator;
use Paw\App\Models\Profesional;

class ProfesionalesController extends BaseController
{
    public ?string $modelName = ProfesionalesCollection::class;   
    public function __construct()
    {
        $this->modelName=\ProfesionalesCollection::class;
        parent::__construct();
    }

    public function especialidadesprofesionales()
    { 
        $titulo="Profesional";
        $profesionales= $this->model->getAll();
        require $this->viewDir . 'especialidades-profesionales.view.php';
    }
}