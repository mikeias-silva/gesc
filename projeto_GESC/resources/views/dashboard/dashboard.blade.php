@extends('layout.principal')

@section('conteudo')
<h1 class="text text-center">Pagina Inicial</h1>


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
        @foreach($vagas as $v)
        <tr>
            <td>{{ $v->idademin }} - {{ $v->idademax }}</td>
            <td>{{ $v->numvaga }}</td>
            <td>0</td>
            <td>0</td>
       
        </tr>
        @endforeach
    </tbody>
</table>
@stop