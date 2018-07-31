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
                        
                        <th>Status</th>
                    </tr>
                </thead>
                    
                    @foreach($matAtivas as $matA)
                    <tr>
                        <td>{{ $matA->idcrianca }}</td>
                        <td>{{ $matA->idturma }}</td>
                        <td>{{ $matA->idcrianca }}</td>
                        <td>{{ $matA->anomatricula }}</td>
                        <td>{{ $matA->statuscadastro }}</td>
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
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        @foreach($matAtivas as $matA)
                        <td>{{ $matA->datasairespera }}</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        @endforeach
                    </tr>
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
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        @foreach($matAtivas as $matA)
                        <td>{{ $matA->datasairespera }}</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
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