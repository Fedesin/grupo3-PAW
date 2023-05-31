<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class PrimerasTablasMigration extends AbstractMigration
{
    public function change(): void
    {
        $tableEspecialidades = $this->table('especialidades');
        $tableEspecialidades->addColumn('nombre', 'string')
            ->addColumn('estado', 'string')
            ->create();
        $dataEspecialidades = array(
                [
                    'nombre' => 'Clinica Medica',
                    'estado' => 'activo'
                ],
                [
                    'nombre' => 'Dermatología',
                    'estado' => 'activo'
                ],
                [
                    'nombre' => 'Cardiología',
                    'estado' => 'activo'
                ]
        );
    
        $this->table('especialidades')->insert($dataEspecialidades)->save();

        $tableObrasSociales = $this->table('obras_sociales');
        $tableObrasSociales->addColumn('nombre', 'string')
            ->addColumn('estado', 'string')
            ->addColumn('path_archivo', 'string', ['null' => true])
            ->create();

        $dataObrasSociales = array(
                [
                    'nombre' => 'OSDE',
                    'estado' => 'activo'
                ],
                [
                    'nombre' => 'OMINT',
                    'estado' => 'activo'
                ],
                [
                    'nombre' => 'SWISS MEDICAL',
                    'estado' => 'activo'
                ],
                [
                    'nombre' => 'PAMI',
                    'estado' => 'activo'
                ]
        );
    
        $this->table('obras_sociales')->insert($dataObrasSociales)->save();

        $tableProfesionales = $this->table('profesionales');
        $tableProfesionales->addColumn('nombre', 'string')
            ->addColumn('apellido', 'string')
            ->addColumn('matricula', 'integer')
            ->addColumn('id_especialidad', 'integer')
            ->addColumn('duracionTurno', 'integer')
            ->addColumn('estado', 'string')
            ->addColumn('cargo_directivo', 'string', ['null' => true])
            ->addColumn('email', 'string',['null' => true])
            ->addColumn('path_archivo', 'string',  ['null' => true])
            ->addForeignKey('id_especialidad', 'especialidades', 'id')
            ->create();
    
        $dataProfesionales = array(
                    [
                        'nombre' => 'Francisco Hernan',
                        'apellido' => 'Rodriguez',
                        'matricula' => '129088',
                        'id_especialidad' => '1',
                        'duracionTurno' => '30',
                        'estado' => 'activo',
                        'cargo_directivo' => 'Director General',
                        'email' => 'director-general@mail.com'
                    ],
                    [
                        'nombre' => 'Maria Alejandra',
                        'apellido' => 'Barrionuevo',
                        'matricula' => '985263',
                        'id_especialidad' => '2',
                        'duracionTurno' => '20',
                        'estado' => 'activo'
                    ],
                    [
                        'nombre' => 'Cristian Luis',
                        'apellido' => 'Martinez',
                        'matricula' => '675543',
                        'id_especialidad' => '3',
                        'duracionTurno' => '30',
                        'estado' => 'activo',
                        'cargo_directivo' => 'Director de Cirugía',
                        'email' => 'director-cirugia@mail.com'
                    ],
                    [
                        'nombre' => 'Rocio Maribel',
                        'apellido' => 'Ledesma',
                        'matricula' => '209877',
                        'id_especialidad' => '1',
                        'duracionTurno' => '20',
                        'estado' => 'activo'
                    ]
            );
        
        $this->table('profesionales')->insert($dataProfesionales)->save();

        $tableHorariosAtencion = $this->table('horario_atencion');
        $tableHorariosAtencion->addColumn('id_profesional','integer')
            ->addColumn('dia','string')
            ->addColumn('hora_inicio', 'time')
            ->addColumn('hora_fin','time')
            ->addForeignKey('id_profesional', 'profesionales', 'id')
            ->create();

        $dataHorariosAtencion = array(
                [
                    'id_profesional' => '1',
                    'dia' => 'Lunes',
                    'hora_inicio' => '09:00:00',
                    'hora_fin' => '15:00:00'
                ],
                [
                    'id_profesional' => '1',
                    'dia' => 'Miercoles',
                    'hora_inicio' => '09:00:00',
                    'hora_fin' => '15:00:00'
                ],
                [
                    'id_profesional' => '1',
                    'dia' => 'Viernes',
                    'hora_inicio' => '09:00:00',
                    'hora_fin' => '15:00:00'
                ],
                [
                    'id_profesional' => '2',
                    'dia' => 'Martes',
                    'hora_inicio' => '12:00:00',
                    'hora_fin' => '18:00:00'
                ],
                [
                    'id_profesional' => '2',
                    'dia' => 'Jueves',
                    'hora_inicio' => '12:00:00',
                    'hora_fin' => '18:00:00'
                ],
                [
                    'id_profesional' => '3',
                    'dia' => 'Lunes',
                    'hora_inicio' => '14:00:00',
                    'hora_fin' => '19:00:00'
                ],
                [
                    'id_profesional' => '3',
                    'dia' => 'Jueves',
                    'hora_inicio' => '14:00:00',
                    'hora_fin' => '19:00:00'
                ],
                [
                    'id_profesional' => '4',
                    'dia' => 'Martes',
                    'hora_inicio' => '14:00:00',
                    'hora_fin' => '19:00:00'
                ],
                [
                    'id_profesional' => '4',
                    'dia' => 'Viernes',
                    'hora_inicio' => '14:00:00',
                    'hora_fin' => '19:00:00'
                ]
        );
    
        $this->table('horario_atencion')->insert($dataHorariosAtencion)->save();

        $tableProfesionales_ObrasSociales = $this->table('profesionales_obrasSociales');
        $tableProfesionales_ObrasSociales->addColumn('id_profesional', 'integer')
            ->addColumn('id_obraSocial','integer')
            ->addForeignKey('id_profesional', 'profesionales', 'id')
            ->addForeignKey('id_obraSocial', 'obras_sociales', 'id')
            ->create();

        $dataProfObrasSociales = array(
                [
                    'id_profesional' => '1',
                    'id_obraSocial' => '1'
                ],
                [
                    'id_profesional' => '1',
                    'id_obraSocial' => '2'
                ],
                [
                    'id_profesional' => '1',
                    'id_obraSocial' => '3'
                ],
                [
                    'id_profesional' => '1',
                    'id_obraSocial' => '4'
                ],
                [
                    'id_profesional' => '2',
                    'id_obraSocial' => '1'
                ],
                [
                    'id_profesional' => '2',
                    'id_obraSocial' => '2'
                ],
                [
                    'id_profesional' => '2',
                    'id_obraSocial' => '3'
                ],
                [
                    'id_profesional' => '3',
                    'id_obraSocial' => '1'
                ],
                [
                    'id_profesional' => '3',
                    'id_obraSocial' => '2'
                ],
                [
                    'id_profesional' => '4',
                    'id_obraSocial' => '1'
                ],
                [
                    'id_profesional' => '4',
                    'id_obraSocial' => '2'
                ],
                [
                    'id_profesional' => '4',
                    'id_obraSocial' => '3'
                ],
                [
                    'id_profesional' => '4',
                    'id_obraSocial' => '4'
                ],
        );
    
        $this->table('profesionales_obrasSociales')->insert($dataProfObrasSociales)->save();

        $tableUsuario = $this->table('usuarios');
        $tableUsuario->addColumn('nombre', 'string', ['limit' => 40])
            ->addColumn('apellido', 'string', ['limit' => 40])
            ->addColumn('email', 'string', ['limit' => 60])
            ->addColumn('password', 'string')
            ->addColumn('rol', 'string')
            ->create();

        $tableTurno = $this->table('turnos');
        $tableTurno->addColumn('id_profesional', 'integer')
            ->addColumn('nombre_paciente', 'string', ['limit' => 40])
            ->addColumn('apellido_paciente', 'string', ['limit' => 40])
            ->addColumn('email_paciente', 'string', ['limit' => 60])
            ->addColumn('telefono_paciente', 'integer')
            ->addColumn('fecha_nacimiento_paciente', 'date')
            ->addColumn('edad_paciente', 'integer')
            ->addColumn('fecha_turno', 'timestamp')
            ->addColumn('estado_turno', 'integer')
            ->addColumn('path_archivo', 'string',  ['null' => true])
            ->addForeignKey('id_profesional', 'profesionales', 'id')
            ->create();

        $tableNoticias = $this->table('noticias');
        $tableNoticias->addColumn('titulo', 'string', ['limit' => 40])
            ->addColumn('fecha', 'date')
            ->addColumn('cuerpo', 'string')
            ->addColumn('path_archivo', 'string',  ['null' => true])
            ->create();

        $dataNoticias = array(
                [
                    'titulo' => 'Titulo Noticia A',
                    'fecha' => '2021-06-20',
                    'cuerpo' => 'Cuerpo de la Noticia A'
                ],
                [
                    'titulo' => 'Titulo Noticia B',
                    'fecha' => '2021-06-22',
                    'cuerpo' => 'Cuerpo de la Noticia B'
                ],
                [
                    'titulo' => 'Titulo Noticia C',
                    'fecha' => '2021-06-25',
                    'cuerpo' => 'Cuerpo de la Noticia C'
                ]
        );
    
        $this->table('noticias')->insert($dataNoticias)->save();

    }
}