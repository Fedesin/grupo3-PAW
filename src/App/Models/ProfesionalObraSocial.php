<?php

namespace Paw\App\Models;

use Paw\Core\Model;
use Exception;

class ProfesionalObraSocial extends Model
{
    protected $table = 'profesionales_obrasSociales';

    protected $fields = [
        "id_profesional" => null,
        "id_obraSocial" => null,
    ];
}