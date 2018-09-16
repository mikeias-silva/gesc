<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Familia extends Model
{
    protected $table = 'familia';

    public $timestamps = false;

    protected $fillable = array('rendapercapta', 'moradia', 'arearisco', 'tipohabitacao', 'numnis', 'beneficiopc', 'idcras');

    protected $primaryKey = 'idfamilia';

}
