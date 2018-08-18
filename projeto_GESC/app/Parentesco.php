<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parentesco extends Model
{
    protected $table = 'parentesco';
    public $timestamps = false;

    protected $fillable = array('idcrianca', 'idresponsavel');

}
