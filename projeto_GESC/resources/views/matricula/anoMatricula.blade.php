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

<!-- Modal de help -->
<div class="modal fade" id="help" tabindex="-1" role="dialog" aria-labelledby="help" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="font-weight-bold">Ajuda</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="col-md-12">
                </br>
                <p class="text-justify">Nesta tela deve ser selecionado um ano, onde ao clicar no botão “Confirmar” o sistema irá listar as matrículas dos alunos que frequentavam a instituição naquele ano.</p>          
            </div>
        </div>
    </div>
</div>

<script>
    addEventListener("keydown", function(event) {
    if (event.keyCode == 112){
        event.preventDefault();
        $("#help").modal("show");  
    }
});
</script>

@stop