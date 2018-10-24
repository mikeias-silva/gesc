@extends('layout.principal') 
@section('conteudo')
<h1 class="text">Transferência de Alunos</h1>

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
            <th>Transferir Alunos</th>
        </tr>
    </thead>
    <tbody>
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
                    <a class="btn btn-info" id="btn-frequencia" href="{{"/transferencia_alunos/{$c->idturma }/"}}">Transferir Alunos</a>
                </td>
            </tr>
            <?php
                $cont++;
            ?>
        @endforeach
    </tbody>
    
</table>
@endif

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
                <p class="text-justify">Nesta tela são listadas as turmas para que seja selecionada uma em questão através do botão “Transferir Alunos” e assim seja listada os alunos da turma selecionada para serem transferidos para outra turma.</p>           
            </div>
        </div>
    </div>
</div>

<script src="js/lista_turma_transferencia.js"></script>

@stop