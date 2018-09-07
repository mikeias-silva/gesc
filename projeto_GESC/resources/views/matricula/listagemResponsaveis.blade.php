@extends('layout.principal') 
@section('conteudo')
<form action="/crianca" method="POST">
    {{ csrf_field() }}
<h2>Responsáveis</h2>

<table id="dtResponsavel" class="table table-striped">
        <thead>
            <tr>
                <th></th>
                <th>Nome</th>
                <th>RG</th>
                <th>CPF</th>
                <th>Idade</th>
                <th>Ações</th>
            </tr>
        </thead>
            
        
            @foreach($responsaveis as $responsavel)
        
            <tr>
                <td><input type="checkbox" class="form-control" name="idresponsavel[]" value="{{ $responsavel->idresponsavel }}" id=""></td>
                <td>{{ $responsavel->idresponsavel }}</td>
                 <td>
                    <a href="/atualizarResponsavel/{{ $responsavel->idresponsavel }}">Atualizar dados</a>
                </td>
                <td>dasd</td>
                <td>dads</td>
                <td>asd</td>
            </tr>
            @endforeach 
        
          
            
    </table>

<div class="float-right">
    
        <button class="btn btn-success">
            Próximo
        </button>
    
</div>
</form>
<div class="float-right">
    <form action="/novoResponsavel">
        <button class="btn btn-primary">
            Novo Responsável
        </button>
    </form>
</div>


<script src="js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="/js/dataTables.bootstrap4.min.js" type="text/javascript"></script>


<script>

$(document).ready(function () {
$('#dtResponsavel').DataTable();
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