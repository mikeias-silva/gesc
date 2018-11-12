@extends('layout.principal')

@section('conteudo')

<h1 style="margin:20px 0px 50px 0px;" class="text text-center">Associação de Promoção a Menina - APAM</h1>


<h4>Número de matriculas ativas por idade</h4>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Idade:</th>
            <th class="text-center">1</th>
            <th class="text-center">2</th>
            <th class="text-center">3</th>
            <th class="text-center">4</th>
            <th class="text-center">5</th>
            <th class="text-center">6</th>
            <th class="text-center">7</th>
            <th class="text-center">8</th>
            <th class="text-center">9</th>
            <th class="text-center">10</th>
            <th class="text-center">11</th>
            <th class="text-center">12</th>
            <th class="text-center">13</th>
            <th class="text-center">14</th>
            <th class="text-center">15</th>
            <th class="text-center">16</th>
            <th class="text-center">17</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><strong>Número de Alunos:</strong></td>
            @for($count=0; $count<17; $count++)
                <td class="text-center">{{$matriculaIdade[$count]}}</td>
            @endfor
        </tr> 
    </tbody>
    </table>
<div class="row center">
<div class="col-md-6 centered">
<h4>Vagas</h4>
<table class="table table-bordered table-striped">
    <thead class="thead">
        <tr>
            <th class="align-top">Faixa etária</th>
            <th class="align-top">Numero de vagas</th>
            <th class="align-top">Vagas Ocupadas</th>
            <th class="align-top">Vagas restantes</th>
           
        </tr> 
    </thead>
    <tbody>
    <?php
        $cont = 0;
    ?>
        @foreach($vagas as $v)
        <tr>
            <td>De {{ $v->idademin }} até {{ $v->idademax }} anos</td>
            <td class="text-center">{{ $v->numvaga }}</td>
            <td class="text-center">{{$vagaOcupada[$cont]}}</td>
            <td class="text-center">{{$v->numvaga-$vagaOcupada[$cont]}}</td>
       
        </tr>
        <?php
            $cont++;
        ?>
        @endforeach
    </tbody>
</table>
</div>
</div>

<h4>Aniversários do Mês</h4>
<table class="table table-bordered table-striped">
    <thead class="thead">
        <tr>
            <th>Nome</th>
            <th>Turma</th>
            <th>Idade</th>
            <th>Data de Nascimento</th>
           
        </tr> 
    </thead>
    <tbody>
        @foreach($aniversarioMes as $ani)
        <tr>
            <td>{{$ani->nomepessoa}}</td>
            <td>{{$ani->GrupoConvivencia}}</td>
            <td>{{$ani->idade}}</td>
            <td>{{$ani->datanascimento}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
<!-- Modal de help -->
<div class="modal fade" id="help" tabindex="-1" role="dialog" aria-labelledby="help" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="font-weight-bold">Ajuda</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="col-md-12">
                </br>
                <p class="text-justify">Esta é a tela inicial do sistema ela demonstra um resumo das informações das crianças matriculadas que frequentam a instituição atualmente. As informações apresentadas são: </p>
                <p class="text-justify"> 
                    <ul>
                        <li>Número de crianças por idade.</li>
                        <li>Quantidade de vagas cadastradas para o ano atual, assim como o número de vagas ocupadas e restantes.</li>
                        <li>Lista de aniversariantes do mês.</li>
                    </ul>
                </p>
                            
            </div>
        </div>
    </div>
</div>

<script src="/js/dashboard.js"></script>

@stop
