@extends('layout.principal') 
@section('conteudo')

<!-- Modal -->
<div  tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div data-backdrop="static" class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Defina uma turma para {{ $nomecrianca }}</h5>
            
        </div>
        <form action="\turmaMatricula" method="POST">
                {{ csrf_field() }}
        <div class="modal-body">
            <input type="hidden" name="idmatricula" value="{{ $idmatricula }}"/>
           <select class="form-control" name="idturma" id="" value="">
               @foreach($turmas as $t)
               <option value="{{ $t->idturma }}">{{ $t->grupoconvivencia }}</option>
                @endforeach
            </select>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-success">Confirmar Turma</button>
        </div>
        
        </div>
    </form>
    </div>
</div>

@stop