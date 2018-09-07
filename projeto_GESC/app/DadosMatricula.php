<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;


class DadosMatricula extends Model
{
    protected $table = 'dadosmatricula';
    public $timestamps = false;
    protected $fillable = array('idmatricula', 'datamatricula', 'serieescolar', 'anomatricula', 'idturma', 'grupoconvivencia',
                                    'idvaga', 'idcrianca');
   


  public function nomeMatricula(){
    $id = $this->idmatricula;
    
    
    $nomecrianca = DB::select('select nomepessoa from nomeidadematricula where idmatricula
     = ?', array($id));
   
 //   dd($nomecrianca);
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
    public function nomeTurma(){
        $id = $this->idturma;

        $nometurma = DB::select('select grupoconvivencia from turma where idturma = ?', array($id));

        foreach($nometurma as $nometurma){
            return $nometurma->GrupoConvivencia;
            
        }

    }
    public function anoMatricula(){
       
        return Carbon::parse($this->anomatricula)->format('d/m/Y');
        
     }

     static function matriculasAnoAnterior($anovaga){
        //return $anovaga;
        return DadosMatricula::where('anovaga', $anovaga)->get();
    }
}
