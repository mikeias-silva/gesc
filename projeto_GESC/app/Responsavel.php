<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Responsavel extends Model
{
    protected $table = 'responsavel';
    public $timestamps = false;

    protected $fillable = array('profissao', 'salario', 'estadocivil', 'localtrabalho', 'telefone', 'telefone2', 'escolaridade',
    'outrasobs', 'idpessoa', 'idpessoa', 'idfamilia');

    protected $primaryKey = 'idresponsavel';
}
