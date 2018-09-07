@extends('layout.principal') 
@section('conteudo')
<h1 class="text">Transferência de Alunos</h1>

@if(empty($listaTurmas))
    <div class="alert alert-danger">
        Você não tem nenhuma turma cadastrada.
    </div>

@elseif(!empty($listaTurmas))
<table class="table table-striped">
    <thead>
        <tr>
            <th>Turma</th>
            <th>Turno</th>
            <th>Educador</th>
            <th>Número de Alunos</th>
            <th>Transferir Alunos</th>
        </tr>
        <?php
            $cont=0;
        ?>
        @foreach ($listaTurmas as $c)
            <tr>
                <td> {{ $c->grupoconvivencia }} </td>
                @if($c->Turno=="m")
                    <td>Manhã</td>
                @else 
                    <td>Tarde</td>
                
                @endif
                <td>{{ $c->Nome }}</td>
                <td>{{$numeroAlunos[$cont]}}</td>
                <td>
                    <a class="btn btn-info" href="{{"/transferencia_alunos/{$c->idturma }/"}}">Transferir Alunos</a>
                </td>
            </tr>
            <?php
                $cont++;
            ?>
        @endforeach
    </thead>
</table>
@endif

@stop