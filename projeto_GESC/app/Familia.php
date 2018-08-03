<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Familia extends Model
{
    protected $table = 'familia';

    public $timestamps = false;

    protected $fillable = array('redapercapta', 'moradia', 'arearisco', 'tipohabitacao', 'numnis', 'beneficiopc', 'idcras', 'idmembro');

    protected $pimaryKey = 'idfamilia';

}
