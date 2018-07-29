<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Matricula extends Model
{
    protected $table = 'matriculas';

    public $timestamps = false;

    protected $fillable = array('datasairespera', 'dataespera', 'statuscadastro', 'serieescolar', 'anomatricula', 
    'idturma', 'idvaga', 'idcrianca');

    protected $primaryKey = 'idmatricula';
}
