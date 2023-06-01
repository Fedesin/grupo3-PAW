<?php

namespace Paw\App\Models;

use Paw\Core\Model;
use Exception;

class Noticia extends Model
{
    public $table = 'noticias';

    public $fields = [
        "titulo" => null,
        "fecha" => null,
        "cuerpo" => null,
        "path_archivo" => null,
    ];

    public function setTitulo(string $titulo)
    {
        $this->fields["titulo"] = $titulo;
    }

    public function setFecha(string $fecha)
    {
        $this->fields["fecha"] = $fecha;
    }

    public function setCuerpo(string $cuerpo)
    {
        $this->fields["cuerpo"] = $cuerpo;
    }

    public function setPath_archivo(string $path_archivo)
    {
        $this->fields["path_archivo"] = $path_archivo;
    }



    public function set(array $values)
    {
        foreach (array_keys($this->fields) as $field) {
            if (!isset($values[$field])) {
                continue;
            }
            $method = "set" . ucfirst($field);
            $this->$method($values[$field]);

        }
    }
}