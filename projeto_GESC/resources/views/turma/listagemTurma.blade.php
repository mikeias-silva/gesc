@extends('layout.principal') 
@section('conteudo')

@if(empty($turma))
    <div class="alert alert-danger">
    
       <span class="glyphicons glyphicons-alert"></span> Você não tem nenhum Grupo de Convivência cadastrado.
       <span class="glyphicon glyphicon-align-left" aria-hidden="true"></span>
    </div>
@elseif($turma != "")
<h1 class="text">Gerenciamento de Turmas</h1>
<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">Grupo de Convivência</th>
            <th scope="col">Turno</th>
            <th scope="col">Educador</th>
            <th>Editar</th>
            <th>Ativado/inativado</th>

        </tr>
    </thead>
    @foreach ($turma as $t)
    <tr>
        <td>{{ $t->GrupoConvivencia }}</td>
        @if($t->Turno=="m")
            <td>Manhã</td>
        @else 
            <td>Tarde</td>
        
        @endif 
        <td>{{ $t->Nome }}</td>
     <!-- Adicionar regra para listar professor de cada turma -->
        <td>
            <button type="button" class="btn btn-info" data-mygrupo="{{ $t->GrupoConvivencia }}" 
                data-myturno="{{ $t->Turno }}" data-myid="{{ $t->idturma }}" data-myeducador="{{ $t->idusuario }}"
                 data-toggle="modal" data-target="#editarturma">Editar</button>
        </td>
        @if( ($t->statusTurma) === 0)
        <td>
        <button type="button" class="btn btn-danger" data-myid="{{ $t->idturma }}" data-mystatususuario="{{ $t->statusTurma }}" 
                data-toggle="modal" data-target="#ativarturma">Ativar</button>
        </td>
        @elseif(($t->statusTurma) >0)
        <td>
        <button type="button" class="btn btn-danger" data-myid="{{ $t->idturma }}" data-mystatususuario="{{ $t->statusTurma }}" 
                data-toggle="modal" data-target="#inativarturma">Inativar</button>
        </td>
        @endif
    </tr>
    
    @endforeach
    @endif
</table>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#novaturma">
  Novo
</button>

<!-- Modal -->
<div class="modal fade" id="novaturma" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nova Turma</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">

                <form class="form" action="/turmas/adiciona" method="post" name="incluirTurma" 
                onsubmit="return validarInclusaoTurma(incluirTurma.GrupoConvivencia);">


                    {{ csrf_field() }}
                  <!--  <input type="hidden" name="_token" value="{{ csrf_token() }}"> -->

                    <label>Grupo de Convivência</label>
                    <input name="GrupoConvivencia" class="form-control" type="text" value="" maxlength="255" autocomplete="off">
                    <label id="meggrupo"></label>
                    </br>
                    <label>Turno</label>
                   <select class="form-control" name="turno" id="turno" value="">
                       <option value="1">Manhã</option>
                       <option value="2">Tarde</option> 
                   </select>

                    <input type="hidden" name="statusTurma" id="statusTurma" value="1">

                    <label>Educador</label>
                    <select class="form-control" name="idUsuario" id="idUsuario">
                        @foreach($educador as $e)
                        <option value="{{ $e->id }}">{{ $e->nome }}</option>
                        @endforeach
                    </select>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Confirmar</button>
                    </div>
                </form>

            </div>

        </div>
    </div>
</div>

<!-- Modal Center -->
<div class="modal fade" id="excluirturma" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title text-center" id="exampleModalCenterTitle">Atenção!!!</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <form action="turmas/remove" method="post">
                <div class="modal-body">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" id="idturma" name="idturma" type="text" value="">

                    <h5>Você tem certeza que deseja realmente excluir este item?</h5>
                    <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-danger">Deletar</button>
            
                    </div>
                </div>
            </form>
            
            
        </div>
    </div>
</div>

<!-- Modal Ativar -->
<div class="modal fade" id="ativarturma" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title text-center" id="exampleModalCenterTitle">Atenção!!!</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <form action="/turmas/ativa" method="post">
                <div class="modal-body">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" id="idturma" name="idturma" type="text" value="">

                    <h5>Você tem certeza que deseja realmente ativar esta turma?</h5>
                    <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-danger">Ativar</button>
            
                    </div>
                </div>
            </form>
            
            
        </div>
    </div>
</div>

<!-- Modal Inativar -->
<div class="modal fade" id="inativarturma" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title text-center" id="exampleModalCenterTitle">Atenção!!!</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <form action="/turmas/inativa" method="post">
                <div class="modal-body">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" id="idturma" name="idturma" type="text" value="">

                    <h5>Você tem certeza que deseja realmente inativar esta turma?</h5>
                    <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-danger">Inativar</button>
            
                    </div>
                </div>
            </form>
            
            
        </div>
    </div>
</div>

<!-- Modal para edição -->
<div class="modal fade" id="editarturma" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Alterar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <form class="form" action="turmas/edita" method="post" name="editarTurma"
            onsubmit="return validarEdicaoTurma(editarTurma.GrupoConvivencia);">
               
                {{ csrf_field() }}
                <div class="modal-body">
                    <input type="hidden" name="idturma" id="idturma" value="">
                    <label>Grupo de Convivência</label>
                    <input name="GrupoConvivencia" class="form-control" id="GrupoConvivencia" value="" maxlength="255" autocomplete="off">
                    <label id="meggrupo_edit"></label>
                    </br>
                    <label>Turno</label>
                    <select name="turno" id="turno" value="" class="form-control">
                        <option value="m" id="manha">Manhã</option>
                        <option value="t" id="tarde">Tarde</option>
                    </select>
                    <label>Educador</label>
                  <select class="form-control" name="idUsuario" id="idUsuario">
                        @foreach($educador as $e)
                        <option value="{{ $e->id }}">{{ $e->nome }}</option>
                        @endforeach
                  </select>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Salvar Mudanças</button>
                    </div>

                </div>
            </form>

        </div>
    </div>
</div>

<script>
    function validarInclusaoTurma(nomeGrupo) {
        var permissao = true;
        var formulario = document.register;
        var tesNome = nomeGrupo.value;

        if (tesNome == "") {
        document.getElementById("meggrupo").innerHTML="<font color='red'>Este campo é de preenchimento obrigatório</font>";
        permissao = false;
    } else {
        document.getElementById("meggrupo").innerHTML="";
    }
    return permissao;
    }

    $('#novaturma').on('hidden.bs.modal', function (event) {
    $(this).find('input:text').val('');
    document.getElementById("meggrupo").innerHTML="";
    });

    function validarEdicaoTurma(nomeGrupo) {
        var permissao = true;
        var formulario = document.register;
        var tesNome = nomeGrupo.value;

        if (tesNome == "") {
        document.getElementById("meggrupo_edit").innerHTML="<font color='red'>Este campo é de preenchimento obrigatório</font>";
        permissao = false;
    } else {
        document.getElementById("meggrupo_edit").innerHTML="";
    }
    return permissao;
    }

    $('#editarturma').on('hidden.bs.modal', function (event) {
    $(this).find('input:text').val('');
    document.getElementById("meggrupo_edit").innerHTML="";
    });

    $('#ativarturma').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) 
    var id = button.data('myid') 
    var modal = $(this)
   // modal.find('.modal-body #crasId').val(id);
    modal.find('.modal-body #idturma').val(id);
    
    });

    $('#inativarturma').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) 
    var id = button.data('myid') 
    var modal = $(this)
   // modal.find('.modal-body #crasId').val(id);
    modal.find('.modal-body #idturma').val(id);
    
    });


</script>

@stop