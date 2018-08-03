<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;

class Matricula extends Model
{
    protected $table = 'matriculas';

    public $timestamps = false;

    protected $fillable = array('datasairespera', 'dataespera', 'statuscadastro', 'serieescolar', 'anomatricula', 
    'idturma', 'idvaga', 'idcrianca');

    protected $primaryKey = 'idmatricula';

    public function nomeMatricula(){
            $id = $this->idcrianca;
            
            
            $nomecrianca = DB::select('select nomepessoa from pessoa, crianca where pessoa.idpessoa = ? 
            and crianca.idpessoa = ?', array($id, $id));

            foreach($nomecrianca as $nome){
                echo $nome->nomepessoa;
            }
            //dd($nomecrianca->nomepessoa);
           // return implode("", $nomecrianca );
          // $teste = $nomecrianca[0];
          // dd($teste);
           // return $teste ;

            //select nomepessoa from pessoa, crianca where pessoa.idpessoa = 1 and crianca.idpessoa = 1;


//            $pessoas = Pessoa::all();

  //          $criancas = Criacas::all();

           // $this->idcrianca = $pessoas->idpessoa = $criancas->idpessoa;
      //  return;
    }
}
