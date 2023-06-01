<?php

namespace Paw\App\Models;

use Paw\App\Models\Profesional;

class ProfesionalesCollection extends Model
{
    public function getAll()
    {
        //crear tantos profesionales como filas de la tabla de profesionales
        $profesionales = $this->queryBuilder->select($this->table);
        $profesionalesCollection = [];
        foreach ($profesionales as $profesional){
            $newProfesional = new Profesional;
            $newProfesional->set($profesional);
            $profesionalesCollection[] = $newProfesional;
        }
        return $profesionalesCollection;
    }
}