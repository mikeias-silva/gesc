 @extends('layout.principal') 
@section('conteudo')
<h2>Matriculas - APAM</h2>
<ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="ativas-tab" data-toggle="tab" href="#ativas" role="tab" aria-controls="ativas" aria-selected="true">Ativas</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="inativas-tab" data-toggle="tab" href="#inativas" role="tab" aria-controls="inativas" aria-selected="false">Inativas</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="espera-tab" data-toggle="tab" href="#espera" role="tab" aria-controls="espera" aria-selected="false">Em Espera</a>
        </li>
</ul>

<!--ABA ATIVAS-->

<div class="tab-content" id="myTabContent">
    <!--
<div class="tab-pane fade" id="inativas" role="tabpanel" aria-labelledby="inativas-tab">
-->
<div></div>
   <div class="tab-pane show active" id="ativas" role="tabpanel" aria-labelledby="ativas-tab">
         <h2>Matriculas ativas</h2>
        <table id="dtAtivas" class="table table-hover">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Turma</th>
                        <th>Idade</th>
                        <th>Data Matricula</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                    
                
                    @foreach($matAtivas as $matA)
                
                    <tr>
                        <td>{{ $matA->nomeMatricula() }}</td>
                        <td>{{ $matA->nomeTurma() }}</td>
                        <td>{{ $matA->idadeMatricula() }}</td>
                        <td>{{ $matA->anoMatricula() }}</td>
                        <td><a id="btn-imprimir" href="/pdfmatricula" target="_blank"><i class="fa fa-print fa-2x"></i></a>
<<<<<<< HEAD
=======
                            <a href="/inativarMatricula" class="text text-danger" data-myid="{{ $matA->idmatricula }}" data-toggle="modal" data-target="#inativar">inativar</a>
>>>>>>> 11efcd69462bdd1db300d3449bb6c49df143542e
                        </td>
                    </tr>
                    @endforeach 
                
                  
                    
            </table> 
        
        
        
    </div>

    <!--ABA INATIVAS-->
    <div class="tab-pane fade" id="inativas" role="tabpanel" aria-labelledby="inativas-tab">
        <h2>Matriculas inativas</h2>
        <table id="dtInativas" class="table table-hover">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Turma</th>
                        <th>Idade</th>
                        <th>Data Matricula</th>
                        <th>Ações</th>
                        
                    </tr>
                </thead>
                <tbody>
                    
                        @foreach($matInativas as $matI)
                        <tr>
                            <td>{{ $matI->nomeMatricula() }}</td>
                            <td>{{ $matI->nomeTurma() }}</td>
                            <td>{{ $matI->idadeMatricula() }}</td>
                            <td>{{ $matI->anoMatricula() }}</td>
                            <td><a id="btn-imprimir" href="/pdfmatricula" target="_blank"><i class="fa fa-print fa-2x"></i></a>
                                <a href="/ativarMatricula" class="text text-danger" data-myid="{{ $matI->idmatricula }}" data-toggle="modal" data-target="#ativar">inativar</a>

                            </td>
                            
                        </tr>
                        @endforeach
                    
                </tbody>
            </table>
         
    </div>

    

    
<!--ABA ESPERA-->
    <div class="tab-pane fade" id="espera" role="tabpanel" aria-labelledby="espera-tab">
        <h2>Matriculas em espera</h2>
        <table id="dtEspera" class="table table-hover">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Turma</th>
                        <th>Idade</th>
                        <th>Data Matricula</th>
                        <th>Ações</th>
                        
                    </tr>
                </thead>
                <tbody>
                    
                        @foreach($matEspera as $matE)
                        <tr>
                            <td>{{ $matE->nomeMatricula() }}</td>
                            <td>{{ $matE->nomeTurma() }}</td>
                            <td>{{ $matE->idadeMatricula() }}</td>
                            <td>{{ $matE->anoMatricula() }}</td>
                            <td><a id="btn-imprimir" href="/pdfmatricula" target="_blank"><i class="fa fa-print fa-2x"></i></a>
                                <a href="/ativarMatricula" class="text text-danger" data-myid="{{ $matE->idmatricula }}" data-toggle="modal" data-target="#ativar">inativar</a>

                            </td>
                            
                        </tr>
                        @endforeach
                    
                </tbody>
            </table>

    
         
    </div>
</div>

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


<form action="/novaMatricula">
    <button class="btn btn-secondary">Nova Matrícula</button>
</form>
<script src="js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="/js/dataTables.bootstrap4.min.js" type="text/javascript"></script>



<script>

        $(document).ready(function () {
    $('#dtAtivas').DataTable();
    $('.dataTables_length').addClass('bs-select');
  });
  
  $(document).ready(function () {
    $('#dtInativa').DataTable();
    $('.dataTables_length').addClass('bs-select');
  });
      
       
       $(document).ready(function () {
    $('#dtEspera').DataTable();
    $('.dataTables_length').addClass('bs-select');
  });
      
       
      
    </script>


<script>
        $('#dtAtivas').DataTable({
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
        $('#dtInativas').DataTable({
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
        $('#dtEspera').DataTable({
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
