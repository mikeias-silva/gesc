<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Turma extends Model
{
    protected $table = 'turma';
    public $timestamps = false;
    protected $fillable = array('GrupoConvivencia', 'turno', 'statusTurma', 'idUsuario');

    protected $primaryKey = 'idturma';
}
