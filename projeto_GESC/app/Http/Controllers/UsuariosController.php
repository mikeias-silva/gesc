<?php 
namespace App\Http\Controllers;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\DB;
use App\Http\Requests\SetTimezone;
use App\Http\Controllers\Controller;

use App\Usuario;

class UsuariosController extends Controller {

    public function listaUsuarios(){
        //echo "ola";
        $usuario = usuario::all();
        //$usuario = [];
        return view('usuarios.listagemUsuarios')->with('usuario', $usuario);
    }

    public function adiciona(Request $request){
        dump("Save");
    }

    public function novo(){
    
    }

    public function editar(Request $request){

    }
}