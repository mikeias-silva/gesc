@extends('layout.principal')

@section('conteudo')

<h1>Listagem de CRAS/CREAS </h1>
<table>
    @foreach ($cras as $c)
    <tr>
        <td> {{ $c->NomeCras }} </td>
        <td> {{ $c->Telefone }} </td>
    </tr>
    @endforeach
</table>
@stop