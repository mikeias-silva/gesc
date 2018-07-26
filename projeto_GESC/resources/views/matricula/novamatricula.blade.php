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
              <div class="tab-pane fade show active" id="identificacao" role="tabpanel" aria-labelledby="identificacao-tab">
                
                  
                <div id="identmatricula">

               
                      <form class="form-group " action="matricula/adiciona">
                        
                        <div class="form-group" >
                            <label>Nome</label>
                            <input type="text" class="form-control ">
                        </div>

                         
                        <div class="form-group">
                            <label>Nascimento</label>
                            <input type="date" class="form-control ">
                        </div>

                        <div class="form-group">
                            <label>Sexo</label>
                            <select name="sexo" id="" class="custom-select">
                              <option value="M">Masculino</option>
                              <option value="F">Feminino</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>RG</label>
                            <input type="text" class="form-control ">
                        </div>

                        <div class="form-group">
                            <label>CPG</label>
                            <input type="text" class="form-control ">
                        </div>

                        <div class="form-group">
                            <label>CEP</label>
                            <input type="text" class="form-control ">
                        </div>

                        <div class="form-group">
                            <label>Endereço</label>
                            <input type="text" class="form-control ">
                        </div>

                        <div class="form-group">
                            <label>Bairro</label>
                            <input type="text" class="form-control ">
                        </div>

                        <div class="form-group ">
                            <label>Complemento</label>
                            <input type="text" class="form-control ">
                        </div>

                        <div class="form-group">
                            <label>CRAS/CREAS</label>
                            <select name="cras" id="" class="custom-select">
                              <option value="M">Implementar logica dos cras aqui</option>
                             
                            </select>
                        </div>
                        <div class="form-group">
                            <label>publico priritario</label>
                            <select name="cras" id="" class="custom-select">
                              <option value="M">Implementar logica dos publicos prioritarios aqui</option>
                             
                            </select>
                        </div>

                        <div class="form-group ">
                            <label>Telefone</label>
                            <input type="number" class="form-control ">
                        </div>
                        <div class="form-group ">
                            <label>Telefone 2</label>
                            <input type="number" class="form-control ">
                        </div>

                        <div class="form-group">
                            <label>Escola</label>
                            <select name="cras" id="" class="custom-select">
                              <option value="M">Implementar logica das escolas aqui</option>
                             
                            </select>

                        </div>

                        <div class="form-group">
                            <label>Serie Escolar</label>
                            <select name="cras" id="" class="custom-select">
                              <option value="M">Implementar logica das series aqui</option>
                             
                            </select>

                        </div>

                        <div class="form-group ">
                            <label>Observações de Saúde</label>
                            <textarea name="" id="" cols="10" rows="2" class="form-control"></textarea>
                        </div>

                     
                        
                      </form>
                </div>
                   
                  

              </div>

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