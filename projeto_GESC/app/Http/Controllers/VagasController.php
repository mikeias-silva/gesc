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

        return view('vaga.vagas')->with('vaga', $vaga);
    }

}