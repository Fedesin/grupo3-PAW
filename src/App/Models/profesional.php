<?php

namespace Paw\App\Models;

use Paw\Core\Model;
use Exception;

class Profesional extends Model
{
    public $table = 'profesionales';

    public $fields = [
        "nombre" => null,
        "apellido" => null,
        "id_especialidad" => null,
        "estado" => null,
        "cargo_directivo" => null,
        "email" => null,
        "path_archivo" => null,
    ];

    public function setNombre(string $nombre)
    {
        $this->fields["nombre"] = $nombre;
    }

    public function setApellido(string $apellido)
    {
        $this->fields["apellido"] = $apellido;
    }

    public function setId_Especialidad(int $id_especialidad)
    {
        $this->fields["id_especialidad"] = $id_especialidad;
    }

    public function setEstado(string $estado)
    {
        $this->fields["estado"] = $estado;
    }

    public function setCargo_directivo(string $cargo_directivo)
    {
        $this->fields["cargo_directivo"] = $cargo_directivo;
    }

    public function setEmail(string $email)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new Exception("Formato de mail no valido");
        }

        $this->fields["email"] = $email;
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