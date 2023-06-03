<?php

require __DIR__ . '/../vendor/autoload.php';

use Paw\Core\Router;
use Paw\Core\Config;
use Paw\Core\Request;
use Paw\Core\Database\ConnectionBuilder;

use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Twig\Loader\FilesystemLoader;


$handler = new StreamHandler(__DIR__ . "/../" . Config::getLogFile());
$handler->setLevel(Config::getLogLevel());

$log = new Logger('mvc-app');
$log->pushHandler($handler);

$connectionBuilder = new ConnectionBuilder;
$connectionBuilder->setLogger($log);
$connection = $connectionBuilder->make();


$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

$request = new Request;

$loader = new FilesystemLoader(__DIR__ . "/App/Views/");
$twig = new \Twig\Environment($loader);

$router = new Router('ErrorController@notFound', 'ErrorController@internalError');
$router->setLogger($log);
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
$router->get('/especialidades-profesionales', 'ProfesionalesController@especialidadesprofesionales');
$router->get("/sala-espera", "ConsultasController@salaEspera");
$router->get("/atender-turnos", "ConsultasController@turnos");
$router->get("/finalizar-turno", "ConsultasController@finalizar");

