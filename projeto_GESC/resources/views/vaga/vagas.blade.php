@extends('layout.principal') 
@section('conteudo')

<h1 class="text">Geranciamento de vagas</h1>
@if(empty($vaga))
    <div class="alert alert-danger">
        Você não tem nenhuma faixa etária cadastrada.
    </div>

@elseif(!empty($vaga))
<table class="table table-striped">
    <thead>
        <tr>
            <th>Idade Mínima</th>
            <th>Idade Máxima</th>
            <th>Númaro de Vagas</th>
            <th>Ano</th>
            <th>Opções</th>

        </tr>
    </thead>
    @foreach ($vaga as $v)
    <tr>
        <td> {{ $v->idademin }} </td>
        <td> {{ $v->idademax }} </td>
        <td> {{ $v->numvaga }} </td>
        <td> {{ $v->anovaga }} </td>
        
        <td>
            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#editar">Editar</button>    
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#inativar">Excluir</button>
        </td>
    </tr>
    @endforeach
</table>
@endif
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Novo
</button>

@stop