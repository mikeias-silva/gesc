@extends('layout.principal')

@section('conteudo')
<h1 class="text">Dashboard</h1>
<hr></hr>

<h6>Número de matriculas por idade</h6>
<table class="table table-hover">
    <thead class="thead">
        <tr>
            <th>Idade:</th>
            <th>1</th>
            <th>2</th>
            <th>3</th>
            <th>4</th>
            <th>5</th>
            <th>6</th>
            <th>7</th>
            <th>8</th>
            <th>9</th>
            <th>10</th>
            <th>11</th>
            <th>12</th>
            <th>13</th>
            <th>14</th>
            <th>15</th>
            <th>16</th>
            <th>17</th>
        </tr>
        <tr>
            <th>Número de Alunos:</th>
            @for($count=0; $count<17; $count++)
                <th>{{$matriculaIdade[$count]}}</th>
            @endfor
        </tr> 
    </thead>
    </table>

<h6>Aniversários do Mês</h6>
<table class="table table-hover">
    <thead class="thead">
        <tr>
            <th>Nome</th>
            <th>Turma</th>
            <th>Data de Nascimento</th>
           
        </tr> 
        @foreach($aniversarioMes as $ani)
        <tr>
            <td>{{$ani->nomepessoa}}</td>
            <td>{{$ani->GrupoConvivencia}}</td>
            <td>{{$ani->datanascimento}}</td>
        </tr>
        @endforeach
</thead>
</table>

<h6>Vagas</h6>
<table class="table table-hover">
    <thead class="thead">
        <tr>
            <th>Faixa etária</th>
            <th>Numero de vagas</th>
            <th>Vagas Ocupadas</th>
            <th>Vagas restantes</th>
           
        </tr> 
    </thead>
    <tbody>
    <?php
        $cont = 0;
    ?>
        @foreach($vagas as $v)
        <tr>
            <td>De {{ $v->idademin }} até {{ $v->idademax }} anos</td>
            <td>{{ $v->numvaga }}</td>
            <td>{{$vagaOcupada[$cont]}}</td>
            <td>{{$v->numvaga-$vagaOcupada[$cont]}}</td>
       
        </tr>
        <?php
            $cont++;
        ?>
        @endforeach
    </tbody>
</table>
@stop