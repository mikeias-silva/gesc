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
        $usuario = new usuario($request->all());
        $usuario->save();
        return redirect()->action('UsuariosController@listaUsuarios');
        //dump($usuario);
    }

    public function edita(Request $request){
        $usuario = Usuario::find($request->id);
        $usuario->update($request->all());
        return redirect()->action('UsuariosController@listaUsuarios');
        //dump($usuario);
    }

    public function inativa(Request $request){
        $usuario = Usuario::find($request->id);
        $usuario->statususuario='0';
        $usuario->update($request->all());
        return redirect()->action('UsuariosController@listaUsuarios');
    }

    public function ativa(Request $request){
        $usuario = Usuario::find($request->id);
        $usuario->statususuario='1';
        $usuario->update($request->all());
        return redirect()->action('UsuariosController@listaUsuarios');
    }
}