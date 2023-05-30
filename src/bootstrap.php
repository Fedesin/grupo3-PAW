<?php

require __DIR__ . '/../vendor/autoload.php';

use Paw\Core\Router;
use Paw\Core\Config;
use Paw\Core\Request;

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

$handler = new StreamHandler(__DIR__ . "/../" . Config::getLogFile());
$handler->setLevel(Config::getLogLevel());

$log = new Logger('mvc-app');
$log->pushHandler($handler);

$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

$request = new Request;


$router = new Router('ErrorController@notFound', 'ErrorController@internalError');
$router->get('/', 'PageController@index');
$router->get('/consultarturno', 'ConsultasController@consultarturno');
$router->get('/solicitarturno', 'ConsultasController@solicitarturno');
$router->post('/solicitarturno', 'ConsultasController@solicitarturnoProcess');
$router->post('/confirmarturno', 'ConsultasController@confirmarturnoProcess');
$router->post('/consultarturno', 'ConsultasController@consultarturnoProcess');
$router->get('/staff', 'PageController@staff');
$router->get('/valores', 'PageController@valores');
$router->get('/noticias', 'PageController@noticias');
$router->get('/obra-social', 'PageController@obrasocial');
$router->get('/especialidades-profesionales', 'PageController@especialidadesprofesionales');
$router->get("/sala-espera", "ConsultasController@salaEspera");
$router->get("/atender-turnos", "ConsultasController@turnos");
$router->get("/finalizar-turno", "ConsultasController@finalizar");
