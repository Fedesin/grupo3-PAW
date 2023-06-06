<?php

namespace Paw\App\Models;

use Exception;

class Profesional extends Model
{
    protected static $table = 'profesionales';

    protected $fields = [
        "nombre" => null,
        "apellido" => null,
        "id_especialidad" => null,
        "estado" => null,
        "cargo_directivo" => null,
        "email" => null,
        "path_archivo" => null,
    ];

    public function setEmail(string $email)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL))
            throw new Exception("Formato de mail no valido");

        $this->fields["email"] = $email;
    }
}