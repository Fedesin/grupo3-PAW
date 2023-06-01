<?php

namespace Paw\App\Models;

use Paw\Core\Model;
use Exception;

class Horario_atencion extends Model
{
    public $table = 'horario_atencion';
    public $fields = [
        "id_profesional" => null,
        "dia" => null,
        "hora_inicio" => null,
        "hora_fin" => null,
    ];

    public function setId_profesional(int $profesional)
    {
        $this->fields["id_profesional"] = $profesional;
    }
    public function setDia(date $dia)
    {
        $this->fields["dia"] = $dia;
    }
    public function setHora_inicio($hora_inicio)
    {
        $this->fields["hora_inicio"] = $hora_inicio;
    }
    public function setHora_fin($dia)
    {
        $this->fields["dia"] = $dia;
    }
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