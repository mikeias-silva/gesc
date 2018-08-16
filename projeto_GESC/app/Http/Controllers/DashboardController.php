<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Dashboard;

class DashboardController extends Controller
{
    public function painel(){
        $vagas = DB::select('select * from vagas');

        

        return view('dashboard.dashboard')->with('vagas', $vagas);
    }
}
