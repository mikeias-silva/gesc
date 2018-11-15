@extends('layout.principal') 
@section('conteudo')

@if (empty($vagas))
    <div class="alert alert-danger">
        Não existem vagas neste ano para realizar uma matricula
    </div>
@else

@if(empty($idcrianca))
    <form action="crianca" method="POST" onsubmit="return validaSelecao();">
@else
    <form action="atualizaParentesco_{{$idcrianca}}_{{$idresponsavel}}" method="POST" onsubmit="return validaSelecao();">
@endif

    {{ csrf_field() }}
    @if(empty($idcrianca))
        <h1>Nova Matrícula</h1>
    @else
        <h1>Edição de Matrícula</h1>
    @endif
<h2>Responsaveis</h2>
<div>
<span id="msgValidaSelec"></span>
<table id="dtResponsavel" class="table table-striped border">
        <thead class="table table-bordered">
            <tr>
                
                <th class="shorting">#
                    <i class="material-icons float-right">
                    swap_vert
                    </i>
                </th>
                <th>Nome
                    <i class="material-icons float-right">
                    swap_vert
                    </i>
                </th>
                <th>CPF
                    <i class="material-icons float-right">
                    swap_vert
                    </i>
                </th>
                <th>Idade
                    <i class="material-icons float-right">
                    swap_vert
                    </i>
                </th>
            </tr>
        </thead>
            
        <tbody>
            @foreach($responsaveis as $responsavel)
        
            <tr role="row">
                <td>
                   
                    <input type="checkbox" class="" name="idresponsavel[]" value="{{ $responsavel->idresponsavel }}" id="">
                    {{ $responsavel->idresponsavel }}
                </td>
                 
                <td>{{ $responsavel->nomeResponsavel() }}</td>
                <td>{{ $responsavel->cpfResponsavel() }}</td>
                <td>{{ $responsavel->idadeResponsavel() }}</td>
               
            </tr>
            @endforeach 
        </tbody>
            
    </table>
</div>
<div class="float-right">
@if(empty($idcrianca))
    <button class="btn btn-success">
        Próximo
    </button>
@else
    <button class="btn btn-success">
        Trocar Responsável
    </button>
@endif
</div>
</form>

@if(empty($idcrianca))
    <div class="float-right">
        <form action="responsavel">
            <button class="btn btn-primary">
                Novo Responsável
            </button>
        </form>
    </div>
@else
    <div class="float-right">   
        <form action="responsavel_{{$idcrianca}}_{{$idresponsavel}}">
            <button class="btn btn-primary">
                Novo Responsável
            </button>
        </form>
    </div>
    <div class="float-right">   
        <form action="listagemMatriculas">
            <button class="btn btn-secondary">
                Cancelar
            </button>
        </form>
    </div>
@endif

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
                <p class="text-justify">Esta tela é o início do processo de uma nova matrícula, aqui é possível selecionar até dois responsáveis já cadastrado no sistema para serem responsáveis pela criança da nova matrícula, basta selecionar os responsáveis desejados e clicar no botão “Próximo”.</p>
                <p class="text-justify">Caso seja necessário o cadastro de novos responsáveis, basta clicar no botão “Novo responsável”.</p>
                            
            </div>
        </div>
    </div>
</div>

<script src="/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="/js/dataTables.bootstrap4.min.js" type="text/javascript"></script>
<script src="/js/valisaResponsavelSelecionado.js" type="text/javascript"></script>


<script>

    $(document).ready(function () {
        $('#dtResponsavel').DataTable(
            
        );
        $('.dataTables_length').addClass('bs-select');
    });


</script>


<script>
    $('#dtResponsavel').DataTable({
        "language": {
            "zeroRecords": "nada encontrado",
            "infoEmpty": "Não há nenhum registro",
            "lengthMenu": "Itens por página _MENU_ ",
            "info": "Mostrando página _PAGE_ de _PAGES_",
            "infoFiltered": "(Total de registros _MAX_)",
            "search": "Busca",
            "paginate": {
                "first": "Primeira",
                "last": "Última",
                "next": "Próxima",
                "previous": "Anterior"
            },
            "loadingRecords": "Carregando"
        }
    });
</script>

@endif
@stop
