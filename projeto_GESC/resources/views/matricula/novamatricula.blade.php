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
                            <input type="text" class="form-control ">
                        </div>

                     
                        
                      </form>
                </div>
                      <div class="" >
                          <a class="nav-link" id="responsavel-tab" data-toggle="tab" href="#responsavel" role="tab" aria-controls="responsavel">
                             <button> Proximo</button></a>
                      </div>
                  

              </div>

              <div class="tab-pane fade" id="responsavel" role="tabpanel" aria-labelledby="responsavel-tab">
                  Responsável
              </div>

              <div class="tab-pane fade" id="familia" role="tabpanel" aria-labelledby="familia-tab">
                  Constituição familiar
              </div>
            </div>
@stop