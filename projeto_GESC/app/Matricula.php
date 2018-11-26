<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Carbon;

class Matricula extends Model
{
    protected $table = 'matriculas';

    public $timestamps = false;

    protected $fillable = array('datasairespera', 'dataespera', 'statuscadastro', 'serieescolar', 'anomatricula', 
    'idturma', 'idvaga', 'idcrianca');

    protected $primaryKey = 'idmatricula';

    public function nomeMatricula(){
      //  return dd('p');
            $id = $this->idmatricula;
            
            
             $nomecrianca = DB::select('select nomepessoa from nomeidadematricula where idmatricula = ?', array($id));
           
         //return dd($nomecrianca);
            foreach($nomecrianca as $nome){
                
               return $nome->nomepessoa;
            }
    }



    public function idadeMatricula(){
        $id = $this->idmatricula;
            
        $hoje = Carbon::now();
        $nascimentocrianca = DB::select('select datanascimento from nomeidadematricula where idmatricula
        = ?', array($id));

        foreach($nascimentocrianca as $nasc){
            $idade = $hoje->diffInYears($nasc->datanascimento);
            return $idade;
        }
        
    }


    static function vagasMatriculas(){

        $idmatricula = $this->idmatricula;
        return DB::select('select * from vagasdasmatriculas where idmatricula = ? '[$idmatricula]);
    }

    static function matriculasAnoAnterior($anovaga){
        //return $anovaga;
        return DB::select('select * from dadosmatricula where anovaga = ?', [$anovaga]);
    }

    static function matriculasAnoSeguinte(){
        $anovaga = Carbon::now()->year+1;
       // return Matricula::join('vagas', $this->idvaga, '=', 'vagas.?')
       return Matricula::where('anomatricula', $anovaga)->get();
      //  return DB::select('select * from matriculas where anomatricula > ? ', [$anovaga]);
        //return DB::select('select * from dadosmatricula where anovaga > ?', [$anovaga]);
    }
    static function matriculasAtiva(){
        $agora = Carbon::now();
        return Matricula::where('statuscadastro', 'Ativo')->where('anomatricula', '<=', $agora)->get();
    }

    static function matriculasInativas(){
        $hoje = Carbon::now();
        return Matricula::where('statuscadastro', 'Inativo')->where('anomatricula', '<=', $hoje)->get();
    }

    static function matriculasEspera(){

        return Matricula::where('statuscadastro', 'Espera')->get();
    }

    public function nomeTurma(){
        $id = $this->idturma;

        $nometurma = DB::select('select grupoconvivencia from turma where idturma = ?', array($id));

        foreach($nometurma as $nometurma){
            return $nometurma->grupoconvivencia;
            
        }

    }

    public function anoMatricula(){
       
       return Carbon::parse($this->anomatricula)->format('d/m/Y');
       
    }


    public function crasMatricula(){
        //$id = $this->idcrianca;

         $familiaMatricula = DB::select('select idfamilia from parentes where idcrianca = ?', array(48));


         foreach ($familiaMatricula as $familiamt) {
            
            return $essafamilia = $familiamt->idfamilia;
            
            
         }
  
    }

    static function rematricula(){
     //  $qtdcrianca = DB::select('select idcrianca from matriculas group by idcrianca having count(*) > 1');

      $qtdcrianca = DB::select('select idcrianca from matriculas where anomatricula = 2019');

       foreach ($qtdcrianca as $crianca) {
           $idcrianca[] = $crianca->idcrianca;
       }

       //$qtdcriancaatual = DB::select('select idcrianca from matriculas where')
      // return dd($idcrianca);
       //return Matricula::where('idcrianca', $idcrianca)->get();
        return Matricula::whereNotIn('idcrianca', $idcrianca)->get();
       
    }
}
