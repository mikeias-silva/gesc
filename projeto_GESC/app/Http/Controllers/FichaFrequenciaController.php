<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FichaFrequenciaController extends Controller
{
    public function apresentaFichaFrequencia(){

        //echo("Teste");
        $mes = date("m");
        //$mes = "01";
        $ano = date('Y');

        return view('fichaFrequencia.fichaFrequenciaTela')->with('mes', $mes)->with('ano', $ano);

    }
}