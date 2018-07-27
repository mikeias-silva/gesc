@extends('layout.principal') 
@section('conteudo')

<h1 class="text">CRAS E CREAS </h1>
@if(empty($cras))
    <div class="alert alert-danger">
        Você não tem nenhum CRAS ou CREAS cadastrado.
    </div>
@elseif(!empty($cras))
<table class="table table-striped">
    <thead>
        <tr>
            <th>Nome</th>
            <th>Telefone</th>
            <th>Opções</th>

        </tr>
    </thead>
    @foreach ($cras as $c)
    <tr>
        <td> {{ $c->nomeCras }} </td>
        <td> {{ $c->telefone }} </td>
        <td>
            <button type="button" class="btn btn-info" data-mytitle="{{ $c->nomeCras }}" data-mytelefone="{{ $c->telefone }}"
                 data-myid="{{ $c->id }}" data-toggle="modal" data-target="#editar">Editar</button>
                 
            <button type="button" class="btn btn-danger" data-mytitle="{{ $c->nomeCras }}" 
                data-myid="{{ $c->id }}" 
                data-toggle="modal" data-target="#excluir">Remover</button>
       

        </td>
    </tr>
    @endforeach
</table>
@endif
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Novo
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Novo CRAS ou CREAS</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">

                <form class="form" action="/cras/adiciona" method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <label>Nome</label>
                    <input name="nomeCras" class="form-control" type="text" value="">
                    <label>Telefone</label>
                    <input name="telefone" class="form-control">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Confirmar</button>
                    </div>
                </form>

            </div>

        </div>
    </div>
</div>

<!-- Modal Center modal de exclusão-->
<div class="modal fade" id="excluir" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title text-center" id="exampleModalCenterTitle">Atenção!!!</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>
            
            <form action="cras/remove" method="post">
                <div class="modal-body">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <input type="hidden" name="id" id="id" type="text" value="">

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
<div class="modal fade" id="editar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Alterar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <form class="form" action="cras/edita" method="POST">
                <div class="modal-body">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <input type="hidden" name="id" id="id" type="text" value="">
                    
                    <label>Nome</label>
                    <input name="nomeCras" class="form-control" id="nomeCras" value="">
                    <label>Telefone</label>
                    <input name="telefone" class="form-control" id="telefone">

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