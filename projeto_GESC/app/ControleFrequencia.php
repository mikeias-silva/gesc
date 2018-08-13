<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ControleFrequancia extends Model
{
    protected $table = 'frequencia';
    public $timestamps = false;
    protected $fillable = array('anofrequencia', 'mesfrequencia', 'totalfaltas', 'idmatricula');

    protected $primaryKey = 'idfrequencia';
}