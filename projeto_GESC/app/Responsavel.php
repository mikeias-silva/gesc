<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Carbon;
class Responsavel extends Model
{
    protected $table = 'responsavel';
    public $timestamps = false;

    protected $fillable = array('profissao', 'salario', 'estadocivil', 'localtrabalho', 'telefone', 'telefone2', 'escolaridade',
    'outrasobs', 'idpessoa', 'idpessoa', 'idfamilia');

    protected $primaryKey = 'idresponsavel';


        public function nomeResponsavel(){
            $id = $this->idresponsavel;
            
            
            $nomeresponsavel = DB::select('select nomeresponsavel from parentes where idresponsavel
            = ?', array($id));
        
        //   dd($nomecrianca);
            foreach($nomeresponsavel as $nome){
                
            return $nome->nomeresponsavel;
            }
    }
    public function cpfResponsavel(){
        $id = $this->idresponsavel;
        
        
        $cpfresponsavel = DB::select('select cpfresponsavel from parentes where idresponsavel
        = ?', array($id));
    
    //   dd($nomecrianca);
        foreach($cpfresponsavel as $cpf){
            
        return $cpf->cpfresponsavel;
        }
}
    public function idadeResponsavel(){
        $id = $this->idresponsavel;
            
        $hoje = Carbon::now();
        $nascimentoresponsavel = DB::select('select nascimentoresponsavel from parentes where idresponsavel
        = ?', array($id));

        foreach($nascimentoresponsavel as $nasc){
            $idade = $hoje->diffInYears($nasc->nascimentoresponsavel);
            return $idade;
        }
        
    }
}
