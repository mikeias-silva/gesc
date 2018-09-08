@extends('layout.principal') 
@section('conteudo')
<form action="/crianca" method="POST">
    {{ csrf_field() }}
<h2>Responsáveis</h2>
<div>
<table id="dtResponsavel" class="table table-striped">
        <thead class="table table-bordered">
            <tr>
                
                <th class="shorting">#<i class="material-icons float-right">
                    swap_vert
                    </i></th>
                <th>Nome<i class="material-icons float-right">
                    swap_vert
                    </i></th>
                <th>CPF<i class="material-icons float-right">
                    swap_vert
                    </i></th>
                <th>Idade<i class="material-icons float-right">
                    swap_vert
                    </i></th>
                <th>Ações<i class="material-icons float-right">
                    swap_vert
                    </i></th>
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
                <td>editar</td>
            </tr>
            @endforeach 
        </tbody>
            
    </table>
</div>
<div class="float-right">
    
    <button class="btn btn-success">
        Próximo
    </button>
    
</div>
</form>
<div class="float-right">
    <form action="/responsavel">
        <button class="btn btn-primary">
            Novo Responsável
        </button>
    </form>
</div>


<script src="js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="/js/dataTables.bootstrap4.min.js" type="text/javascript"></script>


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


@stop