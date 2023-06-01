<?php

namespace Paw\App\Models;

use Paw\Core\Model;
use Exception;

class Profesional_obrasocial extends Model
{
    public $table = 'profesionales_obrasSociales';

    public $fields = [
        "id_profesional" => null,
        "id_obraSocial" => null,
    ];

    public function setId_profesional(int $profesional)
    {
        $this->fields["id_profesional"] = $profesional;
    }

    public function setId_obraSocial(int $obraSocial)
    {
        $this->fields["id_obraSocial"] = $obraSocial;
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