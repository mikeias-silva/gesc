<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Membro_Familia extends Model
{
    protected $table = 'membros_familia';
    public $timestamps = false;

    protected $fillable = array('nomemembro', 'datanascimento', 'localtrabalho', 'salario', 'idescola', 'idfamilia');
    //protected $primaryKey = 'idmembro';
    protected $primaryKey = 'idmembro';

}
