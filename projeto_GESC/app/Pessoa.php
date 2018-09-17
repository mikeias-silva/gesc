<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Pessoa extends Model
{
    protected $table = 'pessoa';
    public $timestamps = false;

    protected $fillable = array('nomepessoa', 'datanascimento','rg', 'emissorrg', 'cpf', 'sexo', 'cep', 'logradouro',
    'ncasa', 'bairro', 'complementoendereco');

    protected $primaryKey = 'idpessoa';


    static function buscaPessoa($idpessoa){
        return DB::select('select * from pessoa where idpessoa = ?', [$idpessoa]);
    }
}
