<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PublicoPrioritario extends Model
{
    protected $table = 'publicoprioritario';
  
    public $timestamps = false;
    protected $fillable = array('publicoprioritario');

    protected $primaryKey = 'idpublicoprioritario';
}
