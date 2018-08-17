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
<form class="form" action="" method="post" name="transfereAluno" id="transfereAluno"
        onsubmit="">

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
    <table class="table table-striped">
        <thead>

            <tr>
                <th></th>
                <th>Nome</th>
                <th>Idade</th>
            </tr>
            @foreach ($listaAlunos as $c)
            <tr>
                <td><input type="checkbox" value="" name=""></td>
                <td>{{$c->nomepessoa}}</td>
                <td></td>
            </tr>
            @endforeach

            </thead>
    </table>
    <div class="footer">
        <a class="btn btn-secondary" href="{{"/transferencia_alunos"}}">Cancelar</a>
        <button type="submit" class="btn btn-primary">Salvar</button>
    </div>
</form>

@stop