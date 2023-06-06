<?php

namespace Paw\App\Controllers;
use Paw\Core\Validator;
use Paw\App\Models\ProfesionalesCollection;
use Paw\App\Models\Profesional;


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
        $profesionales = Profesional::getAll();

        parent::showView('especialidades-profesionales.view.twig', [
            "profesionales" => $profesionales
        ]);
    }
}