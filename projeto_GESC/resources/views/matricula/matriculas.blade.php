@extends('layout.principal') 
@section('conteudo')


<table class="table table-hover">
    <thead>
        <tr>
            <th>Nome</th>
            <th>Turma</th>
            <th>Idade</th>
            <th>Data Matricula</th>
            <th>Ações</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            @foreach($matAtivas as $matA)
            <td>{{ $matA->datasairespera }}</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            @endforeach
        </tr>
    </tbody>
</table>

<form action="/novaMatricula">
    <button class="btn btn-secondary">Nova Matrícula</button>
</form>
@stop