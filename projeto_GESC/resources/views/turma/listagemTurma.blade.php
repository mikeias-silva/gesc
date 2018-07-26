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
        <td>{{ $t->Turno }}</td> 
        <td>{{ $t->Nome }}</td>
     <!-- Adicionar regra para listar professor de cada turma -->
        <td>
            <button type="button" class="btn btn-info" data-mygrupo="{{ $t->GrupoConvivencia }}" 
                data-myturno="{{ $t->Turno }}" data-myid="{{ $t->idturma }}" data-myeducador="{{ $t->Nome }}"
                 data-toggle="modal" data-target="#editarturma">Editar</button>

            <button type="button" class="btn btn-danger" data-mygrupo="{{ $t->GrupoConvivencia }}" 
                data-myid="{{ $t->idturma }}" data-toggle="modal" data-target="#excluirturma">Remover</button>
        </td>
        @if( ($t->statusTurma) === 0)
        <td>Inativo</td>
        @elseif(($t->statusTurma) >0)
        <td>Ativo</td>
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

                <form class="form" action="/turmas/adiciona" method="post">


                    {{ csrf_field() }}
                  <!--  <input type="hidden" name="_token" value="{{ csrf_token() }}"> -->

                    <label>Grupo de Convivência</label>
                    <input name="GrupoConvivencia" class="form-control" type="text" value="">
                    
                    <label>Turno</label>
                   <select class="form-control" name="turno" id="turno">
                       <option value="M">Manha</option>
                       <option value="T">Tarde</option>
                      
                       
                   </select>

                    <label>Turma ativado?</label>
                    <select class="form-control" name="statusTurma" id="statusTurma">
                        <option value="1">Ativado</option>
                        <option value="0">Inativado</option>
                 
                    </select>
                    
                    <label>Educador</label>
                    <select class="form-control" name="idUsuario" id="idUsuario">
                        @foreach($educador as $e)
                        <option value="{{ $e->idUsuario }}">{{ $e->Nome }}</option>
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
                    <input type="hidden" id="id" name="id" type="text" value="">

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
            <form class="form" action="turmas/edita" method="post">
               
                {{ csrf_field() }}
                <div class="modal-body">
                    <input type="hidden" name="idturma" id="idturma" value="">
                    <label>Grupo de Convivência</label>
                    <input name="GrupoConvivencia" class="form-control" id="GrupoConvivencia" value="">
                    <label>Turno</label>
                    <select name="turno" id="turno" value="" class="form-control">
                        <option value="M">Manhã</option>
                        <option value="T">Tarde</option>
                    </select>
                    <label>Educador</label>
                  <select class="form-control" value="" name="educador" id="educador">
                        @foreach($educador as $e)
                        <option value="{{ $e->idUsuario }}">{{ $e->Nome }}</option>
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

@stop