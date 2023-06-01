<?php

namespace Paw\App\Models;

use Paw\Core\Model;
use Paw\Core\Exceptions\InvalidValueFormatException;
use Paw\Core\Exceptions\MandatoryValueException;
use Exception;

class Turno extends Model
{
    public $table = 'turnos';

    public $fields = [
        "nombre_paciente" => null,
        "apellido_paciente" => null,
        "email_paciente" => null,
        "telefono_paciente" => null,
        "fecha_nacimiento_paciente" => null,
        "edad_paciente" => null,
        "fecha_turno" => null,
        "estado_turno" => null,
        "id_profesional" => null,
    ];

    public function setNombre_paciente(string $nombre)
    {
        if (is_null($nombre)) {
            throw MandatoryValueException("El nombre es obligatorio.");
        }

        if (strlen($nombre) > 60) {
            throw InvalidValueFormatException("El nombre del paciente no debe ser mayor a 60 caracteres.");
        }
        $this->fields["nombre_paciente"] = $nombre;
    }

    public function setApellido_paciente(string $apellido)
    {
        if (is_null($apellido)) {
            throw MandatoryValueException("El apellido es obligatorio.");
        }

        if (strlen($apellido) > 60) {
            throw InvalidValueFormatException("El apellido del paciente no debe ser mayor a 60 caracteres");
        }
        $this->fields["apellido_paciente"] = $apellido;
    }

    public function setEmail_paciente(string $email)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw InvalidValueFormatException("El email del paciente no tiene el formato correcto.");
        }

        if (is_null($email)) {
            throw MandatoryValueException("El email es obligatorio.");
        }

        $this->fields["email_paciente"] = $email;
    }

    public function setTelefono_paciente(string $tel)
    {
        if (is_null($tel)) {
            throw MandatoryValueException("El telefono es obligatorio.");
        }

        if (strlen($tel) > 15) {
            throw InvalidValueFormatException("El telefono del paciente no debe ser mayor a 15 caracteres.");
        }
        $this->fields["telefono_paciente"] = $tel;
    }

    public function setFecha_nacimiento_paciente(string $fechaNacimiento)
    {
        if (is_null($fechaNacimiento)) {
            throw MandatoryValueException("La fecha de nacimiento es obligatoria.");
        }

        $this->fields["fecha_nacimiento_paciente"] = $fechaNacimiento;
    }

    public function setEdad_paciente(string $edad)
    {
        if (is_null($edad)) {
            throw MandatoryValueException("La edad es obligatoria.");
        }
        $this->fields["edad_paciente"] = $edad;
    }

    public function setFecha_turno(string $fechaTurno)
    {
        if (is_null($fechaTurno)) {
            throw MandatoryValueException("La Fecha del Turno es obligatoria.");
        }

        $this->fields["fecha_turno"] = $fechaTurno;
    }

    public function setHoraTurno(string $horaTurno)
    {
        if (is_null($horaTurno)) {
            throw MandatoryValueException("La Hora del Turno es obligatoria.");
        }

        $this->fields["horaTurno"] = $horaTurno;
    }

    public function setEstado_turno(int $estado_turno)
    {
        $this->fields["estado_turno"] = $estado_turno;
    }

    public function setId_profesional(int $profesional)
    {
        if (is_null($profesional)) {
            throw MandatoryValueException("El Profesional del Turno es obligatorio.");
        }

        $this->fields["id_profesional"] = $profesional;
    }

    public function getNombre()
    {
        return $this->fields["nombre_paciente"];
    }

    public function getApellido()
    {
        return $this->fields["apellido_paciente"];
    }

    public function getEmail()
    {
        return $this->fields["email_paciente"];
    }

    public function getTel()
    {
        return $this->fields["telefono_paciente"];
    }

    public function getFechaNacimiento()
    {
        return $this->fields["fecha_nacimiento_paciente"];
    }

    public function getEdad()
    {
        return $this->fields["edad_paciente"];
    }

    public function getFechaTurno()
    {
        return $this->fields["fecha_turno"];
    }

    public function getHoraTurno()
    {
        return $this->fields["horaTurno"];
    }

    public function getProfesional()
    {
        return $this->fields["id_profesional"];
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