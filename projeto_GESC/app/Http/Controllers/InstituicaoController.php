<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Instituicao;
use App\Dias_funcionamento;

class InstituicaoController extends Controller
{
    public function mostraInstituicao(){

        //$inst = DB::select('select * from instituicao');

        $instituicao = instituicao::all();
        $ano = date('Y');
        $diasFuncionamento = DB::select("select * from dias_funcionamento where idano='{$ano}'");

    // SELECT CIDADE E ESTADO ASSOCIADO A INSTITUIÇÃO
    //  select nomeCidade, siglaEstado from cidade, estado join instituicao 
    //  where cidade.idCidade = instituicao.idcidade and cidade.idUF = estado.idUF
        $cidadeins= DB::select('select nomecidade, siglaestado from cidade, estado join instituicao where cidade.idcidade = 
        instituicao.idcidade and cidade.iduf = estado.iduf');

     

       //return $cidadeins;
        return view('instituicao.dadosinstituicao')->with('instituicao', $instituicao)->with('cidadeins', $cidadeins)->with('ano', $ano)->with('diasFuncionamento', $diasFuncionamento);
    }

    public function editar(Request $request){
        $teste = $request->idinstituicao;
        if($teste==""){
            $instituicao = new Instituicao($request->all());
            $instituicao->save();
        } else {
            $instituicao = instituicao::find($request->idinstituicao);
            $instituicao->update($request->all());
        }
        return redirect()->action('InstituicaoController@mostraInstituicao');
    }

    public function difinirDias(Request $request){
        $ano = date('Y');
        $idInstituicao = DB::select("select max(idinstituicao) as id from instituicao");
        $diasFuncionamento_teste = dias_funcionamento::find($request->idano);
        if($diasFuncionamento_teste==null){
            $diasFuncionamento = new dias_funcionamento($request->all());
            $diasFuncionamento->idinstituicao = $idInstituicao[0]->id;
            $diasFuncionamento->idano = $ano;
            $diasFuncionamento->save();
        } else {
            $diasFuncionamento = dias_funcionamento::find($request->idano);
            $diasFuncionamento->update($request->all());
        }
        return redirect()->action('InstituicaoController@mostraInstituicao');
    }
}
