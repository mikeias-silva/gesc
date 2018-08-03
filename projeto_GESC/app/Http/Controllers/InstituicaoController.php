<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Instituicao;

class InstituicaoController extends Controller
{
    public function mostraInstituicao(){

        //$inst = DB::select('select * from instituicao');

        $instituicao = instituicao::all();

        // SELECT CIDADE E ESTADO ASSOCIADO A INSTITUIÇÃO
     //   select nomeCidade, siglaEstado from cidade, estado join instituicao 
     //   where cidade.idCidade = instituicao.idcidade and cidade.idUF = estado.idUF
     $cidadeins= DB::select('select nomecidade, siglaestado from cidade, estado join instituicao where cidade.idcidade = instituicao.idcidade and cidade.iduf = estado.iduf');


       //return $cidadeins;
        return view('instituicao.dadosinstituicao')->with('instituicao', $instituicao)->with('cidadeins', $cidadeins);
    }

    public function editar(Request $request){
        $instituicao = instituicao::find($request->idinstituicao);
      
        $instituicao->update($request->all());
        

        return redirect()->action('InstituicaoController@mostraInstituicao');
    }
}
