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

            foreach($nomecrianca as $nome){
               return $nome->nomepessoa;
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

    public function nomeTurma(){
        $id = $this->idturma;

        $nometurma = DB::select('select GrupoConvivencia from turma where idturma = ?', array($id));

        foreach($nometurma as $nometurma){
            return $nometurma->GrupoConvivencia;
            
        }
    }
}
