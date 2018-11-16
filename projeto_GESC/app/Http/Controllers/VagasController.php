<?php 
namespace App\Http\Controllers;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\DB;
use App\Http\Requests\SetTimezone;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

use App\Vaga;
use App\Instituicao;
use Illuminate\Support\Carbon;
class VagasController extends Controller {

    public function vagasAnoAnterior(){
       // return dd('opa');
        //return opa;
        $anopassado = Carbon::now()->year-1;
       // return $anopassado;
        //$vagas = Vaga::all()->orderBy('anovaga');
        $vagas = DB::select("select * from vagas order by anovaga, idademin");
        foreach ($vagas as $vaga) {
          //  return dd('opa');
         $vaga->anovaga;
            if ($vaga->anovaga == $anopassado) {
               // return dd('opa');
                $vagaedita = Vaga::find($vaga->idvaga);
                $vagaedita->update(['statusvaga'=>0]);
            }
           
        }
    }
    public function listaVagas(){


        

        $this->vagasAnoAnterior();
        
        //$vaga = vaga::all();
        $vaga = DB::select("select * from vagas order by anovaga, idademin");
        $idadeMin=[];
        $idadeMax=[];
        $anoLista=[];
        $i=0;
        $ano = date('Y');
        foreach($vaga as $c){
            $idadeMin[$i]=$c->idademin;
            $i++;
        }
        $i=0;
        foreach($vaga as $b){
            $idadeMax[$i]=$b->idademax;
            $i++;
        }
        $i=0;
        foreach($vaga as $a){
            $anoLista[$i]=$a->anovaga;
            $i++;
        }
        $listaIdadeMin = implode('|', $idadeMin);
        $listaIdadeMax = implode('|', $idadeMax);
        $listaAno = implode('|', $anoLista);
        return view('vaga.vagas')->with('vaga', $vaga)->with('ano', $ano)->with('listaAno', $listaAno)->with('listaIdadeMax', $listaIdadeMax)->with('listaIdadeMin', $listaIdadeMin);
    }

    public function adiciona(Request $request){
        $vaga = new Vaga($request->all());
        $teste=DB::select('select min(idinstituicao) AS idinstituicao from instituicao;');
        $vaga->idinstituicao = $teste[0]->idinstituicao;
        $vaga->save();
        toastr()->success('Vaga inserida com sucesso!');
        return redirect()->action('VagasController@listaVagas');
    }

    public function edita(Request $request){
        $vaga = Vaga::find($request->idvaga);
        $vaga->update($request->all());
        toastr()->success('Vaga atualizada com sucesso!');
        return redirect()->action('VagasController@listaVagas');
    }
/*
    public function exclui(Request $request){
        $vaga = Vaga::find($request->idvaga);
        $vaga->delete();
        return redirect()->action('VagasController@listaVagas');
    }
*/
    public function consulta($ano){
        $teste = 'oi';
        return $teste;
    } 


}