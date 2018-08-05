<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class membro_familia extends Model
{
    protected $table = 'membros_familia';
    public $timestamps = false;

    protected $fillable = array('nomemembro', 'datanascimento', 'localtrabalho', 'salario', 'idescola', 'idfamilia');
    protected $primaryKey = 'idmembro';
}
