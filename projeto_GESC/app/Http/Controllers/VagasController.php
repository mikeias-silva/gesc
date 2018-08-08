<?php 
namespace App\Http\Controllers;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\DB;
use App\Http\Requests\SetTimezone;
use App\Http\Controllers\Controller;

use App\Vaga;

class VagasController extends Controller {

    public function listaVagas(){
        $vaga = vaga::all();
        $ano = date('Y');
        return view('vaga.vagas')->with('vaga', $vaga)->with('ano', $ano);
    }

    public function adiciona(Request $request){
        $vaga = new Vaga(
        $request->all());
        $vaga->save();
        return redirect()->action('VagasController@listaVagas');
    }

    public function edita(Request $request){
        $vaga = Vaga::find($request->idvaga);
        $vaga->update($request->all());
        return redirect()->action('VagasController@listaVagas');
    }

    public function exclui(Request $request){
        $vaga = Vaga::find($request->idvaga);
        $vaga->delete();
        return redirect()->action('VagasController@listaVagas');
    }


}