<?php 
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\SetTimezone;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Auth;
use App\User;




class LoginController extends Controller {

    public function login(){

        return view('login.login');
    }

    public function tentativaLogin(Request $request){
        $this->validate($request, [
            'nomeusuario' => ['required', 'max:255'],
            'password' => ['required', 'max:255'],
        ]);
        $password = $request->input('password');
        $nomeusuario = $request->input('nomeusuario');
        $statususuario = $request->input('statususuario');;
  

        $credenciais= $request->only(['nomeusuario', 'password', 'statususuario']);
        //$lembra = $request->has('remember');

        try{
            if(Auth::attempt($credenciais, false)){
                return redirect('dashboard');
            }else{
                return redirect()->back();
            }
            
        } catch (Exception $e) {
            return $e->getMessage();
        }

        /*if(! Auth::attempt(['nomeusuario' => $nomeusuario, 'password' => $password])){
            //return redirect()->back();
            dd($request->all());
        }

        echo("OI");
        */
    }

    public function logout(){
        Auth::logout();
        return redirect('login');

        echo("OI");
    }

}