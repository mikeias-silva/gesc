<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\FichaExport;

class FichaFrequenciaController extends Controller
{
    public function apresentaFichaFrequencia(){

        //echo("Teste");
        $mes = date("m");
        //$mes = "01";
        $ano = date('Y');

        return view('fichaFrequencia.fichaFrequenciaTela')->with('mes', $mes)->with('ano', $ano);

    }

    public function excel(Request $request){
        $teste=[];
        $mes=$request->periodo;

        return Excel::download(new FichaExport($mes), 'teste.xlsx');

        return redirect()->back();

        //echo("Teste");

    }
}