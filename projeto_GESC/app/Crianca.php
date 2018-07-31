<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Crianca extends Model
{
    protected $table = 'crianca';
    public $timestamps = false;

    protected $fillable = array('obssaude', 'datacadastro', 'idescola', 'idpublicoprioritario', 'idpessoa');


    protected $primaryKey = 'idcrianca';
}
