@extends('layout.principal') 
@section('conteudo')

<!-- Modal -->
<div  tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div data-backdrop="static" class="modal-content panel-warning">
        <div class="modal-header panel-heading">
            <h3>Selecione o ano que deseja visualizar!</h3>
            
        </div>
        <form action="\matriculasAnteriores" method="POST">
                {{ csrf_field() }}
        <div class="modal-body d-flex justify-content-center ">
            <div role="row ">
                <div class="">
                    <select class="form-control" name="anovaga" id="" value="">
                        @foreach($vagas as $vaga)
                            <option value="{{ $vaga->anovaga }}">{{ $vaga->anovaga }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
           
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-success">Confirmar</button>
        </div>
        
        </div>
    </form>
    </div>
</div>

@stop