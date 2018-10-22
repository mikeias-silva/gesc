@extends('layout.principal') 
@section('conteudo')

@if (empty($vagas))
    <div class="alert alert-danger">
        Não existem vagas neste ano para realizar uma matricula
    </div>
@else

<form action="/crianca" method="POST" onsubmit="return validaSelecao();">
    {{ csrf_field() }}
<h1>Nova Matrícula</h1>
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
                <h5 class="text-left">Teste</h5>
                <p class="text-justify">O que temos que ter sempre em mente é que a necessidade de renovação processual nos obriga à análise das direções preferenciais no sentido do progresso. Podemos já vislumbrar o modo pelo qual a revolução dos costumes faz parte de um processo de gerenciamento das diretrizes de desenvolvimento para o futuro. Assim mesmo, 
                a hegemonia do ambiente político aponta para a melhoria das posturas dos órgãos dirigentes com relação às suas atribuições. </p>
                <p class="text-justify">No entanto, não podemos esquecer que a estrutura atual da organização cumpre um papel essencial na formulação do sistema de participação geral. Do mesmo modo, o novo modelo estrutural aqui preconizado apresenta tendências no sentido de aprovar a manutenção das novas proposições. Pensando mais a longo prazo, a percepção das dificuldades oferece uma interessante oportunidade para verificação do impacto na agilidade decisória. Todas estas questões, devidamente ponderadas, 
                levantam dúvidas sobre se a contínua expansão de nossa atividade facilita a criação das diversas correntes de <i class="material-icons">edit</i> pensamento. </p>
                            
            </div>
        </div>
    </div>
</div>

<script src="js/jquery.dataTables.min.js" type="text/javascript"></script>
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