<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dias_funcionamento extends Model
{
    protected $table = 'dias_funcionamento';
    public $timestamps = false;
    protected $fillable = array('jan', 'fev', 'mar', 'abr', 'jun', 'jul', 'ago', 'setembro', 'out', 'nov', 'dez');

    protected $primaryKey = 'idano';

   public function post()
    {
        return $this->belongsTo(Post::class);
    }
}