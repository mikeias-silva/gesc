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
</br>

<form class="form" action="/lanca_frequencia" method="post" name="editarVagas">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="row">
    <div class="col-sm-2">
        <h5>Mês/Ano</h5>
            <select class="form-control" name="periodo" id="periodo">
            <option value="{{$mes}}">{{$mes}}/{{$ano}}</option>
                @if($mes==1)
                    <option value="12">12/{{$a=$ano-1}}</option>
                @else
                    <option value="{{$m = $mes-1}}">0{{$m = $mes-1}}/{{$ano}}</option>
                @endif
                
                
            </select>
    </div>
    </div>
    </br>
    @if(empty($listaAlunos))
        <div class="alert alert-danger">
            Você não tem nenhuma turma cadastrada.
        </div>

    @elseif(!empty($listaAlunos))
    <table class="table table-striped">
        <thead>

            <tr>
                <th>Nome</th>
                <th>Número de faltas no mês</th>
            </tr>
    
            @foreach ($listaAlunos as $c)
                {{$cont=0}}
                <tr>
                    <td>{{$c->nomepessoa}}</td>
                    <td>
                        @foreach($frequenciaAtual as $f)
                            @if($f->idmatricula==$c->idmatricula)
                                <input name="numerofaltas[]" size="5" class="form-control" type="text" value="{{$f->totalfaltas}}" maxlength="2" autocomplete="off" >
                                <input name="idmatricula[]" class="form-control" type="hidden" value="{{$c->idmatricula}}">
                                <input name="idfrequencia[]" class="form-control" type="hidden" value="{{$f->idfrequencia}}">
                                {{$f->idfrequencia}}
                                <?php
                                    $cont++;
                                ?>
                            @endif
                        @endforeach
                        @if($cont==0)
                            <input name="numerofaltas[]" size="5" class="form-control" type="text" value="" maxlength="2" autocomplete="off" >
                            <input name="idmatricula[]" class="form-control" type="hidden" value="{{$c->idmatricula}}">
                            <input name="idfrequencia[]" class="form-control" type="hidden" value="">
                        @endif
                    </td>
                </tr>
    
            @endforeach
        </thead>
    </table>
    <div class="footer">
        <a class="btn btn-secondary" href="{{"/controle_frequencia"}}">Cancelar</a>
        <button type="submit" class="btn btn-primary">Salvar</button>
    </div>
</form>
@endif


@stop