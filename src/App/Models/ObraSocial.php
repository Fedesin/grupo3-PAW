<?php

namespace Paw\App\Models;

use Paw\Core\Model;
use Exception;

class ObraSocial extends Model
{
    protected $table = 'obras_sociales';

    protected $fields = [
        "nombre" => null,
        "estado" => null,
        "path_archivo" => null,
    ];

    public function setNombre(string $nombre)
    {
        if (strlen($nombre) > 60)
            throw new Exception("El nombre de la especialidad no debe ser mayor a 60 caracteres.");
        
        $this->fields["nombre"] = $nombre;
    }

    public function setEstado(string $estado)
    {
        $this->fields["estado"] = $estado;
    }

    public function setArchivo(string $path_archivo)
    {
        $this->fields["path_archivo"] = $path_archivo;
    }
}