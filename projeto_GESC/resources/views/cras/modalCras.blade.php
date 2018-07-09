@extends('layout.principal')

@section('conteudo')
<div>
    <h1 class="text">Novo CRAS ou CREAS</h1>
    <div>
        <form class="form" action="/modalCras/adiciona" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
            <label>Nome</label>
            <input name="nome" class="form-control"/>  
            <label>Telefone</label>
            <input name="telefone" class="form-control"/>
            
            <div class="form-group">
              
                <button type="submit" class="btn btn-primary">Confirmar</button>
            </div>
        </form>
    </div>
</div>
@stop