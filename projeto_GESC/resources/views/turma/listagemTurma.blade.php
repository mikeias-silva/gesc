@extends('layout.principal') 
@section('conteudo')

@if(empty($turma))
    <div class="alert alert-danger">
    
       <span class="text text-alert"></span> Você não tem nenhum Grupo de Convivência cadastrado.
       <span class="text text-align-left" aria-hidden="true"></span>
    </div>
@elseif(!empty($turma))
<h1 class="text">Cadastro de Grupos</h1>
<table class="table table-striped border">
    <thead>
        <tr>
            <th scope="col">Grupo de Convivência</th>
            <th scope="col">Turno</th>
            <th scope="col">Educador</th>
          
            <th>Opções</th>
            

        </tr>
    </thead>
    @foreach ($turma as $t)
    <tr>
        <td>{{ $t->grupoconvivencia }}</td>
        @if($t->turno=="m")
            <td>Manhã</td>
        @else 
            <td>Tarde</td>
        
        @endif 
        <td>{{ $t->nome }}</td>
     <!-- Adicionar regra para listar professor de cada turma -->
   
        <td>
            <a href="" class="text text-info" data-mygrupo="{{ $t->grupoconvivencia }}" 
                data-myturno="{{ $t->turno }}" data-myid="{{ $t->idturma }}" data-myeducador="{{ $t->idusuario }}"
                 data-toggle="modal" data-target="#editarturma">
                 <i class="material-icons">
                    edit
                </i>
            </a>
       
        @if( ($t->statusturma) == '1')
        
       <!--  <button type="button" class="btn btn-danger"  
                data-myid="{{ $t->idturma }}" 
                data-toggle="modal" data-target="#inativarturma">Inativar</button>--> 
             <a  href="" class="text text-danger" data-myid="{{ $t->idturma }}" 
                data-toggle="modal" data-target="#inativarturma">
                <i class="material-icons">
                        highlight_off
                    </i>
            </a>
            
        
        @else
        
       <!-- <button type="button" class="btn btn-success"  
                data-myid="{{ $t->idturma }}" 
                data-toggle="modal" data-target="#ativarturma">Ativar
            </button> --> 
          <a href="" class="text text-success" data-myid="{{ $t->idturma }}" 
                data-toggle="modal" data-target="#ativarturma">
                
                <i class="material-icons">
                        done
                    </i>
              
            </a> 
        
    </td>
        @endif
    </tr>
    
    @endforeach
    @endif
</table>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#novaturma">
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
                    <input name="grupoconvivencia" class="form-control" type="text" value="" maxlength="255" autocomplete="off">
                    <label id="meggrupo"></label>
                    
                    <label>Turno</label>
                   <select class="form-control" name="turno" id="turno" value="">
                       <option value="M">Manhã</option>
                       <option value="T">Tarde</option> 
                   </select>

                    <input type="hidden" name="statusTurma" id="statusTurma" value="1">

                    <label>Educador</label>
                    <select class="form-control" name="idusuario" id="idusuario">
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
                            <button type="submit" class="btn btn-success">Ativar</button>
            
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
                    <input name="grupoconvivencia" class="form-control" id="grupoconvivencia" value="" maxlength="255" autocomplete="off">
                    <label id="meggrupo_edit"></label>
                    <br>
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
    
$('#excluirturma').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) 
    var id = button.data('myid') 
    var modal = $(this)
   // modal.find('.modal-body #crasId').val(id);
    modal.find('.modal-body #idturma').val(id);
    console.log(id);
    console.log("EXCLUIR modal turma");
    
});

$('#editarturma').on('show.bs.modal', function (event) {
    console.log('modal opened');
    var button = $(event.relatedTarget) 
    var nome = button.data('mygrupo')
    var turno = button.data('myturno')
    var educador = button.data('myeducador') 
    var id = button.data('myid') 
    var modal = $(this)
    console.log(turno.value);
    modal.find('.modal-body #grupoconvivencia').val(nome)
    modal.find('.modal-body #turno').val(turno)
    modal.find('.modal-body #idUsuario').val(educador)
    modal.find('.modal-body #idturma').val(id)

});


$('#inativar').on('show.bs.modal', function (event) {
    console.log("Modal aberta");
    var button = $(event.relatedTarget) 
    var id = button.data('myid') 
    var modal = $(this)
   // modal.find('.modal-body #crasId').val(id);
    modal.find('.modal-body #id').val(id);
    
    console.log(id);
});

    $('#ativar').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) 
    var id = button.data('myid') 
    var modal = $(this)
   // modal.find('.modal-body #crasId').val(id);
    modal.find('.modal-body #id').val(id);
    console.log(id);
});
    
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

    


</script>

@stop