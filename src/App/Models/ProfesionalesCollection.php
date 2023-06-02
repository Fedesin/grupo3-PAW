<?php

namespace Paw\App\Models;

class ProfesionalesCollection extends Model
{
    private $table = "profesionales";

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