@extends('layout.principal') 
@section('conteudo')
<h1 class="text">Controle de Frequência</h1>
<h3 class="text">Turma: {{$nomeTurma[0]->grupoconvivencia}} - Turno:
    @if($nomeTurma[0]->turno=="M")
        <td>Manhã</td>
    @else 
        <td>Tarde</td>
    @endif
    - Educador: {{ $nomeTurma[0]->nome }}
</h3>
<br>
<form class="form" action="/lanca_frequencia" method="post" name="lancaFrequencia" id="lancaFrequencia"
        onsubmit="return validaFaltas({{$dias_funcionamento[0]->numero}}, 'lancaFrequencia');">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="row">   
    <div class="col-sm-2">
        <h5>Mês/Ano</h5>
            <select class="form-control" onchange="location=this.value;" name="listaData" id="listaData">
            @if($mesSelect==$mes)
            <option value="{{"/controle_frequencia/{$idturma}/turma/{$mes}"}}" selected>{{$mes}}/{{$ano}}</option>
                @if($mes==1)
                    <option value="/controle_frequencia/{$idturma}/turma/12">12/{{$a=$ano-1}}</option>
                @else
                <?php
                    $m = $mes-1;
                ?>
                <option value="{{"/controle_frequencia/{$idturma}/turma/{$m}"}}">0{{$m = $mes-1}}/{{$ano}}</option>
                @endif
            @else
            <option value="{{"/controle_frequencia/{$idturma}/turma/{$mes}"}}">{{$mes}}/{{$ano}}</option>
                @if($mes==1)
                    <option value="{{"/controle_frequencia/{$idturma}/turma/12"}}" selected>12/{{$a=$ano-1}}</option>
                @else
                <?php
                    $m = $mes-1;
                ?>
                <option value="{{"/controle_frequencia/{$idturma}/turma/{$m}"}}" selected>0{{$m = $mes-1}}/{{$ano}}</option>
                @endif
            @endif  
            </select>
            <input name="periodo" class="form-control" type="hidden" value="{{$mesSelect}}">
    </div>
    </div>
@if($dias_funcionamento[0]->numero=="")
    <br>
    <div class="alert alert-danger">
        Não é possível realizar o lançamento de faltas sem antes ter informado o número de fias de funcionamento do período selecinado.
        Por favor vá até a aba de instituição e verifique.
    </div>
@endif

<span id="msgCampoVazio"></span>
<span id="msgFaltasMaior"></span>

    <br>
    @if(empty($listaAlunos))
        <div class="alert alert-danger">
            Esta turma não possui nenhum aluno matriculado referente ao período informado.
        </div>

        <a class="btn btn-secondary" href="{{"/controle_frequencia"}}">Voltar</a>

    @elseif(!empty($listaAlunos))
    <div class="col-md-11 centered">
    <table class="table table-striped border">
        <thead>

            <tr>
                <th>Nome</th>
                <th class="text-center">Número de faltas no mês</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($listaAlunos as $c)
                <?php
                    $cont=0;
                ?>
                <tr>
                <div class="col-md-10">
                    <td>{{$c->nomepessoa}}</td>
                </div>  
                    <td class="text-center">
                        @foreach($frequenciaAtual as $f)
                            @if($f->idmatricula==$c->idmatricula)
                            <div class="text-center">
                            <div class="col-md-3 centered">
                                <input name="numerofaltas[]" id="numerofaltas[]" size="5" class="form-control text-right" type="text" value="{{$f->totalfaltas}}" maxlength="2" autocomplete="off" onkeyup="mascara(this, retiraLetra);">
                            </div> 
                            </div>    
                                <input name="idmatricula[]" class="form-control" type="hidden" value="{{$c->idmatricula}}">
                                <input name="idfrequencia[]" class="form-control" type="hidden" value="{{$f->idfrequencia}}">
                                <?php
                                    $cont++;
                                ?>
                            @endif
                        @endforeach
                        @if($cont==0)
                        <div class="col-md-3 centered">
                            <input name="numerofaltas[]" id="numerofaltas[]" size="5" class="form-control text-right" type="text" value="" maxlength="2" autocomplete="off" onkeyup="mascara(this, retiraLetra);">
                        </div> 
                            <input name="idmatricula[]" class="form-control" type="hidden" value="{{$c->idmatricula}}">
                            <input name="idfrequencia[]" class="form-control" type="hidden" value="">
                        @endif
                    </td>
                </tr>
    
            @endforeach
        </tbody>
    </table>
    <div class="footer text-right">
        @if($dias_funcionamento[0]->numero=="")
        <button type="submit" class="btn btn-primary" disabled>Salvar</button>
        @else
        <button type="submit" class="btn btn-primary">Salvar</button>
        @endif
        <a class="btn btn-secondary" href="{{"/controle_frequencia"}}">Cancelar</a>
    </div>
</div>
</form>
@endif

<script>
    function validaFaltas(diasFuncionamento, local){
        //var document = $(this);
        var permissao = true;
        var maxFaltas = diasFuncionamento;
        var localValidar = document.getElementById(local);
        var formulario = document.getElementsByName("numerofaltas[]");
        var auxUm=0;
        var auxDois=0;
        //var tes = document.getElementById("numerofaltas[]");
        for (var i=0; i < formulario.length; i++){
            if (formulario[i].value == ""){
                auxUm++;
                console.log("Deve ser informando o número de faltas de todos os alunos listados");
            } 
        }
        if(auxUm>0){
            document.getElementById("msgCampoVazio").innerHTML="<font color='red'>Deve ser informando o número de faltas de todos os alunos listados, por favor verifique<br></font>";
            permissao = false;
        } else {
                document.getElementById("msgCampoVazio").innerHTML="<font color='red'></font>";
        }


        for (var i=0; i < formulario.length; i++){
            if (formulario[i].value > maxFaltas){
                auxDois++;
                console.log("O número de faltas não pode ultrapassar o número de dias de funcionamento");
            }
        }

        if(auxDois>0){
            document.getElementById("msgFaltasMaior").innerHTML="<font color='red'>O número de faltas não pode ultrapassar o número de dias de funcionamento, por favor verifique <br></font>";
            permissao = false;
        } else {
            document.getElementById("msgFaltasMaior").innerHTML="<font color='red'></font>";
        }
            //console.log(formulario[i].value);
        
        return permissao;
    }

    function mascara(o,f){
        v_obj=o
        v_fun=f
        setTimeout("execmascara()",1)
    }
    function execmascara(){
        v_obj.value=v_fun(v_obj.value)
    }

    function retiraLetra(v){
        v=v.replace(/\D/g,"");
        return v;
    }

    window.onload = function(){
        document.getElementById("msgFaltasMaior").innerHTML="";
        document.getElementById("msgCampoVazio").innerHTML="";
    }
</script>



@stop