<?php

namespace App\Exports;

use App\Vaga;
use App\Instituicao;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Http\Controllers\FichaFrequenciaController;


class FichaExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public $mes;
 
    public function __construct($mes)
    {
        $this->mes = $mes;
    }

    public function view(): View
    {
        return view('exports.template', [
            'vaga' => Vaga::all(),
            'mes' =>  $this->mes,
            'instituicao' => Instituicao::all(),
        ]);
        //return Vaga::all();
    }

    /*public function headings(): array
    {
        return [
            '#',
            'Name',
            'Email',
            'Created at',
            'Updated at'
        ];
    }*/
}
