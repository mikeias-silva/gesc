@extends('layout.principal') 
@section('conteudo')
<h1 class="text">Transferência de Alunos</h1>
<h3 class="text">Turma: {{$nomeTurma[0]->GrupoConvivencia}} - Turno:
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
                <option value="{{$c->idturma}}">{{ $c->GrupoConvivencia }} - 
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
        </br>
        <spam id="msgNenhumSelc"></spam>
        <table class="table table-striped">
            <thead>

                <tr>
                    <th></th>
                    <th>Nome</th>
                    <th>Idade</th>
                </tr>
                @foreach ($listaAlunos as $c)
                <tr>
                    <td><input type="checkbox" value="1" name="verificaTransferencia[]"></td>
                    <td>{{$c->nomepessoa}}</td>
                    <td>{{$c->datanascimento}}</td>
                    <input name="idmatricula[]" class="form-control" type="hidden" value="{{$c->idmatricula}}">
                </tr>
                @endforeach

                </thead>
        </table>
        <div class="footer">
            <a class="btn btn-secondary" href="{{"/transferencia_alunos"}}">Cancelar</a>
            <button type="submit" class="btn btn-primary">Salvar</button>
        </div>
    </form>
@endif

<script>
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