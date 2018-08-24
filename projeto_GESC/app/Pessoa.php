<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    protected $table = 'pessoa';
    public $timestamps = false;

    protected $fillable = array('nomepessoa', 'datanascimento','rg', 'emissorrg', 'cpf', 'sexo', 'cep', 'logradouro',
    'ncasa', 'bairro', 'complementoendereco');

   // protected $pimaryKey = 'idpessoa';
}
