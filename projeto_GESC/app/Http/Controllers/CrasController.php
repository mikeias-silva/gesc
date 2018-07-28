<?php 
namespace App\Http\Controllers;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\DB;
use App\Http\Requests\SetTimezone;
use App\Http\Controllers\Controller;

use App\Cras;


class CrasController extends Controller {

    public function listaCras(){

    //  $cras = DB::select('select * from cras');

        
        $cras = cras::all();
        
        //$cras = [];
        //return $cras;

        return view('cras.listagem')->with('cras', $cras);
    }

    public function adiciona(Request $request){

        $cras = new Cras(
        $request->all()
        );
        $cras->save();
/*
        /*$nome = Request::input('nome');
        $telefone = Request::input('telefone');

        DB::insert('insert into cras(nomeCras, telefone) values(?, ?)',
        array($nome, $telefone));*/
       
      //  return redirect()->action('CrasController@lista');

        //return view('cras.lista
        //return implode( ', ', array($nome, $telefone));
       // return redirect()->action('CrasController@listaCras');

       //Cras::create($request->all());
    
       return redirect()->action('CrasController@listaCras');
    }

    public function novo(){
        return view('cras.modalCras');
    }

    public function remover(Request $request){
       
        $cras = Cras::find($request->id);
        $cras->delete();

        return back();
    }

    public function editar(Request $request){
        $cras = Cras::find($request->id);
      
        $cras->update($request->all());
        

        return back();
    }
}