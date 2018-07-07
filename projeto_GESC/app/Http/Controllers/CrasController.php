<?php namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class CrasController extends Controller {

    public function listaCras(){
       /* $html = '<h1>Listagem de cras</h1>';
        $html .= '<ul>';*/
        $cras = DB::select('select * from cras_creas');
       
     /*   foreach ($cras as $c) {
            $html .= '<li> Nome: '. $c->NomeCras .'<br/>
            Telefone: '. $c->Telefone .'</li>';
            }
            $html .= '</ul>';
*/
        return view('cras.listagem')->with('cras', $cras);
    }
}