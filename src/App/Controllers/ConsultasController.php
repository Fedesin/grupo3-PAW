<?php

namespace Paw\App\Controllers;
use Paw\Core\Validator;

class ConsultasController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function consultarturno()
    {
        parent::showView('consultarturno.view.twig');
    }

    public function solicitarturno()
    {
        parent::showView('solicitarturno.view.twig', $_GET);
    }

    public function confirmardatos()
    {
        parent::showView('confirmardatos.view.twig');
    }

    public function solicitarturnoProcess()
    {
        $data = $_POST;
        $valido = true;

        //agregar mas validaciones
        $data = Validator::remover_specialchar($data);

        $data['nombre_apellido'] = Validator::limpiar_espacios($data['nombre_apellido']);
        $errors = Validator::validar_nombre_apellido($data['nombre_apellido']);
        if(count($errors) > 0) {
            $data['nombre_apellido_invalido'] = $errors;
            $valido = false;
        }

        $errors = Validator::validar_dni($data['dni']);
        if(count($errors) > 0) {
            $data['dni_invalido'] = $errors;
            $valido = false;
        }

        $errors = Validator::validar_telefono($data['telefono']);
        if(count($errors) > 0) {
            $data['telefono_invalido'] = $errors;
            $valido = false;
        }

        $errors = Validator::validar_fecha($data['fecha_nacimiento'], false, true);
        if(count($errors) > 0) {
            $data['fecha_nacimiento_invalido'] = $errors;
            $valido = false;
        }

        if(isset($data['fecha_turno'])) {
            $errors = Validator::validar_fecha($data['fecha_turno'], true);
            if(count($errors) > 0) {
                $data['fecha_turno_invalido'] = $errors;
                $valido = false;
            }
        } else {
            $data['fecha_turno_invalido'] = ["Campo obligatorio"];
        }
        

        $errors = Validator::validar_email($data['email']);
        if(count($errors) > 0) {
            $data['email_invalido'] = $errors;
            $valido = false;
        }

        $files = $_FILES['estudio'];
        if(isset($files)) {
            for ($i = 0; $i < count($files['name']); $i++) {
                if(!empty($files['name'][$i])) {
                    $file = [
                        'name' => $files['name'][$i],
                        'type' => $files['type'][$i],
                        'tmp_name' => $files['tmp_name'][$i],
                        'error' => $files['error'][$i],
                        'size' => $files['size'][$i]
                    ];
                    $errors = Validator::validar_imagen($file);
                    if(count($errors) > 0) {
                        $data['estudio_invalido'] = $errors;
                        $valido = false;
                    }
                }
            }
        }
      
        if(isset($data['hora_turno'])) {
            $errors = Validator::validar_hora($data['hora_turno']);
            if(count($errors) > 0) {
                $data['hora_turno_invalido'] = $errors;
                $valido = false;
            }
        } else {
            $data['hora_turno_invalido'] = ["Campo obligatorio"];
        }

        if($valido) {
            parent::showView('confirmardatos.view.twig', $data);
        } else {
            parent::showView('solicitarturno.view.twig', $data);
        }
    }

    public function confirmarturnoProcess()
    {
        //Acá usamos los datos de la sesión para no revalidar
        //Hay que guardar en la db y mostrar pantalla de éxito

        parent::showView('confirmardatos.view.twig', [ 'enviado' => true ]);      
    }

    public function consultarturnoProcess()
    {
        $formulario = $_POST;
    }

    public function salaEspera()
    {
        if( isset($_GET['type']) && ($_GET['type'] == 'json')) {
            $json = [
                "tiempo_estimado" => 15,
                "lista_turnos" => [[
                    "id" => "ASC-011",
                    "consultorio" => 2,
                    "nombre" => "María Rosa",
                    "apellido" => "Leguizamón"
                ], [
                    "id" => "FKX-546",
                    "consultorio" => 3,
                    "nombre" => "Martín",
                    "apellido" => "Robledo"
                ], [
                    "id" => "REZ-369",
                    "consultorio" => 2,
                    "nombre" => "Robert Wojciech",
                    "apellido" => "Zelazek"
                ], [
                    "id" => "FHU-654",
                    "consultorio" => 4,
                    "nombre" => "Mariano",
                    "apellido" => "De La Canal"
                ], [
                    "id" => "SRG-981",
                    "consultorio" => 8,
                    "nombre" => "Eduardo",
                    "apellido" => "Schmidt"
                ]]
            ];
            return parent::json($json);
        }

        parent::showView('salaespera.view.twig');
    }

    public function turnos()
    {
        if( isset($_GET['type']) && ($_GET['type'] == 'json')) {
            $json = [
                "lista_turnos" => [[
                    "id" => "ASC-011",
                    "horario" => "08:00",
                    "nombre" => "María Rosa",
                    "apellido" => "Leguizamón"
                ], [
                    "id" => "FKX-546",
                    "horario" => "09:00",
                    "nombre" => "Martín",
                    "apellido" => "Robledo"
                ], [
                    "id" => "REZ-369",
                    "horario" => "09:30",
                    "nombre" => "Robert Wojciech",
                    "apellido" => "Zelazek"
                ], [
                    "id" => "FHU-654",
                    "horario" => "10:00",
                    "nombre" => "Mariano",
                    "apellido" => "De La Canal"
                ], [
                    "id" => "SRG-981",
                    "horario" => "12:00",
                    "nombre" => "Eduardo",
                    "apellido" => "Schmidt"
                ]]
            ];
            return parent::json($json);
        }

        parent::showView('atenderturnos.view.twig');
    }

    public function finalizar()
    {
        $id = isset($_GET['id'])? $_GET['id'] : null;

        if($id) {
            //Finalizar turno en la DB/modelo
        }
    }
}