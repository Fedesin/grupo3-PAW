<?php

namespace Paw\App\Controllers;
use Paw\Core\Validator;
use Paw\App\Models\ProfesionalesCollection;

class ProfesionalesController extends BaseController
{
    public function __construct()
    {
        $this->modelName = ProfesionalesCollection::class;
        parent::__construct();
    }

    public function especialidadesprofesionales()
    { 
        $titulo = "Profesional";
        $profesionales = $this->model->getAll();

        parent::showView('especialidades-profesionales.view.twig', [
            "profesionales" => $profesionales
        ]);
    }
}