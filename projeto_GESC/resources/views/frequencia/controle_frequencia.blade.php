@extends('layout.principal') 
@section('conteudo')

<h1 class="text">Controle de Frequência</h1>
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
            <th>Lançar número de faltas</th>
        </tr>
    </thead>
</table>
@endif

@stop