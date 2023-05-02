<?php

namespace Paw\App\Controllers;

class validator 
{
    function validar_fecha($fecha){
        $regex = '/^\d{4}-\d{2}-\d{2}$/';
        if (!preg_match($regex,$fecha)) {
            return null;
        }
        return $fecha;
    }

    function validar_email($email){
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return null;
        }
        return $email;
    }

    function remover_specialchar($data)
    {
    $escapedData = array();
    foreach ($data as $key => $value) {
        $escapedData[$key] = filter_var($value, FILTER_SANITIZE_SPECIAL_CHARS);
    }
    return $escapedData;
    }

    
}
