<?php

namespace Paw\App\Models;

class ProfesionalesCollection extends Model
{
    protected static $table = "profesionales";

    public static function getAll()
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

    public static function get($id) {
        $profesional = new Profesional;
        $profesional->setQueryBuilder($this->queryBuilder);
        $profesional->load($id);

        return $profesional;
    }
}