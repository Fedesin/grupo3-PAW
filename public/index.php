<?php

require __DIR__ . '/../src/bootstrap.php';

use Paw\App\Controllers\PageController;
use Paw\App\Controllers\ErrorController;


$path = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
$log->info("Petición a: {$path}");


$controller = new PageController;

if ($path == '/'){
    $controller->index();
    $log->info("Respuesta exitosa: 200");
} else if ($path == '/consultarturno'){
    $controller->consultarturno();
    $log->info("Respuesta exitosa: 200");
} else if ($path == '/solicitarturno'){
    $controller->solicitarturno();
    $log->info("Respuesta exitosa: 200");
} else if ($path == '/confirmardatos'){
    $controller->confirmardatos();
    $log->info("Respuesta exitosa: 200");
} else if ($path == '/staff'){
    $controller->staff();
    $log->info("Respuesta exitosa: 200");
} else if ($path =='/valores'){
    $controller->valores();
    $log->info("Respuesta exitosa: 200");
} else if ($path == '/noticias'){
    $controller->noticias();
    $log->info("Respuesta exitosa: 200");
} else if ($path == '/obra-social'){
    $controller->obrasocial();
    $log->info("Respuesta exitosa: 200");
} else if ($path == '/especialidades-profesionales'){
    $controller->especialidadesprofesionales();
    $log->info("Respuesta exitosa: 200");
} else {
    $controller =  new ErrorController;
    $controller->notFound();
    $log->info("Path not found: 404");
}