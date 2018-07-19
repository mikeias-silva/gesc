<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Turma;

class TurmaController extends Controller
{
    public function listaTurma(){

    //  $cras = DB::select('select * from cras');
        //$turma = turma::where('statusTuma', '=', 1)->firstOrFail();
      //  $turma = DB::select('select * from turma where statusTurma = 1');
        $profTurma = DB::select('select Nome from usuario join turma on usuario.idUsuario = turma.idUsuario;');


   $turma = DB::select('select turma.idturma, turma.GrupoConvivencia, turma.statusTurma, turma.Turno, usuario.Nome from usuario, turma
    where usuario.idUsuario = turma.idUsuario');
        // $turnoTurma = DB::select('');
        $educador = DB::select('select * from usuario where tipoUsuario = 2');

        $teste = DB::select('select * from usuario where tipoUsuario = 2');

       // echo($teste->idUsuario);

        return view('turma.listagemTurma')->with('turma', $turma)->with('educador', $educador);
    }

    public function adiciona(Request $request){
    /*$nome = Request::input('nome');
    $telefone = Request::input('telefone');

    DB::insert('insert into cras(nomeCras, telefone) values(?, ?)',
    array($nome, $telefone));*/

    /*  $grupoConvi = Request::input('GrupoConvivencia');
    $turno = Request::input('turno');
    $status = Request::input('statusTurma');
    $educ = Request::input('educador');
*/
    /* DB::insert('insert into Turma(GrupoConvivencia, Turno, statusTurma, idUsuario,) values(?, ?, ?, ?)',
    array($grupoConvi, $turno, $status, $educ));*/
        $turma = new Turma(
        $request->all()
        );
        $turma->save();
        // Turma::create($request->all());

        //dd($request->all());
        return redirect()->action('TurmaController@listaTurma');
    }

    public function remover(Request $request){
        $turmaid = Turma::findOrFail($request->id);
        $turmaid->delete();

        return back();
    }

    public function editar(Request $request){
        $turma = Turma::find($request->id);
      
        $turma->update($request->all());
        

        return back();
    }

       
}
