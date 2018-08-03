<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instituicao extends Model
{
    protected $table = 'instituicao';
    public $timestamps = false;
    protected $fillable = array('nomeinstituicao', 'logradouro', 'email', 'telefone', 'nummetasmensais', 'numtermocolaboradorformento',
                                    'numplanotrabalho', 'entidademantenedora', 'entidadeexecutora');
    protected $primaryKey = 'idinstituicao';

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
   // protected $fillable = array('GrupoConvivencia', 'Turno', 'statusTurma', 'idUsuario');

}
