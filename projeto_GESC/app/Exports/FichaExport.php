<?php

namespace App\Exports;

use App\Vaga;
use App\Instituicao;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Http\Controllers\FichaFrequenciaController;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\BeforeExport;
use Maatwebsite\Excel\Events\AfterSheet;
use \Maatwebsite\Excel\Sheet;
use \Maatwebsite\Excel\Writer;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

Sheet::macro('styleCells', function (Sheet $sheet, string $cellRange, array $style) {
    $sheet->getDelegate()->getStyle($cellRange)->applyFromArray($style);
});

Sheet::macro('setOrientation', function (Sheet $sheet, $orientation) {
    $sheet->getDelegate()->getPageSetup()->setOrientation($orientation);
});

Sheet::macro('SetMergeCells', function (Sheet $sheet, array $cellRange) {
    $sheet->getDelegate()->mergeCells($cellRange);
});

Writer::macro('setCreator', function (Writer $writer, string $creator) {
    $writer->getDelegate()->getProperties()->setCreator($creator);
});


class FichaExport implements FromView, WithEvents, ShouldAutoSize
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
    public function registerEvents(): array
    {
        return [
            BeforeExport::class  => function(BeforeExport $event) {
                $event->writer->setCreator('Patrick');
            },
            AfterSheet::class    => function(AfterSheet $event) {
                $event->sheet->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
                $event->sheet->SetMergeCells('A19','G19');
                $event->sheet->styleCells(
                    'A1:G1',
                    [
                        //'width' => '50',
                        //'mergeCells' => true,
                        'font' => [
                            'bold'  =>  true,
                            'size' => '16',
                            'name' => 'Times New Roman',
                        ],
                        'borders' => [
                            'bottom' => [
                                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
                                'color' => ['argb' => 'FFFF0000'],
                            ],
                        ]
                    ]
                );
            },
        ];
    }
}
