<?php

namespace Paw\App\Models;

use Paw\Core\Model;
use Exception;

class Noticia extends Model
{
    protected $table = 'noticias';

    protected $fields = [
        "titulo" => null,
        "fecha" => null,
        "cuerpo" => null,
        "path_archivo" => null,
    ];
}