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
        $fail="";
        return view('login.login')->with('fail',$fail);
    }

    public function login2(){
        $fail="";
        return view('login.login2')->with('fail',$fail);
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
        $fail="As credenciais informadas não estão corretas, ou seu usuário está inativo, por favor verifique";

        try{
            if(Auth::attempt($credenciais, false)){
                toastr()->success('Bem vindo!');
                return redirect('dashboard');
            }else{
                return redirect()->back()->with('fail', $fail)
                ->withInput();
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
        //return redirect('login');
        return view('login.login2');

        echo("OI");
    }

}