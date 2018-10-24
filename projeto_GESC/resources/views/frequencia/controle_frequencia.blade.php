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
                <p class="text-justify">Nesta tela são listadas as turmas para que seja selecionada uma em questão através do botão “Lançar Frequência” e assim seja informada o número de faltas dos alunos pertencentes a aquela turma.</p>             
            </div>
        </div>
    </div>
</div>

<script src="js/controle_frequencia.js"></script>
@stop