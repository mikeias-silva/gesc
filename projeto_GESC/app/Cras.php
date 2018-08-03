<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cras extends Model
{
    protected $table = 'cras';
    public $timestamps = false;
    protected $fillable = array('nomecras', 'telefone', 'statuscras');

    protected $primaryKey = 'idcras';

   public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
