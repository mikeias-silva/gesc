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
use Illuminate\Support\Facades\DB;

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


class FichaExport implements FromView, WithEvents
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
        $mesanterior=($this->mes)-1;
        $ano = date("Y");
        $dias_funcionamento=FichaExport::dias_funcionamento($this->mes);
        $espera=DB::select("select count(idmatricula) as emespera from matriculas where statuscadastro='Espera' and datasairespera=null and 
        EXTRACT(MONTH FROM dataespera)>='{$this->mes}'");
        $atendidos_mes=DB::select("select count(matriculas.idmatricula) as atendidosmes from historico_matricula, matriculas where matriculas.idmatricula=historico_matricula.idmatricula
        and matriculas.statuscadastro='Ativo' and EXTRACT(MONTH FROM dataativacao)>='{$this->mes}'");
        $atendidos_mes_passado=DB::select("select count(matriculas.idmatricula) as atendidosmespassado from historico_matricula, matriculas where matriculas.idmatricula=historico_matricula.idmatricula
        and matriculas.statuscadastro='Ativo' and EXTRACT(MONTH FROM dataativacao)<='{$mesanterior}'");
        $media_atendimento_diario = ($atendidos_mes[0]->atendidosmes)/$dias_funcionamento[0]->numero;
        $total_vagas = DB::select("select sum(numvaga) as totalvagas from vagas where anovaga='{$ano}'");
        $toal_matriculas = DB::select("select count(matriculas.idmatricula) as totalmatricula from gesc.matriculas, gesc.crianca where matriculas.statuscadastro='Ativo' and EXTRACT(YEAR FROM matriculas.anomatricula)='{$ano}'
        and EXTRACT(MONTH FROM crianca.datacadastro)<='{$this->mes}' and crianca.idcrianca=matriculas.idcrianca");
        $vagas_disponiveis=$total_vagas[0]->totalvagas-$toal_matriculas[0]->totalmatricula;
        $novos_mes=DB::select("select count(matriculas.idmatricula) as totalmatriculanovas from gesc.matriculas, gesc.crianca where matriculas.statuscadastro='Ativo' and EXTRACT(YEAR FROM matriculas.anomatricula)='{$ano}'
        and EXTRACT(MONTH FROM crianca.datacadastro)='{$this->mes}' and crianca.idcrianca=matriculas.idcrianca");
        $desligados_mes=DB::select("select count(matriculas.idmatricula) as totaldesligamentos from matriculas, historico_matricula where matriculas.statuscadastro='Inativo'
        and matriculas.idmatricula=historico_matricula.idmatricula and EXTRACT(MONTH FROM datainativacao)='{$this->mes}'");
        $beneficiarios_pc=DB::select("select count(matriculas.idmatricula) as bebficiariospc from matriculas, crianca, parentesco, responsavel, familia 
        where crianca.idcrianca=matriculas.idcrianca and parentesco.idcrianca=crianca.idcrianca and 
        parentesco.idresponsavel=responsavel.idresponsavel and familia.idfamilia=responsavel.idfamilia and familia.beneficiopc=1
        and EXTRACT(MONTH FROM crianca.datacadastro)<='{$this->mes}'");
        $beneficiarios_bolsafamilia=DB::select("select count(matriculas.idmatricula) as bolsafamilia from matriculas, crianca, parentesco, responsavel, familia 
        where crianca.idcrianca=matriculas.idcrianca and parentesco.idcrianca=crianca.idcrianca and 
        parentesco.idresponsavel=responsavel.idresponsavel and familia.idfamilia=responsavel.idfamilia and familia.bolsafamilia=1
        and EXTRACT(MONTH FROM crianca.datacadastro)<='{$this->mes}'");


        return view('exports.template', [
            'vaga' => Vaga::all(),
            'mes' =>  $this->mes,
            'instituicao' => Instituicao::all(),
            'dias_funcionamento' => $dias_funcionamento[0]->numero,
            'espera' => $espera[0]->emespera,
            'atendidos_mes' => $atendidos_mes[0]->atendidosmes,
            'atendidos_mes_passado' => $atendidos_mes_passado[0]->atendidosmespassado,
            'media_atendimento_diario' => $media_atendimento_diario,
            'vagas_disponiveis' => $vagas_disponiveis,
            'novos_mes' => $novos_mes[0]->totalmatriculanovas,
            'beneficiarios_pc' => $beneficiarios_pc[0]->bebficiariospc,
            'beneficiarios_bolsafamilia' => $beneficiarios_bolsafamilia[0]->bolsafamilia,
            'desligados_mes' => $desligados_mes[0]->totaldesligamentos,
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
                $event->writer->setCreator('Socorro');
            },
            AfterSheet::class    => function(AfterSheet $event) {
                $event->sheet->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
                //$event->sheet->mergeCells('A1:I1');
                /*$event->sheet->getPageMargins()->setTop(-1.27);
                $event->sheet->getPageMargins()->setRight(1.27);
                $event->sheet->getPageMargins()->setLeft(1.27);
                $event->sheet->getPageMargins()->setBottom(1.27);*/
                $event->sheet->getRowDimension('3')->setRowHeight(50);
                $event->sheet->getColumnDimension('A')->setWidth(5);
                $event->sheet->getColumnDimension('B')->setWidth(5);
                $event->sheet->getColumnDimension('C')->setWidth(5);
                $event->sheet->getColumnDimension('D')->setWidth(5);
                $event->sheet->getColumnDimension('E')->setWidth(5);
                $event->sheet->getColumnDimension('F')->setWidth(5);
                $event->sheet->getColumnDimension('G')->setWidth(5);
                $event->sheet->getColumnDimension('H')->setWidth(5);
                $event->sheet->getColumnDimension('I')->setWidth(5);
                $event->sheet->getColumnDimension('J')->setWidth(5);
                $event->sheet->getColumnDimension('K')->setWidth(5);
                $event->sheet->getColumnDimension('L')->setWidth(5);
                $event->sheet->getColumnDimension('M')->setWidth(5);
                $event->sheet->getColumnDimension('N')->setWidth(5);
                $event->sheet->getColumnDimension('O')->setWidth(5);
                $event->sheet->getColumnDimension('P')->setWidth(5);
                $event->sheet->getColumnDimension('Q')->setWidth(5);
                $event->sheet->getColumnDimension('R')->setWidth(5);
                $event->sheet->getColumnDimension('S')->setWidth(5);
                $event->sheet->getColumnDimension('T')->setWidth(5);
                $event->sheet->getColumnDimension('U')->setWidth(5);
                $event->sheet->getColumnDimension('V')->setWidth(5);
                $event->sheet->getColumnDimension('W')->setWidth(5);
                $event->sheet->getColumnDimension('X')->setWidth(5);
                //$event->sheet->getCell('A12')->setValue("Nº DE PESSOAS\nATENDIDAS NO\nMÊS ANTERIOR:");
                //$event->sheet->getCell('D12')->setValue("Nº DE DIAS ÚTEIS COM\nATENDIMENTO NO MÊS ATUAL:");
                $event->sheet->getStyle('A12:X13')->getAlignment()->setWrapText(true);
                $event->sheet->getRowDimension('12')->setRowHeight(25.5);
                $event->sheet->getRowDimension('13')->setRowHeight(25.5);
                //$event->sheet->getStyle('A3:G3')
                //->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
                //$event->sheet->mergeCells('A3:G4');
                //$event->sheet->SetMergeCells('A19','G19');
                $instituicao = Instituicao::all();
                //$event->sheet->getCell('A5')->setValue("ENTIDADE MANTEDORA:\n".$instituicao[0]->entidademantenedora);
                //$event->sheet->getStyle('A5')->getAlignment()->setWrapText(true);
                //$event->sheet->getRowDimension('5')->setRowHeight(50);
                $event->sheet->getCell('I8')->setValue("(".substr($instituicao[0]->telefone, 0, 2).")".substr($instituicao[0]->telefone, 2, 4)."-".
                                                        substr($instituicao[0]->telefone, 7, 5));
                $event->sheet->getCell('Q6')->setValue(substr($instituicao[0]->cnpj, 0, 2).".".substr($instituicao[0]->cnpj, 2, 3).".".
                                                        substr($instituicao[0]->cnpj, 5, 3)."/".substr($instituicao[0]->cnpj, 8, 4)."-".substr($instituicao[0]->cnpj, 12, 2));
                $event->sheet->styleCells(
                    'A1:X2',
                    [
                        //'width' => '50',
                        //'mergeCells' => true,
                        'font' => [
                            'bold'  =>  true,
                            'size' => '16',
                            'name' => 'Calibri',
                        ],
                        'borders' => [
                            'bottom' => [
                                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                                'color' => ['argb' => '00000000'],
                            ],
                        ]
                    ]
                );

                $event->sheet->styleCells(
                    'A5:X10',
                    [
                        //'width' => '50',
                        //'mergeCells' => true,
                        'font' => [
                            'bold'  =>  true,
                            'size' => '10',
                            'name' => 'Calibri',
                        ],
                    ]
                );

                $event->sheet->styleCells(
                    'A3:X3',
                    [
                        'alignment' => [
                            'vertical'  =>  \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                        ],

                        'font' => [
                            'bold'  =>  true,
                            'size' => '18',
                            'name' => 'Calibri',
                        ],

                        'borders' => [
                            'bottom' => [
                                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                                'color' => ['argb' => '00000000'],
                            ],
                        ]
                    ]
                );

                $event->sheet->styleCells(
                    'A4:Q10',
                    [
                        'alignment' => [
                            'horizontal'  =>  \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT,
                        ],
                    ]
                );

                $event->sheet->styleCells(
                    'A4:X4',
                    [
                        'borders' => [
                            'outline'  =>  [
                                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                                'color' => ['argb' => '00000000'],
                            ],
                        ],
                    ]
                );

                $event->sheet->styleCells(
                    'A11:X11',
                    [
                        'borders' => [
                            'outline'  =>  [
                                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                                'color' => ['argb' => '00000000'],
                            ],
                        ],
                    ]
                );

                $event->sheet->styleCells(
                    'A5:H6',
                    [
                        'borders' => [
                            'outline'  =>  [
                                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                                'color' => ['argb' => '00000000'],
                            ],
                        ],
                    ]
                );

                $event->sheet->styleCells(
                    'I5:P6',
                    [
                        'borders' => [
                            'outline'  =>  [
                                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                                'color' => ['argb' => '00000000'],
                            ],
                        ],
                    ]
                );

                $event->sheet->styleCells(
                    'Q5:X6',
                    [
                        'borders' => [
                            'outline'  =>  [
                                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                                'color' => ['argb' => '00000000'],
                            ],
                        ],
                    ]
                );

                $event->sheet->styleCells(
                    'A7:H8',
                    [
                        'borders' => [
                            'outline'  =>  [
                                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                                'color' => ['argb' => '00000000'],
                            ],
                        ],
                    ]
                );

                $event->sheet->styleCells(
                    'I7:P8',
                    [
                        'borders' => [
                            'outline'  =>  [
                                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                                'color' => ['argb' => '00000000'],
                            ],
                        ],
                    ]
                );

                $event->sheet->styleCells(
                    'Q7:X8',
                    [
                        'borders' => [
                            'outline'  =>  [
                                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                                'color' => ['argb' => '00000000'],
                            ],
                        ],
                    ]
                );

                $event->sheet->styleCells(
                    'A9:H10',
                    [
                        'borders' => [
                            'outline'  =>  [
                                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                                'color' => ['argb' => '00000000'],
                            ],
                        ],
                    ]
                );

                $event->sheet->styleCells(
                    'I9:P10',
                    [
                        'borders' => [
                            'outline'  =>  [
                                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                                'color' => ['argb' => '00000000'],
                            ],
                        ],
                    ]
                );

                $event->sheet->styleCells(
                    'Q9:X10',
                    [
                        'borders' => [
                            'outline'  =>  [
                                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                                'color' => ['argb' => '00000000'],
                            ],
                        ],
                    ]
                );

                $event->sheet->styleCells(
                    'A12:X13',
                    [
                        'alignment' => [
                            'vertical'  =>  \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_TOP,
                        ],

                        'font' => [
                            //'bold'  =>  true,
                            'size' => '10',
                            //'name' => 'Times New Roman',
                        ],

                        'borders' => [
                            'allBorders' => [
                                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                                'color' => ['argb' => '00000000'],
                            ],
                        ]
                    ]
                );
            },
        ];
    }

    public function dias_funcionamento($mes)
    {
        $ano= date("Y");
        if($mes==1){
            $dias_funcionamento = DB::select("select jan as numero from dias_funcionamento where idano='{$ano}'");
        }elseif($mes==2){
            $dias_funcionamento = DB::select("select fev as numero from dias_funcionamento where idano='{$ano}'");
        }else if($mes==3){
            $dias_funcionamento = DB::select("select mar as numero from dias_funcionamento where idano='{$ano}'");
        }else if($mes==4){
            $dias_funcionamento = DB::select("select abr as numero from dias_funcionamento where idano='{$ano}'");
        }else if($mes==5){
            $dias_funcionamento = DB::select("select mar as numero from dias_funcionamento where idano='{$ano}'");
        }else if($mes==6){
            $dias_funcionamento = DB::select("select jun as numero from dias_funcionamento where idano='{$ano}'");
        }else if($mes==7){
            $dias_funcionamento = DB::select("select jul as numero from dias_funcionamento where idano='{$ano}'");
        }else if($mes==8){
            $dias_funcionamento = DB::select("select ago as numero from dias_funcionamento where idano='{$ano}'");
        }else if($mes==9){
            $dias_funcionamento = DB::select("select setembro as numero from dias_funcionamento where idano='{$ano}'");
        }else if($mes==10){
            $dias_funcionamento = DB::select("select out as numero from dias_funcionamento where idano='{$ano}'");
        }else if($mes==11){
            $dias_funcionamento = DB::select("select nov as numero from dias_funcionamento where idano='{$ano}'");
        }else if($mes==12){
            $dias_funcionamento = DB::select("select dez as numero from dias_funcionamento where idano='{$ano}'");
        }

        return $dias_funcionamento;

    }
}
