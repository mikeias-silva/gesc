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
            $id = $this->idcrianca;
            
            
            $nomecrianca = DB::select('select nomepessoa from pessoa, crianca where pessoa.idpessoa = ? 
            and crianca.idpessoa = ?', array($id, $id));
           
         //   dd($nomecrianca);
            foreach($nomecrianca as $nome){
                
               return $nome->nomepessoa;
            }
    }



    public function idadeMatricula(){
        $id = $this->idcrianca;
            
        $hoje = Carbon::now();
        $nascimentocrianca = DB::select('select datanascimento from pessoa, crianca where pessoa.idpessoa = ? 
        and crianca.idpessoa = ?', array($id, $id));

        foreach($nascimentocrianca as $nasc){
            $idade = $hoje->diffInYears($nasc->datanascimento);
            return $idade;
        }
        
    }

    static function matriculasAtiva(){
        //)->get();
        //DB::select('select * from matriculas where idmatricula = ?', 1);
        
        //return DB::table('matriculas')->where('statuscadastro', 'Ativo')->get();
        return Matricula::where('statuscadastro', 'Ativo')->get();
    }

    static function matriculasInativas(){

        return Matricula::where('statuscadastro', 'Inativo')->get();
    }

    static function matriculasEspera(){

        return Matricula::where('statuscadastro', 'Espera')->get();
    }

    public function nomeTurma(){
        $id = $this->idturma;

        $nometurma = DB::select('select GrupoConvivencia from turma where idturma = ?', array($id));

        foreach($nometurma as $nometurma){
            return $nometurma->GrupoConvivencia;
            
        }

    }

    public function anoMatricula(){
       
       return Carbon::parse($this->anomatricula)->format('d-m-y');
       
    }
}
