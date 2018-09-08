<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Carbon;

class Vaga extends Model
{
    protected $table = 'vagas';
    public $timestamps = false;
    protected $fillable = array('idademin', 'idademax', 'numvaga', 'anovaga', 'idinstituicao', 'statusvaga');

    protected $primaryKey = 'idvaga';

    static function vagaRematricula(){
        $ano = Carbon::now()->year;

        
        return DB::select('select * from vagas where anovaga > ?', [$ano]);
    }

    static function vagaMatricula(){
        $ano = Carbon::now();

        return DB::select('select * from vagas where anovaga = ?', [$ano]);
    }

    static function vagasAnteriores(){
        $ano = Carbon::now();

        return DB::select('select * from vagas where anovaga < ?', [$ano]);
    }
}
