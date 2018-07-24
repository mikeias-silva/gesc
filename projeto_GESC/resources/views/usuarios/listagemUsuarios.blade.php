@extends('layout.principal')
@section('conteudo')
<h1 class="text">Usuários </h1>

@if(empty($usuario))
    <div class="alert alert-danger">
    Você não tem nenhum usuário cadastrado.
    </div>
@else
<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">Nome</th>
            <th scope="col">E-mail</th>
            <th scope="col">Status</th>
            <th scope="col">Opções</th>

        </tr>
    </thead>
    @foreach ($usuario as $c)
    <tr>
        <td>{{ $c->nome }}</td>
        <td>{{ $c->email }}</td>
        <td>{{ $c->statusUsuario }}</td>
        <td>
            <button type="button" class="btn btn-info" data-mytitle="{{ $c->nome }}" data-myemail="{{ $c->email }}"
                 data-myid="{{ $c->idUsuario }}" data-toggle="modal" data-target="#editar">Editar</button>
                 
            <button type="button" class="btn btn-danger" data-mytitle="{{ $c->nomeCras }}" data-myid="{{ $c->idcras }}" 
                data-toggle="modal" data-target="#excluir">Remover</button>
       

        </td>
    </tr>
    @endforeach
</table>

@endif
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#incluirusuario">
  Novo
</button>
<!-- Modal -->
<div class="modal fade" id="incluirusuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Incluir Usuário</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">

                <form class="form" action="/usuarios/adiciona" method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <label>Nome</label>
                    <input name="nome" class="form-control" type="text" value="">
                    <label>E-mail</label>
                    <input name="email" class="form-control" type="text" value="">
                    <label>Senha</label>
                    <input name="senha" class="form-control" type="text" value="">
                    <label>Nome de Usuário</label>
                    <input name="nomeUsuario" class="form-control" type="text" value="">
                    </br>
                    <label><input type="radio" name="perfil" checked> Administrador</label>
                    <label><input type="radio" name="perfil"> Educador</label>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Confirmar</button>
                    </div>
                </form>

            </div>

        </div>
    </div>
</div>
@stop