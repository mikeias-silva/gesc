@extends('layout.principal') 
@section('conteudo')
<h1>Matriculas {{ $ano }} - APAM</h1>
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


<!-- TODAS ABAS -->
<div class="tab-content" id="myTabContent">

<!--ABA ATIVAS-->
   <div class="tab-pane active" id="ativas" role="tabpanel" aria-labelledby="ativas-tab">
         <h2>Matriculas ativas</h2>
        <table id="dtAtivas" class="table table-striped border">
                <thead>
                    <tr>
                        <th>
                            Nome
                               
                            <i class="material-icons float-right">
                                swap_vert
                            </i>
                               
                        </th>
                        <th>Turma
                            <i class="material-icons float-right">
                            swap_vert
                            </i>
                       
                        </th>
                       
                        <th>
                            Idade
                               
                            <i class="material-icons float-right">
                                swap_vert
                            </i>
                               
                        </th>
                       
                        <th>
                            Opções
                                
                            <i class="material-icons float-right">
                            swap_vert
                            </i>
                            
                        </th>
                    </tr>
                </thead>
                    
                
                    @foreach($matAtivas as $matA)
                
                    <tr>
                        <td>{{ $matA->nomeMatricula() }}</td>
                        <td>{{ $matA->nomeTurma() }}</td>
                        @if ($matA->idadeMatricula() < 10)
                        <td>0{{ $matA->idadeMatricula() }} anos</td>
                        @endif
                        @if ($matA->idadeMatricula() > 9)
                        <td>{{ $matA->idadeMatricula() }} anos</td>
                        @endif
                         
                         
                        <td>
                              <!--    <a href="/imprimematricula/{{ $matA->idmatricula }}" class=" text text-dark"   >
                                    <i class="material-icons">
                                        print
                                    </i>
                                </a>-->
                             <a class=" text text-dark" id="btn-imprimir" href="" data-target="#imprimir" data-toggle="modal" data-myid="{{ $matA->idmatricula }}">
                                <i class="material-icons">
                                    print
                                </i>
                            </a>
                            <a href="/editarMatricula/{{ $matA->idmatricula }}" class="text text-info">
                                <i class="material-icons">
                                    edit
                                </i>
                            </a>
                            <a href="/inativarMatricula" class="text text-danger" 
                            data-myid="{{ $matA->idmatricula }}" data-mynome="{{ $matA->nomeMatricula() }}" data-toggle="modal" data-target="#inativar">
                                <i class="material-icons">
                                    highlight_off
                                </i>
                            </a>
                            
                            
                            <input type="hidden" name="idmatricula" value="{{ $matA->idmatricula }}" />
                          @if (empty( $matA->idturma))
                              
                            <a class="text text-warning" href="" data-toggle="modal" data-target="#turma"data-myid="{{ $matA->idmatricula }}">
                                <i class="material-icons ">
                                    group_add
                                </i>
                            </a>
                           
                          @endif
                            
                        </td>
                    </tr>
                    @endforeach 
                
                  
                    
            </table> 
        
   </div>  
    <!--ABA INATIVAS-->
    <div class="tab-pane" id="inativas" role="tabpanel" aria-labelledby="inativas-tab">
        <h2>Matriculas inativas</h2>
        <table id="dtInativas" class="table table-striped">
                <thead>
                    <tr>
                        <th>
                            Nome
                            <i class="material-icons float-right">
                                swap_vert
                            </i>
                        </th>
                            
                        <th>
                            Idade
                            <i class="material-icons float-right">
                                swap_vert
                            </i>
                        </th>

                        

                        <th>
                            Opções
                            <i class="material-icons float-right">
                            swap_vert
                            </i>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    
                        @foreach($matInativas as $matI)
                        <tr>
                            <td>{{ $matI->nomeMatricula() }}</td>
                            
                            <td>{{ $matI->idadeMatricula() }} anos</td>
                            
                            <td>
                                <a href="/ativarMatricula" class="text text-success" data-myid="{{ $matI->idmatricula }}" 
                                    data-mynome="{{ $matA->nomeMatricula() }}" data-toggle="modal" data-target="#ativar">
                                    <i class="material-icons text-success">
                                        done
                                    </i>
                                </a>


                            </td>
                            
                        </tr>
                        @endforeach
                    
                </tbody>
            </table>
         
    </div>
    <!--ABA ESPERA-->
     <div class="tab-pane" id="espera" role="tabpanel" aria-labelledby="espera-tab">
        <h2>Matriculas em espera</h2>
        <table id="dtEspera" class="table table-striped">
                <thead>
                    <tr>
                        <th>Nome
                                <i class="material-icons float-right">
                                    swap_vert
                                </i>
                            </th>
                            
                            <th>Idade
                                <i class="material-icons float-right">
                                    swap_vert
                                </i>
                            </th>
                           
                            <th>Opções
                                <i class="material-icons float-right">
                                swap_vert
                                </i>
                            </th>
                        
                    </tr>
                </thead>
                <tbody>
                    
                        @foreach($matEspera as $matE)
                        <tr>
                            <td>{{ $matE->nomeMatricula() }}</td>
                             <td>{{ $matE->idadeMatricula() }} anos</td>
                            
                            <td>
                                
                                <a href="/ativarMatricula" class="text text-danger" 
                                    data-myid="{{ $matE->idmatricula }}" data-mynome="{{ $matA->nomeMatricula() }}" 
                                    data-toggle="modal" data-target="#ativar">
                                    <i class="material-icons text-success">
                                        done
                                    </i>
                                </a>

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
                    <h5>Você tem certeza que deseja realmente inativar<u> <label id="nomecrianca" value=""></label></u> ?</h5>
                    <label>Motivo<span id="campoobrigatorio">*</span></label>
                    <textarea required class="form-control" type="text" name="motivoinativacao" id=""></textarea>
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

                    <h5>Você tem certeza que deseja realmente Ativar <label id="nomecrianca" value=""></label>?</h5>

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
            
            <form action="/imprimematricula" method="get">
                <div class="modal-body">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <input type="hidden" name="idmatricula" id="idmatricula" type="text" value="">

                    <h5>Deseja imprimir?</h5>

                    <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-success"  target="_blank"  >Preparar para impressão</button>
            
                    </div>
                </div>
            </form>
            
            
        </div>
    </div>
</div>


<!-- Modal  se aluno estiver sem turma-->
<div class="modal fade" id="turma" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title text-center" id="exampleModalCenterTitle">Escolher turma</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>
            
            <form action="/associaturma" method="post">
                <div class="modal-body">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <input type="hidden" name="idmatricula" id="idmatricula" type="text" value="">

                    <h5>Escolha uma turma</h5>
                    <select for="" class="form-control" name="idturma" id="">
                        @foreach ($turmas as $turma)
                           <option value="{{ $turma->idturma }}">{{ $turma->grupoconvivencia }}</option>
                        @endforeach
                    </select>
                    <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-success" >Confirmar</button>
            
                    </div>
                </div>
            </form>
            
            
        </div>
    </div>
</div>

<form action="/listagemResponsaveis" class="float-right" id="btn-novamatricula">
    <button class="btn btn-primary">Nova Matrícula</button>
</form>
<!--  -->

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

<script src="js/matriculas.js"></script>
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
