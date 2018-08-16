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
                        <td><a id="btn-imprimir" href="/pdfmatricula" target="_blank"><i class="fa fa-print fa-2x"></i></a>
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

<form action="/novaMatricula">
    <button class="btn btn-secondary">Nova Matrícula</button>
</form>


@stop
