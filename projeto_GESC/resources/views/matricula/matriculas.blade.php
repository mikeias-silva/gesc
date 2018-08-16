@extends('layout.principal') 
@section('conteudo')

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
<h1 id="atencao">colocar campo de filtro aqui</h1>
<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="ativas" role="tabpanel" aria-labelledby="ativas-tab">
        <h2>Matriculas ativas</h2>
        <table class="table table-hover">
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
                        <td><a id="btn-imprimir" href="/pdfmatricula"><i class="fa fa-print fa-2x"></i></a>
                            <a href="/inativarMatricula" class="text text-danger" data-myid="{{ $matA->idmatricula }}" data-toggle="modal" data-target="#inativar">inativar</a>
                        </td>
                    </tr>
                    @endforeach 
                
                  
                    
            </table>
            
    </div>

    <!--ABA INATIVAS-->
    <div class="tab-pane fade" id="inativas" role="tabpanel" aria-labelledby="inativas-tab">
        <h2>Matriculas inativas</h2>
        <table class="table table-hover">
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
                            <td><a id="btn-imprimir" href="/pdfmatricula"><i class="fa fa-print fa-2x"></i></a></td>
                        </tr>
                        @endforeach
                    
                </tbody>
            </table>
         
    </div>

    
<!--ABA ESPERA-->
    <div class="tab-pane fade" id="espera" role="tabpanel" aria-labelledby="espera-tab">
        <h2>Matriculas em espera</h2>
        <table class="table table-hover">
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
                    <tr>
                        @foreach($matEspera as $matE)
                        <tr>
                            <td>{{ $matE->nomeMatricula() }}</td>
                            <td>{{ $matE->nomeTurma() }}</td>
                            <td>{{ $matE->idadeMatricula() }}</td>
                            <td>{{ $matE->anoMatricula() }}</td>
                            <td><a id="btn-imprimir" href="/pdfmatricula"><i class="fa fa-print fa-2x"></i></a></td>
                        </tr>
                        @endforeach
                    </tr>
                </tbody>
            </table>
         
    </div>  
</div>   

<!-- Modal Center modal de ativacao-->
<div class="modal fade" id="inativar" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
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

                    <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-danger">Inativar</button>
            
                    </div>
                </div>
            </form>
            
            
        </div>
    </div>
</div>

<form action="/novaMatricula">
    <button class="btn btn-secondary">Nova Matrícula</button>
</form>


@stop