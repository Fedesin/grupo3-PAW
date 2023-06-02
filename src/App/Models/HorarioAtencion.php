<?php

namespace Paw\App\Models;

use Paw\Core\Model;
use Exception;

class HorarioAtencion extends Model
{
    protected $table = 'horario_atencion';
    
    protected $fields = [
        "id_profesional" => null,
        "dia" => null,
        "hora_inicio" => null,
        "hora_fin" => null,
    ];
}