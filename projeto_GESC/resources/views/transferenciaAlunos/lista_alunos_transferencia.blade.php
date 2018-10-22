@extends('layout.principal') 
@section('conteudo')
<h1 class="text">Transferência de Alunos</h1>
<h3 class="text">Turma: {{$nomeTurma[0]->grupoconvivencia}} - Turno:
    @if($nomeTurma[0]->Turno=="m")
        <td>Manhã</td>
    @else 
        <td>Tarde</td>
    @endif
    - Educador: {{ $nomeTurma[0]->Nome }}
</h3>
<br/>
<?php
    $cont=0;
?>
@if(empty($listaAlunos))
    <div class="alert alert-danger">
        Esta turma não possui nenhum aluno matriculado.
    </div>

    <a class="btn btn-secondary" href="{{"/transferencia_alunos"}}">Voltar</a>
@else
    <form class="form" action="/efetua_transferencia" method="post" name="transfereAluno" id="transfereAluno"
        onsubmit="return validaTransferencia();">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="col-sm-3">
            <h5>Nova Turma</h5>
            <select class="form-control" name="novaTurma" id="novaTurma">
            @foreach ($listaTurmas as $c)
                <option value="{{$c->idturma}}">{{ $c->grupoconvivencia }} - 
                @if($c->Turno=="m")
                    <td>Manhã</td>
                @else 
                    <td>Tarde</td>
                @endif
                ({{$numeroAlunos[$cont]}})
                </option>
                <?php
                    $cont++;
                ?>
            @endforeach
            </select>
        </div>
        <br>
        <span id="msgNenhumSelc"></span>
        <table class="table table-striped border">
            <thead>

                <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th>Idade</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($listaAlunos as $c)
                <tr>
                    <td><input type="checkbox" value="1" name="verificaTransferencia[]"></td>
                    <td>{{$c->nomepessoa}}</td>
                    <td>{{$c->datanascimento}}</td>
                    <input name="idmatricula[]" class="form-control" type="hidden" value="{{$c->idmatricula}}">
                </tr>
                @endforeach
            </tbody>
                
        </table>
        <div class="footer text-right">
            <a class="btn btn-secondary" href="{{"/transferencia_alunos"}}">Cancelar</a>
            <button type="submit" class="btn btn-primary">Salvar</button>
        </div>
    </form>
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

<script src="js/lista_alunos_transferencia.js"></script>

<script>
    addEventListener("keydown", function(event) {
        if (event.keyCode == 112){
            event.preventDefault();
            $("#help").modal("show");  
        }
    });

     function validaTransferencia(){
        var permissao = true;
        var aux = 0;
        var checkTransferencia = document.getElementsByName("verificaTransferencia[]");
        for (var i=0; i < checkTransferencia.length; i++){
            if (!(checkTransferencia[i].checked)) {
                aux++;
            }
        }
        if(aux==checkTransferencia.length){
            permissao = false;
            //console.log("É necessário seleciona ao menos um aluno para efetuar a transferência");
            document.getElementById("msgNenhumSelc").innerHTML="<font color='red'>É necessário seleciona ao menos um aluno para efetuar a transferência</br></font>";
        }
        return permissao;
     }

     function calculaIdade(){

     }
</script>

@stop