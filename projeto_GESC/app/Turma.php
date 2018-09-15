<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;

class Turma extends Model
{
    protected $table = 'turma';
    public $timestamps = false;
    protected $fillable = array('grupoconvivencia', 'turno', 'statusturma', 'idusuario');

    protected $primaryKey = 'idturma';


    static function turmasAtiva(){
        return DB::select('select * from turma where statusturma = 1');
    }
}
