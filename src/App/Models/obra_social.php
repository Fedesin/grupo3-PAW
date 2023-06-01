<?php

namespace Paw\App\Models;

use Paw\Core\Model;
use Exception;

class Obra_social extends Model
{
    public $table = 'obras_sociales';

    public $fields = [
        "nombre"=>null,
        "estado"=>null,
        "path_archivo"=>null,
    ];

    public function setNombre(string $nombre)
    {
        if (strlen($nombre)>60){
            throw new Exception("El nombre de la especialidad no debe ser mayor a 60 caracteres.");
        }
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
    //si quiero setear todos los valores de un saque
    public function set(array $values)
    {
        foreach(array_keys($this->fields) as $field){
            if (!isset($values[$field])){
                continue;
            }
            $method = "set" . ucfirst($field);
            $this->$method($values[$field]);
        }
    }
}