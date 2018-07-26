<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = 'usuario';
    public $timestamps = false;
    protected $fillable = array('nome', 'email', 'statususuario', 'senha', 'nomeusuario', 'tipousuario');

    /*protected $guarded = ['id'];

   public function post()
    {
        return $this->belongsTo(Post::class);
    }*/
}