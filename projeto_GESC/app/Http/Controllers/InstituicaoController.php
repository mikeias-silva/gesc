<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Turma;

class InstituicaoController extends Controller
{
    public function mostraInstituicao(){

        $inst = DB::select('select * from instituicao');

        // SELECT CIDADE E ESTADO ASSOCIADO A INSTITUIÇÃO
     //   select nomeCidade, siglaEstado from cidade, estado join instituicao 
     //   where cidade.idCidade = instituicao.idcidade and cidade.idUF = estado.idUF
     $cidadeins= DB::select('select nomecidade, siglaestado from cidade, estado join instituicao where cidade.idcidade = instituicao.idcidade and cidade.iduf = estado.iduf');


       //return $cidadeins;
        return view('instituicao.dadosinstituicao')->with('instituicao', $inst)->with('cidadeins', $cidadeins);
    }
}
