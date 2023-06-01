<?php

namespace Paw\App\Controllers;
use Paw\Core\Validator;

class PageController extends BaseController
{
    public ?string $modelName;   
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        parent::showView('index.view.php');
    }

    public function staff()
    {
        parent::showView('staff.view.php');
    }

    public function valores()
    {
        parent::showView('valores.view.php');
    }

    public function noticias()
    {
        parent::showView('noticias.view.php');
    }

    public function obrasocial()
    {
        parent::showView('obra-social.view.php');
    }

    public function especialidadesprofesionales()
    { 
        //Traer personas de la base con el filtro seleccionado
        $personas = [
            [
                'nombre' => 'Ana Garcia',
                'especialidad' => 'Psiquiatria',
            ],
            [
                'nombre' => 'Jorge Martinez',
                'especialidad' => 'Ortopedia',
            ],
            [
                'nombre' => 'Veronica Sanchez',
                'especialidad' => 'Psiquiatria',
            ],
            [
                'nombre' => 'Juan Rodriguez',
                'especialidad' => 'Ortopedia',
            ],
            [
                'nombre' => 'Javier Perez',
                'especialidad' => 'Neurologia',
            ],
            [
                'nombre' => 'Mariana Rodriguez',
                'especialidad' => 'Cardiologia',
            ],
    
        ]; 
        if (isset($_GET['especialidad'])) {
            $especialidad = $_GET['especialidad'];
            $especialidad = filter_input(INPUT_GET, 'especialidad', FILTER_SANITIZE_STRING);
            if (!(empty($especialidad))) {
            $personas = array_filter($personas, function ($persona) use ($especialidad) {
                return $persona['especialidad'] === $especialidad;
            });
            }
        }
        if (isset($_GET['profesional'])) {
            $nombre = $_GET['profesional'];
            $nombre = filter_input(INPUT_GET, 'profesional', FILTER_SANITIZE_STRING);
            if (!(empty($nombre))) {
            $personas = array_filter($personas, function ($persona) use ($nombre) {
                return $persona['nombre'] === $nombre;
            });
            }
        }
    
        parent::showView('especialidades-profesionales.view.php',$personas);
    }
}