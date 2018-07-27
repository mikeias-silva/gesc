@extends('layout.principal') 
@extends('matricula.identificacao')
@section('conteudo')

<ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
                <a class="nav-link active" id="identificacao-tab" data-toggle="tab" href="#identificacao" role="tab" aria-controls="identificacao" aria-selected="true">Identificação</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="responsavel-tab" data-toggle="tab" href="#responsavel" role="tab" aria-controls="responsavel" aria-selected="false">Responsável</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="familia-tab" data-toggle="tab" href="#familia" role="tab" aria-controls="familia" aria-selected="false">Constituição Familiar</a>
              </li>
            </ul>

            <div class="tab-content" id="myTabContent">
                <!--ABA IDENTIFICAÇÃO -->
              <div class="tab-pane fade show active" id="identificacao" role="tabpanel" aria-labelledby="identificacao-tab">
                
                  
                <div id="identmatricula">

               
                      <form class="form-group " action="/novaMatricula/adiciona" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group" >
                            <label>Nome</label>
                            <input type="text" class="form-control" name="nomecrianca">
                        </div>

                         
                        <div class="form-group">
                            <label>Nascimento</label>
                            <input type="date" class="form-control" name="datanascimentocrianca">
                        </div>

                        <div class="form-group">
                            <label>Sexo</label>
                            <select name="sexocrianca" id="" class="custom-select" value="">
                              <option value="M">Masculino</option>
                              <option value="F">Feminino</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>status</label>
                            <select name="statusmatricula" id="" class="custom-select" value="">
                                <option value="0">Inativo</option>
                                <option value="1">Ativo</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>RG</label>
                            <input type="text" class="form-control" name="rgcrianca">
                        </div>

                        <div class="form-group">
                            <label>CPF</label>
                            <input type="text" class="form-control" name="cpfcrianca" >
                        </div>

                        <div class="form-group">
                            <label>CEP</label>
                            <input type="text" class="form-control" name="cep">
                        </div>

                        <div class="form-group">
                            <label>Endereço</label>
                            <input type="text" class="form-control" name="logradouro">
                        </div>

                        <div class="form-group">
                            <label>Bairro</label>
                            <input type="text" class="form-control" name="bairro">
                        </div>

                        <div class="form-group ">
                            <label>Complemento</label>
                            <input type="text" class="form-control" name="complemento">
                        </div>

                        <div class="form-group">
                            <label>CRAS/CREAS</label>
                            <select name="cras" id="" class="custom-select" name="cras">
                                @foreach($cras as $c)
                                    <option value="{{ $c->id}}">{{ $c->nomeCras }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>publico priritario</label>
                            <select name="pprioritario" id="" class="custom-select">
                                @foreach($pprioritario as $p)
                                    <option value="{{ $p->idpublicoprioritario }}">{{ $p->publicoprioritario }}</option>
                                @endforeach

                               
                            </select>
                        </div>

                        

                        <div class="form-group">
                            <label>Escola</label>
                            <select name="escola" id="" class="custom-select" >
                                @foreach($escola as $e)
                                    <option value="{{ $e->idescola }}">{{ $e->nomeescola }}</option>
                                @endforeach
                            </select>

                        </div>

                        <div class="form-group">
                            <label>Serie Escolar</label>
                            <select name="serie" id="" class="custom-select">
                              <option value="3">Implementar logica das series aqui</option>
                             
                        </select>

                        </div>

                        <div class="form-group ">
                            <label>Observações de Saúde</label>
                            <textarea name="obssaude" id="" cols="10" rows="2" class="form-control"></textarea>
                        </div>

                        <button type="submit" class="btn btn-success">Salvar</button>
                        
                      </form>
                </div>
                   
                  

              </div>

              <!-- ABA RESPONSÁVEL -->
              <div class="tab-pane fade" id="responsavel" role="tabpanel" aria-labelledby="responsavel-tab">
                 <form class="form" action="..fazer func para add resp">
                    <h2>Responsável 01</h2>
                    <label>Nome:</label>
                    <input class="form-control" type="text" name="nomeresp" id="nomeresp">

                    <div class="form-group" >
                        <label>Sexo</label>
                        <select class="form-control" name="" id="">
                            <option value="M">Masculino</option>
                            <option value="F">Feminino</option>
                        </select>
                    </div>

                    <label>Data de Nascimento</label>
                    <input type="date" class="form-control">

                    <label>RG</label>
                    <input type="text" class="form-control">

                    <label>CPF</label>
                    <input type="text" class="form-control">
                    
                    <label>Estado Civil</label>
                    <select class="form-control" name="" id="">
                        <option value=""></option>
                    </select>

                    <div class="form-group ">
                        <label>Telefone</label>
                        <input type="number" class="form-control" name="tel1">
                    </div>
                    <div class="form-group ">
                        <label>Telefone 2</label>
                        <input type="number" class="form-control" name="tel2">
                    </div>

                    <label>Profissão</label>
                    <input type="text" class="form-control">

                    <label>Salário</label>
                    <input type="number" class="form-control">

                    <label>Local de Trabalho</label>
                    <input type="text" class="form-control">

                    <label>Escolaridade</label>
                    <select class="form-control" name="" id="">
                        <option value="">Ensino Médio</option>
                    </select>

                    <label>Telefone 1</label>
                    <input type="tel" class="form-control">

                    <label>Telefone 2</label>
                    <input type="tel" class="form-control">

                    <label>Observações</label>
                    <textarea name="" id="" cols="10" rows="2" class="form-control"></textarea>
            
                    <div class="container" id="meio">

                    </div>
                     
                    <h2>Responsável 02</h2>
                    <label>Nome:</label>
                    <input class="form-control" type="text" name="nomeresp" id="nomeresp">

                    <div class="form-group" >
                           <label>Sexo</label>
                           <select class="form-control" name="" id="">
                               <option value="M">Masculino</option>
                               <option value="F">Feminino</option>
                           </select>
                    </div>
   
                    <label>Data de Nascimento</label>
                    <input type="date" class="form-control">

                    <label>RG</label>
                    <input type="text" class="form-control">

                    <label>CPF</label>
                    <input type="text" class="form-control">
                    
                    <label>Estado Civil</label>
                    <select class="form-control" name="" id="">
                        <option value=""></option>
                    </select>

                    <label>Profissão</label>
                    <input type="text" class="form-control">

                    <label>Salário</label>
                    <input type="number" class="form-control">

                    <label>Local de Trabalho</label>
                    <input type="text" class="form-control">

                    <label>Escolaridade</label>
                    <select class="form-control" name="" id="">
                        <option value="">Ensino Médio</option>
                    </select>

                    <label>Telefone 1</label>
                    <input type="tel" class="form-control">

                    <label>Telefone 2</label>
                    <input type="tel" class="form-control">

                    <label>Observações</label>
                    <textarea name="" id="" cols="10" rows="2" class="form-control"></textarea>
               
                 </form>
              </div>

              <!-- ABA FAMILIA -->
              <div class="tab-pane fade" id="familia" role="tabpanel" aria-labelledby="familia-tab">
                 <form action="...inserir regra constituição familiar">
                    <label>Número do NIS</label>
                    <input type="text" class="form-control">

                    <label>Moradia</label>
                    <select class="form-control" name="" id="">
                        <option value="">Alugada</option>
                    </select>

                    
                    <!-- radio buttons -->
                    <label>Tipo Habitação</label>
                    <div class="form-check-inline">
                            <label class="form-check-label" for="rd-propria">
                              <input type="radio" class="form-check-input" id="rd-propria" name="rd-tphabitacao" value="propria" checked>Própria
                            </label>
                          </div>
                          <div class="form-check-inline">
                            <label class="form-check-label" for="rd-alugada">
                              <input type="radio" class="form-check-input" id="rd-alugada" name="rd-tphabitacao" value="alugada">Alugada
                            </label>
                          </div>
                          <div class="form-check-inline">
                            <label class="form-check-label" for="rd-prolar">
                              <input type="radio" class="form-check-input" id="rd-prolar" name="rd-tphabitacao" value="prolar">Programa Prolar
                            </label>
                          </div>
                          
                    <!-- checkboxes -->
                    <div class="form-check-inline">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input">Area de risco
                        </label>
                    </div>

                    <div class="form-check-inline">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input">Bolsa Familia
                        </label>
                    </div>

                    <div class="form-check-inline">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input">Benefício Pessoa Continuada
                        </label>
                    </div>
                  
                 </form>
              </div>
            </div>  
            <div class="container">
              
            <a href="/matriculas">
                <button class="btn btn-default" id="btn-mat">Cancelar</button>
            </a>
                       
                <button class="btn btn-primary" id="btn-mat">Confirmar Matricula</button>
            </div>
         
@stop