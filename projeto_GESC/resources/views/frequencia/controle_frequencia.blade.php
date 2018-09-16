@extends('layout.principal') 
@section('conteudo')

<h1 class="text">Controle de Frequência</h1>
@if(empty($listaTurmas))
    <div class="alert alert-danger">
        Você não tem nenhuma turma cadastrada.
    </div>

@elseif(!empty($listaTurmas))
<table class="table table-striped border">
    <thead>
        <tr>
            <th>Turma</th>
            <th>Turno</th>
            <th>Educador</th>
            <th>Número de Alunos</th>
            <th>Lançar número de faltas</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $cont=0;
        ?>
        @foreach ($listaTurmas as $c)
            <tr role="row">
                <td> {{ $c->GrupoConvivencia }} </td>
                @if($c->Turno=="m")
                    <td>Manhã</td>
                @else 
                    <td>Tarde</td>
                
                @endif
                <td>{{ $c->Nome }}</td>
                <td>{{$numeroAlunos[$cont]}}</td>
                <td>
                    <a href="{{"/controle_frequencia/{$c->idturma }/turma/{$mes}"}}" class="btn btn-primary" id="btn-frequencia">Lançar faltas</a>
                </td>
            </tr>
            <?php
                $cont++;
            ?>
        @endforeach
    </tbody>
</table>
@endif

@stop