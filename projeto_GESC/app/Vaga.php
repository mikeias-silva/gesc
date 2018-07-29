<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vaga extends Model
{
    protected $table = 'vagas';
    public $timestamps = false;
    protected $fillable = array('idademin', 'idademax', 'numvaga', 'anovaga', 'idinstituicao');

    protected $primaryKey = 'idvaga';

}
