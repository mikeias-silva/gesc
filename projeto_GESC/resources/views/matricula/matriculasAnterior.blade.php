@extends('layout.principal') 
@section('conteudo')
<h1>Matriculas {{ $ano }} - APAM</h1>

<!--ABA ATIVAS-->
  
<table id="dtAnterior" class="table table-striped border">
    <thead>
        <tr>
            <th>Nome
                <i class="material-icons float-right">
                    swap_vert
                </i>
            </th>
            <th>Turma
                <i class="material-icons float-right">
                swap_vert
                </i>
            </th>
            
            <th>Idade
                <i class="material-icons float-right">
                    swap_vert
                </i>
            </th>
            <th>Data Matricula
                <i class="material-icons float-right">
                    swap_vert
                </i>
            </th>
            <!--     <th>Ações
                <i class="material-icons float-right">
                swap_vert
                </i>
            </th>-->
        </tr>
    </thead>
        
    
        @foreach($matAnteriores as $matAnt)
    
        <tr>
            <td>{{ $matAnt->nomeMatricula() }}</td>
            <td>{{ $matAnt->grupoconvivencia }}</td>
           
            <td>{{ $matAnt->idadeMatricula() }} anos</td>
            <td>{{ $matAnt->datamatricula }}</td>
           <!--  <td> 
                <a class=" text text-dark" id="btn-imprimir" href="" data-target="#imprimir" data-toggle="modal" data-myid="{{ $matAnt->idmatricula }}">
                    <i class="material-icons">
                        print
                    </i>
                </a>
                <input type="hidden" name="idmatricula" value="{{ $matAnt->idmatricula }}" />
                
                
            </td>-->
        </tr>
        @endforeach 
    
        
        
</table> 

    
<!-- Modal Center modal de inativacao-->
<div class="modal fade" id="inativar" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content panel-warning">
            <div class="modal-header panel-heading">
                <h2 class="modal-title text-center" id="exampleModalCenterTitle">Atenção!!!</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>
            
            <form action="/inativarMatricula" method="post">
                <div class="modal-body">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <input type="hidden" name="idmatricula" id="idmatricula" type="text" value="">

                    <h5>Você tem certeza que deseja realmente inativar esta Matrícula?</h5>

                    <label>Motivo<span id="campoobrigatorio">*</span></label>
                    <textarea class="form-control" type="text" name="motivoinativacao" id="" 
                    placeholder="Infome o motivo da inativação dessa matricula">

                    </textarea>
                    <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-danger">Inativar</button>
            
                    </div>
                </div>
            </form>
            
            
        </div>
    </div>
</div>

<!-- Modal Center modal de ativacao-->
<div class="modal fade" id="ativar" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title text-center" id="exampleModalCenterTitle">Atenção!!!</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>
            
            <form action="/ativarMatricula" method="post">
                <div class="modal-body">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <input type="hidden" name="idmatricula" id="idmatricula" type="text" value="">

                    <h5>Você tem certeza que deseja realmente Ativar esta Matrícula?</h5>

                    <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-success">Ativar</button>
            
                    </div>
                </div>
            </form>
            
            
        </div>
    </div>
</div>


<!-- Modal  impressão-->
<div class="modal fade" id="imprimir" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title text-center" id="exampleModalCenterTitle">Atenção!!!</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>
            
            <form action="/pdfmatricula" method="get">
                <div class="modal-body">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <input type="hidden" name="idmatricula" id="idmatricula" type="text" value="">

                    <h5>Imprimir?</h5>

                    <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-success" formtarget="_blank">Imprimir</button>
            
                    </div>
                </div>
            </form>
            
            
        </div>
    </div>
</div>


<form action="/listagemMatriculas/anteriores" class="float-right" id="btn-novamatricula">
    <button class="btn btn-secondary">Voltar</button>
</form>
<!--  -->
<script src="js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="/js/dataTables.bootstrap4.min.js" type="text/javascript"></script>



<script>

    $(document).ready(function () {
    $('#dtAnterior').DataTable();
    $('.dataTables_length').addClass('bs-select');
  });
  
       
      
</script>


<script>
    $('#dtAnterior').DataTable({
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




<script>
    $('#imprimir').on('show.bs.modal', function (event) {
        console.log('modal opened');
        var button = $(event.relatedTarget) 
        var id = button.data('myid')
        var modal = $(this)
        modal.find('.modal-body #idmatricula').val(id);
    
    });
</script>

<script>
    $('#turma').on('show.bs.modal', function (event) {
        console.log('modal opened');
        var button = $(event.relatedTarget) 
        var id = button.data('myid')
        var modal = $(this)
        modal.find('.modal-body #idmatricula').val(id);
        console.log(id);
    
    });
</script>

@stop
