<?php 
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\SetTimezone;
use App\Http\Controllers\Controller;

use App\ControleFrequancia;


class ControleFrequenciaController extends Controller {

    public function listaTurmas(){
        $listaTurmas=["teste"];
        return view('frequencia.controle_frequencia')->with('listaTurmas', $listaTurmas);
    }
}