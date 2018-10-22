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
                <h5 class="text-left">Teste</h5>
                <p class="text-justify">O que temos que ter sempre em mente é que a necessidade de renovação processual nos obriga à análise das direções preferenciais no sentido do progresso. Podemos já vislumbrar o modo pelo qual a revolução dos costumes faz parte de um processo de gerenciamento das diretrizes de desenvolvimento para o futuro. Assim mesmo, 
                a hegemonia do ambiente político aponta para a melhoria das posturas dos órgãos dirigentes com relação às suas atribuições. </p>
                <p class="text-justify">No entanto, não podemos esquecer que a estrutura atual da organização cumpre um papel essencial na formulação do sistema de participação geral. Do mesmo modo, o novo modelo estrutural aqui preconizado apresenta tendências no sentido de aprovar a manutenção das novas proposições. Pensando mais a longo prazo, a percepção das dificuldades oferece uma interessante oportunidade para verificação do impacto na agilidade decisória. Todas estas questões, devidamente ponderadas, 
                levantam dúvidas sobre se a contínua expansão de nossa atividade facilita a criação das diversas correntes de <i class="material-icons">edit</i> pensamento. </p>
                            
            </div>
        </div>
    </div>
</div>

<script src="js/lista_turma_transferencia.js"></script>

@stop