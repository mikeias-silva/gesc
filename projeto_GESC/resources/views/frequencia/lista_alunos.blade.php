@extends('layout.principal') 
@section('conteudo')
<h1 class="text">Controle de Frequência</h1>
<h3 class="text">Turma: {{$nomeTurma[0]->GrupoConvivencia}} - Turno:
    @if($nomeTurma[0]->Turno=="m")
        <td>Manhã</td>
    @else 
        <td>Tarde</td>
    @endif
    - Educador: {{ $nomeTurma[0]->Nome }}
</h3>



@stop