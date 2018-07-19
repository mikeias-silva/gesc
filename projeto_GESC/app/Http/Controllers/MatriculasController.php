<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Matricula;

class MatriculasController extends Controller
{
    public function listaMatriculas(){

        $matAtivas =  DB::select('select * from matricula where statuscadastro = 1');

        return view('matricula.matriculas')->with('matAtivas', $matAtivas);
    }

    public function novaMatricula(){

        return view('matricula.novaMatricula');
    }
}
