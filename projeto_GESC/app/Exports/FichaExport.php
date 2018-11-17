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
 
    public function __construct($mes, $nomeresponsaveltec, $cpfresponsavel, $profissao,
    $visitasdomiciliares, $atendimentosgrupo, $reuniaoacolhimento, $encaminhamentos, $atendimentosindividuais,  $encaminhamentoprivada, $planoelaborado,
    $descricaoatividade, $obs, $mesdesc)
    {
        $ano = date("Y");
        $this->mes = $mes;
        $this->nomeresponsaveltec = $nomeresponsaveltec;
        $this->cpfresponsavel = $cpfresponsavel;
        $this->profissao = $profissao;
        $this->visitasdomiciliares = $visitasdomiciliares;
        $this->atendimentosgrupo = $atendimentosgrupo;
        $this->reuniaoacolhimento = $reuniaoacolhimento;
        $this->encaminhamentos = $encaminhamentos;
        $this->atendimentosindividuais = $atendimentosindividuais;
        $this->encaminhamentoprivada = $encaminhamentoprivada;
        $this->planoelaborado = $planoelaborado;
        $this->descricaoatividade = $descricaoatividade;
        $this->obs = $obs;
        $this->mesdesc = $mesdesc;
        $this->numlinhasativos = count (DB::select("select * from listaalunosativos where EXTRACT(YEAR FROM anomatricula)='{$ano}' and EXTRACT(MONTH FROM datacadastro)<='{$this->mes}'
        and mesfrequencia='{$this->mes}' group by idmatricula, datacadastro, anomatricula, nomepessoa, numnis, nomecras, bairro, publicoprioritario, totalfaltas, idademin, idademax"));
        $this->desligamentos = count (DB::select("select * from listaalunosdesligados where
        EXTRACT(YEAR FROM datainativacao)='{$ano}' and EXTRACT(MONTH FROM datainativacao)='{$this->mes}' group by idmatricula, datacadastro, anomatricula, nomepessoa, numnis, nomecras, datainativacao, motivoinativacao"));
        $this->novos = count (DB::select("select * from listaalunosnovos where
        dataativacao LIKE '%{$ano}' and dataativacao LIKE '%{$this->mes}%' group by idmatricula, datacadastro, anomatricula, nomepessoa, numnis, nomecras, dataativacao, telefone, bairro"));
    }

    public function view(): View
    {
        $mesanterior=($this->mes)-1;
        $ano = date("Y");
        $dias_funcionamento=FichaExport::dias_funcionamento($this->mes);
        
        $espera=DB::select("select count(idmatricula) as emespera from matriculas where statuscadastro='Espera' and EXTRACT(MONTH FROM dataespera)>='{$this->mes}'");
        
        $atendidos_mes=DB::select("select count(idmatricula) as atendidosmes from (select idmatricula from listaalunosativos where EXTRACT(YEAR FROM anomatricula)='{$ano}' and EXTRACT(MONTH FROM datacadastro)<='{$this->mes}'
        and mesfrequencia='{$this->mes}' group by idmatricula) as lista");

        $atendidos_mes_passado=DB::select("select count(matriculas.idmatricula) as atendidosmespassado from historico_matricula, matriculas where matriculas.idmatricula=historico_matricula.idmatricula
        and EXTRACT(MONTH FROM dataativacao)<'{$this->mes}'");
        
        $media_atendimento_diario = ($atendidos_mes[0]->atendidosmes)/$dias_funcionamento[0]->numero;
        
        $total_vagas = DB::select("select sum(numvaga) as totalvagas from vagas where anovaga='{$ano}'");
        
        $toal_matriculas = DB::select("select count(matriculas.idmatricula) as totalmatricula from gesc.matriculas, gesc.crianca where matriculas.statuscadastro='Ativo' and EXTRACT(YEAR FROM matriculas.anomatricula)='{$ano}'
        and EXTRACT(MONTH FROM crianca.datacadastro)<='{$this->mes}' and crianca.idcrianca=matriculas.idcrianca");
       
        $vagas_disponiveis=$total_vagas[0]->totalvagas-$toal_matriculas[0]->totalmatricula;
        
        /*$novos_mes=DB::select("select count(matriculas.idmatricula) as totalmatriculanovas from gesc.matriculas, gesc.crianca where matriculas.statuscadastro='Ativo' and EXTRACT(YEAR FROM matriculas.anomatricula)='{$ano}'
        and EXTRACT(MONTH FROM crianca.datacadastro)='{$this->mes}' and crianca.idcrianca=matriculas.idcrianca");*/

        $novos_mes=DB::select("select count(idmatricula) as totalmatriculanovas from (select idmatricula from listaalunosnovos where
        dataativacao LIKE '%{$ano}' and dataativacao LIKE '%{$this->mes}%' group by idmatricula) as lista");

        $desligados_mes=DB::select("select count(matriculas.idmatricula) as totaldesligamentos from matriculas, historico_matricula where matriculas.statuscadastro='Inativo'
        and matriculas.idmatricula=historico_matricula.idmatricula and EXTRACT(MONTH FROM datainativacao)='{$this->mes}'");
        
        $beneficiarios_pc=DB::select("select count(matriculas.idmatricula) as bebficiariospc from matriculas, crianca, parentesco, responsavel, familia 
        where crianca.idcrianca=matriculas.idcrianca and parentesco.idcrianca=crianca.idcrianca and 
        parentesco.idresponsavel=responsavel.idresponsavel and familia.idfamilia=responsavel.idfamilia and familia.beneficiopc=1
        and EXTRACT(MONTH FROM crianca.datacadastro)<='{$this->mes}' and matriculas.statuscadastro='Ativo'");
        
        $beneficiarios_bolsafamilia=DB::select("select count(matriculas.idmatricula) as bolsafamilia from matriculas, crianca, parentesco, responsavel, familia 
        where crianca.idcrianca=matriculas.idcrianca and parentesco.idcrianca=crianca.idcrianca and 
        parentesco.idresponsavel=responsavel.idresponsavel and familia.idfamilia=responsavel.idfamilia and familia.bolsafamilia=1
        and EXTRACT(MONTH FROM crianca.datacadastro)<='{$this->mes}' and matriculas.statuscadastro='Ativo'");
        
        $beneficiarios_cadunico=DB::select("select count(matriculas.idmatricula) as cadunico from matriculas, crianca, parentesco, responsavel, familia 
        where crianca.idcrianca=matriculas.idcrianca and parentesco.idcrianca=crianca.idcrianca and 
        parentesco.idresponsavel=responsavel.idresponsavel and familia.idfamilia=responsavel.idfamilia and familia.numnis!=''
        and EXTRACT(MONTH FROM crianca.datacadastro)<='{$this->mes}' and matriculas.statuscadastro='Ativo'");
        
        $lista_ativos=DB::select("select * from listaalunosativos where EXTRACT(YEAR FROM anomatricula)='{$ano}' and EXTRACT(MONTH FROM datacadastro)<='{$this->mes}'
        and mesfrequencia='{$this->mes}' group by idmatricula, datacadastro, anomatricula, nomepessoa, numnis, nomecras, bairro, publicoprioritario, totalfaltas, idademin, idademax order by nomepessoa ASC");
        
        $lista_desligamentos=DB::select("select * from listaalunosdesligados where
        EXTRACT(YEAR FROM datainativacao)='{$ano}' and EXTRACT(MONTH FROM datainativacao)='{$this->mes}' group by idmatricula, datacadastro, anomatricula, nomepessoa, numnis, nomecras, datainativacao, motivoinativacao");
        
        $lista_novos=DB::select("select * from listaalunosnovos where
        dataativacao LIKE '%{$ano}' and dataativacao LIKE '%{$this->mes}%' group by idmatricula, datacadastro, anomatricula, nomepessoa, numnis, nomecras, dataativacao, telefone, bairro");

        /*lista usuários ativos = select matriculas.idmatricula, pessoa.nomepessoa, familia.numnis, cras.nomecras, pessoa.bairro, publicoprioritario.publicoprioritario from gesc.matriculas, gesc.crianca, gesc.parentesco, gesc.responsavel, gesc.familia, gesc.pessoa, gesc.cras, gesc.publicoprioritario
        where crianca.idcrianca=matriculas.idcrianca and parentesco.idcrianca=crianca.idcrianca and parentesco.idresponsavel=responsavel.idresponsavel 
        and familia.idfamilia=responsavel.idfamilia and crianca.idpessoa=pessoa.idpessoa and familia.idcras=cras.idcras and crianca.idpublicoprioritario=publicoprioritario.idpublicoprioritario
        and matriculas.statuscadastro='Ativo' and EXTRACT(YEAR FROM matriculas.anomatricula)=2018 and EXTRACT(MONTH FROM datacadastro)<=8*/


        return view('exports.template', [
            'vaga' => Vaga::all(),
            'mes' =>  $this->mes,
            'nomeresponsaveltec' =>  $this->nomeresponsaveltec,
            'cpfresponsavel' =>  $this->cpfresponsavel,
            'profissao' =>  $this->profissao,
            'visitasdomiciliares' =>  $this->visitasdomiciliares,
            'atendimentosgrupo' =>  $this->atendimentosgrupo,
            'reuniaoacolhimento' =>  $this->reuniaoacolhimento,
            'encaminhamentos' =>  $this->encaminhamentos,
            'atendimentosindividuais' =>  $this->atendimentosindividuais,
            'encaminhamentoprivada' =>  $this->encaminhamentoprivada,
            'planoelaborado' =>  $this->planoelaborado,
            'descricaoatividade' =>  $this->descricaoatividade,
            'obs' =>  $this->obs,
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
            'beneficiarios_cadunico' => $beneficiarios_cadunico[0]->cadunico,
            'lista_ativos' => $lista_ativos,
            'lista_desligamentos' => $lista_desligamentos,
            'lista_novos' => $lista_novos,
            'mesdesc' => $this->mesdesc,
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
                $event->sheet->getPageMargins()->setTop(0.30);
                $event->sheet->getPageMargins()->setLeft(0.50);
                $event->sheet->getPageMargins()->setBottom(0.30);
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
                $event->sheet->getColumnDimension('W')->setWidth(2.5);
                $event->sheet->getColumnDimension('X')->setWidth(2.5);
                $event->sheet->getColumnDimension('Y')->setWidth(2.5);
                $event->sheet->getColumnDimension('Z')->setWidth(2.5);
                $event->sheet->getColumnDimension('AA')->setWidth(2.5);
                //$event->sheet->getCell('A12')->setValue("Nº DE PESSOAS\nATENDIDAS NO\nMÊS ANTERIOR:");
                //$event->sheet->getCell('D12')->setValue("Nº DE DIAS ÚTEIS COM\nATENDIMENTO NO MÊS ATUAL:");
                $event->sheet->getStyle('A5:X200')->getAlignment()->setWrapText(true);
                $event->sheet->getRowDimension('5')->setRowHeight(25.5);
                $event->sheet->getRowDimension('6')->setRowHeight(25.5);
                $event->sheet->getRowDimension('7')->setRowHeight(25.5);
                $event->sheet->getRowDimension('9')->setRowHeight(37.75);
                $event->sheet->getRowDimension('10')->setRowHeight(37.75);
                $event->sheet->getRowDimension('11')->setRowHeight(37.75);
                //$event->sheet->getRowDimension('16')->setAutoSize(true);
                //$event->sheet->getStyle('A3:G3')
                //->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
                //$event->sheet->mergeCells('A3:G4');
                //$event->sheet->SetMergeCells('A19','G19');
                $instituicao = Instituicao::all();
                //$event->sheet->getCell('A5')->setValue("ENTIDADE MANTEDORA:\n".$instituicao[0]->entidademantenedora);
                //$event->sheet->getStyle('A5')->getAlignment()->setWrapText(true);
                //$event->sheet->getRowDimension('5')->setRowHeight(50);
                $event->sheet->getCell('K6')->setValue("TELEFONE: (".substr($instituicao[0]->telefone, 0, 2).")".substr($instituicao[0]->telefone, 2, 4)."-".
                                                        substr($instituicao[0]->telefone, 7, 5));
                $event->sheet->getCell('S5')->setValue("CNPJ: ".substr($instituicao[0]->cnpj, 0, 2).".".substr($instituicao[0]->cnpj, 2, 3).".".
                                                        substr($instituicao[0]->cnpj, 5, 3)."/".substr($instituicao[0]->cnpj, 8, 4)."-".substr($instituicao[0]->cnpj, 12, 2));
                
                //calcula qubra de linha
                for($i=0, $cont=15; $i<=$this->numlinhasativos; $i++, $cont++){
                    $publicoPrioritario = $event->sheet->getCell('P'.$cont)->getValue();
                    $nome = $event->sheet->getCell('B'.$cont)->getValue();
                    $cras = $event->sheet->getCell('J'.$cont)->getValue();
                    $bairro = $event->sheet->getCell('M'.$cont)->getValue();

                    if(strlen ($publicoPrioritario)>22){
                        $event->sheet->getRowDimension($cont)->setRowHeight(25.5);
                    } else if(strlen ($nome)>31){
                        $event->sheet->getRowDimension($cont)->setRowHeight(25.5);
                    } else if(strlen ($cras)>16){
                        $event->sheet->getRowDimension($cont)->setRowHeight(25.5);
                    } else if(strlen ($bairro)>16){
                        $event->sheet->getRowDimension($cont)->setRowHeight(25.5);
                    } 

                    if (strlen ($publicoPrioritario)>44){
                        $event->sheet->getRowDimension($cont)->setRowHeight(37.75);
                    }else if (strlen ($nome)>62){
                        $event->sheet->getRowDimension($cont)->setRowHeight(37.75);
                    } else if(strlen ($cras)>32){
                        $event->sheet->getRowDimension($cont)->setRowHeight(37.75);
                    } else if(strlen ($bairro)>32){
                        $event->sheet->getRowDimension($cont)->setRowHeight(37.75);
                    } 
                }

                //formatar lista de alunos ativos
                $fimlistaativos=$this->numlinhasativos+14;
                $event->sheet->styleCells(
                    'A15:AA'.$fimlistaativos,
                    [
                        //'width' => '50',
                        //'mergeCells' => true,
                        'font' => [
                            //'bold'  =>  true,
                            'size' => '10',
                            'name' => 'Calibri',
                        ],
                        'borders' => [
                            'allBorders' => [
                                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                                'color' => ['argb' => '00000000'],
                            ],
                        ]
                    ]
                );

                $fimlistaativos = $fimlistaativos+1;
                $event->sheet->styleCells(
                    "A$fimlistaativos:AA$fimlistaativos",
                    [
                        //'width' => '50',
                        //'mergeCells' => true,
                        'font' => [
                            'bold'  =>  true,
                            'size' => '10',
                            'name' => 'Calibri',
                            'color' => ['argb' => \PhpOffice\PhpSpreadsheet\Style\Color::COLOR_RED],
                        ],
                        'borders' => [
                            'allBorders' => [
                                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                                'color' => ['argb' => '00000000'],
                            ],
                        ]
                    ]
                );

                $fimlistaativos = $fimlistaativos+1;
                $event->sheet->styleCells(
                    "A$fimlistaativos:AA$fimlistaativos",
                    [
                        //'width' => '50',
                        //'mergeCells' => true,
                        'font' => [
                            'bold'  =>  true,
                            'size' => '10',
                            'name' => 'Calibri',
                            //'color' => ['argb' => \PhpOffice\PhpSpreadsheet\Style\Color::COLOR_RED],
                        ],
                        'borders' => [
                            'allBorders' => [
                                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                                'color' => ['argb' => '00000000'],
                            ],
                        ]
                    ]
                );


                $fimlistadesligados = $fimlistaativos + $this->desligamentos+1;

                for($i=0, $cont=$fimlistaativos; $i<=$fimlistadesligados; $i++, $cont++){
                    $nome = $event->sheet->getCell('B'.$cont)->getValue();
                    $cras = $event->sheet->getCell('K'.$cont)->getValue();
                    $motivo = $event->sheet->getCell('Q'.$cont)->getValue();

                    if(strlen ($motivo)>44){
                        $event->sheet->getRowDimension($cont)->setRowHeight(25.5);
                    } else if(strlen ($nome)>31){
                        $event->sheet->getRowDimension($cont)->setRowHeight(25.5);
                    } else if(strlen ($cras)>16){
                        $event->sheet->getRowDimension($cont)->setRowHeight(25.5);
                    }

                    if (strlen ($motivo)>88){
                        $event->sheet->getRowDimension($cont)->setRowHeight(37.75);
                    }else if (strlen ($nome)>62){
                        $event->sheet->getRowDimension($cont)->setRowHeight(37.75);
                    } else if(strlen ($cras)>32){
                        $event->sheet->getRowDimension($cont)->setRowHeight(37.75);
                    }
                }

                $event->sheet->styleCells(
                    "A$fimlistaativos:AA$fimlistadesligados",
                    [
                        //'width' => '50',
                        //'mergeCells' => true,
                        'font' => [
                            //'bold'  =>  true,
                            'size' => '10',
                            'name' => 'Calibri',
                            //'color' => ['argb' => \PhpOffice\PhpSpreadsheet\Style\Color::COLOR_RED],
                        ],
                        'borders' => [
                            'allBorders' => [
                                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                                'color' => ['argb' => '00000000'],
                            ],
                        ]
                    ]
                );


                
                $event->sheet->styleCells(
                    "A$fimlistadesligados:AA$fimlistadesligados",
                    [
                        //'width' => '50',
                        //'mergeCells' => true,
                        'font' => [
                            'bold'  =>  true,
                            'size' => '10',
                            'name' => 'Calibri',
                            'color' => ['argb' => \PhpOffice\PhpSpreadsheet\Style\Color::COLOR_RED],
                        ],
                        'borders' => [
                            'allBorders' => [
                                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                                'color' => ['argb' => '00000000'],
                            ],
                        ]
                    ]
                );
                $fimlistadesligados = $fimlistadesligados +1;
                $event->sheet->styleCells(
                    "A$fimlistadesligados:AA$fimlistadesligados",
                    [
                        //'width' => '50',
                        //'mergeCells' => true,
                        'font' => [
                            'bold'  =>  true,
                            'size' => '10',
                            'name' => 'Calibri',
                            //'color' => ['argb' => \PhpOffice\PhpSpreadsheet\Style\Color::COLOR_RED],
                        ],
                        'borders' => [
                            'allBorders' => [
                                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                                'color' => ['argb' => '00000000'],
                            ],
                        ]
                    ]
                );
                $fimlistadesligados = $fimlistadesligados +1;
                $fimlistanovos = $fimlistadesligados +$this->novos;

                for($i=0, $cont=$fimlistadesligados; $i<=$fimlistanovos; $i++, $cont++){
                    $nome = $event->sheet->getCell('B'.$cont)->getValue();
                    $bairro = $event->sheet->getCell('O'.$cont)->getValue();
                    $formaAcesso = $event->sheet->getCell('U'.$cont)->getValue();

                    if(strlen ($formaAcesso)>44){
                        $event->sheet->getRowDimension($cont)->setRowHeight(25.5);
                    } else if(strlen ($nome)>31){
                        $event->sheet->getRowDimension($cont)->setRowHeight(25.5);
                    } else if(strlen ($bairro)>16){
                        $event->sheet->getRowDimension($cont)->setRowHeight(25.5);
                    }

                    if (strlen ($bairro)>88){
                        $event->sheet->getRowDimension($cont)->setRowHeight(37.75);
                    }else if (strlen ($nome)>62){
                        $event->sheet->getRowDimension($cont)->setRowHeight(37.75);
                    } else if(strlen ($bairro)>32){
                        $event->sheet->getRowDimension($cont)->setRowHeight(37.75);
                    }
                }

                $event->sheet->styleCells(
                    "A$fimlistadesligados:AA$fimlistanovos",
                    [
                        //'width' => '50',
                        //'mergeCells' => true,
                        'font' => [
                            //'bold'  =>  true,
                            'size' => '10',
                            'name' => 'Calibri',
                            //'color' => ['argb' => \PhpOffice\PhpSpreadsheet\Style\Color::COLOR_RED],
                        ],
                        'borders' => [
                            'allBorders' => [
                                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                                'color' => ['argb' => '00000000'],
                            ],
                        ]
                    ]
                );

                
                //$event->sheet->getCell('AB5')->setValue($fimlistanovos);
                $event->sheet->styleCells(
                    "A$fimlistanovos:AA$fimlistanovos",
                    [
                        //'width' => '50',
                        //'mergeCells' => true,
                        'font' => [
                            'bold'  =>  true,
                            'size' => '12',
                            'name' => 'Calibri',
                            //'color' => ['argb' => \PhpOffice\PhpSpreadsheet\Style\Color::COLOR_RED],
                        ],
                        'borders' => [
                            'allBorders' => [
                                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                                'color' => ['argb' => '00000000'],
                            ],
                        ]
                    ]
                );

                $blocoquatro = $fimlistanovos +2;
                $fimlistanovos = $fimlistanovos+1;
                //$event->sheet->getCell('AB6')->setValue($fimlistanovos);
                $event->sheet->styleCells(
                    "A$fimlistanovos:AA$blocoquatro",
                    [
                        //'width' => '50',
                        //'mergeCells' => true,
                        'font' => [
                            'bold'  =>  true,
                            'size' => '10',
                            'name' => 'Calibri',
                            //'color' => ['argb' => \PhpOffice\PhpSpreadsheet\Style\Color::COLOR_RED],
                        ],
                        'borders' => [
                            'outline' => [
                                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                                'color' => ['argb' => '00000000'],
                            ],
                        ]
                    ]
                );
                $fimlistanovos = $fimlistanovos+1;
                $event->sheet->getRowDimension($fimlistanovos)->setRowHeight(37.75);
                $blocoquatro = $blocoquatro + 5;
                $fimlistanovos = $fimlistanovos+1;
                $event->sheet->styleCells(
                    "A$fimlistanovos:AA$blocoquatro",
                    [
                        //'width' => '50',
                        //'mergeCells' => true,
                        'font' => [
                            'bold'  =>  true,
                            'size' => '10',
                            'name' => 'Calibri',
                            //'color' => ['argb' => \PhpOffice\PhpSpreadsheet\Style\Color::COLOR_RED],
                        ],
                        'borders' => [
                            'allBorders' => [
                                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                                'color' => ['argb' => '00000000'],
                            ],
                        ]
                    ]
                );
                $blococinco = $blocoquatro + 1;
                $event->sheet->styleCells(
                    "A$blococinco:AA$blococinco",
                    [
                        //'width' => '50',
                        //'mergeCells' => true,
                        'font' => [
                            'bold'  =>  true,
                            'size' => '12',
                            'name' => 'Calibri',
                            //'color' => ['argb' => \PhpOffice\PhpSpreadsheet\Style\Color::COLOR_RED],
                        ],
                        'borders' => [
                            'allBorders' => [
                                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                                'color' => ['argb' => '00000000'],
                            ],
                        ]
                    ]
                );

                $blococinco = $blococinco + 1;
                $aux = $blococinco + 1;
                $event->sheet->styleCells(
                    "A$blococinco:AA$aux",
                    [
                        //'width' => '50',
                        //'mergeCells' => true,
                        'font' => [
                            'bold'  =>  true,
                            'size' => '10',
                            'name' => 'Calibri',
                            //'color' => ['argb' => \PhpOffice\PhpSpreadsheet\Style\Color::COLOR_RED],
                        ],
                        'borders' => [
                            'allBorders' => [
                                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                                'color' => ['argb' => '00000000'],
                            ],
                        ]
                    ]
                );

                $event->sheet->styleCells(
                    'A1:AA2',
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
                    'A5:AA10',
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
                    'A3:AA3',
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

                /*$event->sheet->styleCells(
                    'A4:Q10',
                    [
                        'alignment' => [
                            'horizontal'  =>  \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT,
                        ],
                    ]
                );*/

                $event->sheet->styleCells(
                    'A4:AA4',
                    [
                        'borders' => [
                            'outline'  =>  [
                                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                                'color' => ['argb' => '00000000'],
                            ],
                        ],
                        'font' => [
                            'bold'  =>  true,
                            'size' => '11',
                            //'name' => 'Times New Roman',
                        ],
                    ]
                );

                $event->sheet->styleCells(
                    'A12:AA12',
                    [
                        'borders' => [
                            'outline'  =>  [
                                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                                'color' => ['argb' => '00000000'],
                            ],
                        ],
                        'font' => [
                            'bold'  =>  true,
                            'size' => '11',
                            //'name' => 'Times New Roman',
                        ],
                    ]
                );

                /*$event->sheet->styleCells(
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
                );*/

                $event->sheet->styleCells(
                    'A5:AA14',
                    [
                        'alignment' => [
                            'vertical'  =>  \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_TOP,
                            'horizontal'  =>  \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT,
                        ],
                        /*'fill' => [
                            'type' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                            'color' => ['argb' => '00000000'],
                        ],*/

                        'font' => [
                            'bold'  =>  true,
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

                $event->sheet->styleCells(
                    'A15:AA200',
                    [
                        'alignment' => [
                            'vertical'  =>  \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_TOP,
                            'horizontal'  =>  \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT,
                        ],

                        'font' => [
                            //'bold'  =>  true,
                            'size' => '10',
                            //'name' => 'Times New Roman',
                        ],

                        /*'borders' => [
                            'allBorders' => [
                                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                                'color' => ['argb' => '00000000'],
                            ],
                        ]*/
                    ]
                );

                //cores blocos 1 e 2
                //$event->sheet->getStyle('A4:AA7')->getFill()->getStartColor()->setRGB('A4DDF4');

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
            $dias_funcionamento = DB::select("select outubro as numero from dias_funcionamento where idano='{$ano}'");
        }else if($mes==11){
            $dias_funcionamento = DB::select("select nov as numero from dias_funcionamento where idano='{$ano}'");
        }else if($mes==12){
            $dias_funcionamento = DB::select("select dez as numero from dias_funcionamento where idano='{$ano}'");
        }

        return $dias_funcionamento;

    }
}
