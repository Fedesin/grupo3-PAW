<?php

namespace Paw\App\Models;

use Paw\Core\Model;
use Exception;

class Especialidad extends Model
{
    public $table = 'especialidades';

    public $fields = [
        "nombre"=>null,
        "estado"=>null,
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