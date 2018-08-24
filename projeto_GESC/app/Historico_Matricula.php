<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Historico_Matricula extends Model
{
    protected $table = 'historico_matricula';
    public $timestamps = false;
    protected $fillable = array('datainativacao', 'dataativacao', 'idmatricula', 'motivoinativacao');

    protected $primaryKey = 'idhistoricomatricula';




    public function dataInativar(){
        
        
    }

}
