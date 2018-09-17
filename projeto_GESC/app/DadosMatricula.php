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
                                  'statuscadastro', 'idvaga', 'idcrianca', 'idturma');
   


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
            return $nometurma->grupoconvivencia;
            
        }

    }
    public function anoMatricula(){
       
        return Carbon::parse($this->anomatricula)->format('d/m/Y');
        
     }

     static function matriculasAnoAnterior($anovaga){
        //return $anovaga;
        return DadosMatricula::where('anovaga', $anovaga)->get();
    }

    static function matriculasAnoSeguinte(){
        $anovaga = Carbon::now()->year+1;
        // dd($anovaga);
        return DB::select('select * from dadosmatricula where anovaga > ? ', [$anovaga]);
        return DadosMatricula::where('anovaga', $anovaga)->get();
    }

    static function rematricula(){
        $anovaga = Carbon::now()->year;
        $dadomatricula = DB::select('select * from dadosmatricula where anovaga >= ?', [$anovaga]);
        //  dd( $dadomatricula);
        foreach ($dadomatricula as $dadomatricula) {
           $essacrianca =  $dadomatricula->idcrianca;
        }
        // dd($essacrianca);
       
       if (!empty($essacrianca)) {
           
            return DadosMatricula::where('anovaga', $anovaga)->where('idcrianca', '!=', $essacrianca)->get();
       }
        
            
            // dd($opa);
            return DadosMatricula::where('anovaga', $anovaga)->get();
    }

    static function matriculasAtiva(){
      $esseano = Carbon::now()->year;
        //DB::select('select * from matriculas where idmatricula = ?', 1);
        
        //return DB::table('matriculas')->where('statuscadastro', 'Ativo')->get();
        return DadosMatricula::where('statuscadastro', 'Ativo')->where('anovaga', $esseano)->get();
    }

    
    static function matriculasInativas(){
        $esseano = Carbon::now()->year;
        return DadosMatricula::where('statuscadastro', 'Inativo')->where('anovaga', $esseano)->get();
    }

    static function matriculasEspera(){
        $esseano = Carbon::now()->year;
        return Matricula::where('statuscadastro', 'Espera')->get();
    }
}
