<?php

namespace Paw\App\Models;

use Paw\Core\Model;
use Exception;

class Especialidad extends Model
{
    protected $table = 'especialidades';

    protected $fields = [
        "nombre" => null,
        "estado" => null,
    ];
    
    public function setNombre(string $nombre)
    {
        if (strlen($nombre) > 60)
            throw new Exception("El nombre de la especialidad no debe ser mayor a 60 caracteres.");

        $this->fields["nombre"] = $nombre;
    }
}