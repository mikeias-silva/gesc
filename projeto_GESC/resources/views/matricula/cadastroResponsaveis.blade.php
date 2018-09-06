@extends('layout.principal') 
@section('conteudo')
<div class="" id="responsavel">
<form action="/crianca" method="POST">
    {{ csrf_field() }}
        <div class="form">
        <br>
        <h5>Responsável 01</h5>
        <br>
        <div class="form-group">
            <div class="row">
                <div class="col-sm-6">
                    <label>Nome</label>
                    <input class="form-control" type="text" name="nomeresp1" maxlength="255" autocomplete="off">
                    <span id="msgNomeResp1"></span>
                </div>
                
                <div class="col-sm-4">
                    <label>Data de Nascimento</label>
                    <input type="date" class="form-control" name="datanascimentoresp1">
                    <span id="msgDataResp1"></span>
                </div>

                <div class="col-sm-2">
                    <label>Sexo</label>
                    <select class="form-control" name="sexoresp1" id="">
                        <option value="M">Masculino</option>
                        <option value="F">Feminino</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                    <div class="col-sm-4">
                    <label>RG</label>
                    <input type="text" class="form-control" name="rgresp1" autocomplete="off" onkeyup="mascara(this, Rg);" maxlength="9"> 
                    <span id="msgRgResp1"></span>
                </div>

                <div class="col-sm-4">
                    <label>CPF</label>
                    <input type="text" class="form-control" name="cpfresp1" maxlength="11" autocomplete="off" onkeyup="mascara(this, Cpf);">
                    <span id="msgCpfResp1"></span>
                </div>

                <div class="col-sm-4">
                    <label>Estado Civil</label>
                    <select class="form-control" name="estadocivilresp1" id="">
                        <option value="1">Solteiro</option>
                        <option value="2">Casado</option>
                        <option value="3">Divorciado</option>
                        <option value="4">Viúvo</option>
                        <option value="5">Separado</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col-sm-8">
                    <label>Profissão</label>
                    <input type="text" class="form-control" name="profissaoresp1">
                </div>
                
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col-sm-8">
                    <label>Local de Trabalho</label>
                    <input type="text" class="form-control" name="trabalhoresp1">
                </div>

                <div class="col-sm-4">
                    <label>Escolaridade</label>
                    <select class="form-control" name="escolaridaderesp1" id="">
                        <option value="1">Ensino Fundamental Incompleto</option>
                        <option value="2">Ensino Fundamental Completo</option>
                        <option value="3">Ensino Médio Incompleto</option>
                        <option value="4">Ensino Médio Completo</option>
                        <option value="5">Ensino Superior Incompleto</option>
                        <option value="6">Ensino Superior Completo</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col-sm-4">
                    <label>Telefone</label>
                    <input type="text" class="form-control" name="tel1resp1" id="tel1resp1"  onkeyup="mascara(this, Telefone);" maxlength="11">
                    <span id="msgTel1Resp1"></span>
                </div>
                <div class="col-sm-4">
                    <label>Telefone 2</label>
                    <input type="text" class="form-control" name="tel2resp1" id="tel2resp1" onkeyup="mascara(this, Telefone);" maxlength="11">
                    <span id="msgTel2Resp1"></span>
                </div>
            </div>
        </div>

        <label>Observações</label>
        <textarea name="obsresp1" id="" cols="10" rows="2" class="form-control"></textarea>

        <div class="container" id="meio">

        </div>
            
        <h5>Responsável 02</h5>
        <br>
        <div class="form-group">
            <div class="row">
                <div class="col-sm-6">
                    <label>Nome:</label>
                    <input class="form-control" type="text" name="nomeresp2" id="nomeresp2" maxlength="255" autocomplete="off">
                    <span id="msgNomeResp2"></span>
                </div>

                <div class="col-sm-4">
                    <label>Data de Nascimento</label>
                    <input type="date" class="form-control" name="datanascimentoresp2">
                    <span id="msgDataResp2"></span>
                </div>

                <div class="col-sm-2">
                        <label>Sexo</label>
                        <select class="form-control" name="sexoresp2" id="">
                            <option value="M">Masculino</option>
                            <option value="F">Feminino</option>
                        </select>
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col-sm-4">
                    <label>RG</label>
                    <input type="text" class="form-control" name="rgresp2" id="rgresp2" autocomplete="off" onkeyup="mascara(this, Rg);" maxlength="9">
                    <span id="msgRgResp2"></span>
                </div>

                <div class="col-sm-4">
                    <label>CPF</label>
                    <input type="text" class="form-control" name="cpfresp2" id="cpfresp2" maxlength="11" autocomplete="off" onkeyup="mascara(this, Cpf);">
                    <span id="msgCpfResp2"></span>
                </div>
                
                <div class="col-sm-4">
                    <label>Estado Civil</label>
                    <select class="form-control" id="" name="estadocivilresp2">
                        <option value="1">Solteiro</option>
                        <option value="2">Casado</option>
                        <option value="3">Divorciado</option>
                        <option value="4">Viúvo</option>
                        <option value="5">Separado</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col-sm-8">
                    <label>Profissão</label>
                    <input type="text" class="form-control" name="profissaoresp2">
                </div>
               
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col-sm-8">
                    <label>Local de Trabalho</label>
                    <input type="text" class="form-control" name="trabalhoresp2">
                </div>
                <div class="col-sm-4">
                    <label>Escolaridade</label>
                    <select class="form-control" id="" name="escolaridaderesp2">
                            <option value="1">Ensino Fundamental Incompleto</option>
                            <option value="2">Ensino Fundamental Completo</option>
                            <option value="3">Ensino Médio Incompleto</option>
                            <option value="4">Ensino Médio Completo</option>
                            <option value="5">Ensino Superior Incompleto</option>
                            <option value="6">Ensino Superior Completo</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col-sm-4">
                    <label>Telefone 1</label>
                    <input type="tel" class="form-control" name="tel1resp2" id="tel1resp2" onkeyup="mascara(this, Telefone);" maxlength="11">
                    <span id="msgTel1Resp2"></span>
                </div>
                <div class="col-sm-4">
                    <label>Telefone 2</label>
                    <input type="tel" class="form-control" name="tel2resp2" id="tel2resp2" onkeyup="mascara(this, Telefone);" maxlength="11">
                    <span id="msgTel2Resp2"></span>
                </div>
            </div>
        </div>

        <label>Observações</label>
        <textarea name="obsresp2" id="" cols="10" rows="2" class="form-control"></textarea>
    
        </div>
    </div>

    <!-- ABA FAMILIA -->
    <div class="" id="familia" >
        
        <br>
        <div class="form-group">
            <div class="row">
                <div class="col-sm-8">
                    <label>Número do NIS</label>
                    <input type="text" class="form-control" name="numnis">
                    <span id="msgNumNis"></span>
                </div>
                <div class="col-sm-4">
                    <label>Moradia</label>
                    <select class="form-control" name="moradia" id="">
                        <option value="1">Alugada</option>
                        <option value="2">Cedida</option>
                        <option value="3">Própria</option>
                    </select>
                </div>
            </div>
        </div>
        <br>

        
        <!-- radio buttons -->
        <div class="form-group">
            <label>Tipo Habitação</label>
            <div class="row">
                <div class="col-sm-1">
                    <div class="form-check">
                        <label class="form-check-label" for="rd-alvenaria">
                            <input type="radio" class="form-check-input" id="rd-alvenaria" name="tipohabitacao" value="alvenaria" checked>Alvenaria
                        </label>
                    </div>
                </div>
                <div class="col-sm-1">
                    <div class="form-check">
                        <label class="form-check-label" for="rd-madeira">
                            <input type="radio" class="form-check-input" id="rd-madeira" name="tipohabitacao" value="madeira">Madeira
                        </label>
                    </div>
                </div>
                <div class="col-sm-1">
                    <div class="form-check">
                        <label class="form-check-label" for="rd-mista">
                            <input type="radio" class="form-check-input" id="rd-mista" name="tipohabitacao" value="Mista">Mista
                        </label>
                    </div>
                </div>
            </div>
        </div>
                    
            <!-- checkboxes -->
            <label>Programas Sociais</label>
            <div class="form-inline">
            <div class="form-check col-sm-2">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" name="arearisco" value="1">Mora em área de risco
                </label>
            </div>

            <div class="form-check col-sm-2">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" name="bolsafamilia" value="1">Beneficiário do Bolsa Familia
                </label>
            </div>

            <div class="form-check col-sm-2">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" name="beneficiopc" value="1">Benefício Pessoa Continuada
                </label>
            </div>
        </div>
            <!--GRID MEMBRO FAMILIA-->
            <!--<h5 class="text-center font-weight-bold text-uppercase py-5">Membros Familia</h5>-->
     <!--       <div class="">
                <div id="table" class="table-editable">
                    
                       
                    <table class="table table-bordered table-responsive-md text-center">
                        <h5 class="text-center font-weight-bold text-uppercase py-6">Membros Familia</h5>
                    
                        <tr>
                            <th class="text-center">Nome</th>
                            <th class="text-center">Data Nascimento</th>
                            <th class="text-center">Local Trabalha</th>
                            
                            <th class="text-center">Escola</th>
                        </tr>
                        <tr class="hide">
                            <td class="pt-3-half"><input id="tdedit" type="text" value="" name="nomemembro1"/></td>
                            <td class="pt-3-half"><input id="tdedit" type="date" value="" name="nascimentomembro1"/></td>
                            <td class="pt-3-half"><input id="tdedit" type="text" name="trabmembro1"/></td>
                            <td> 
                               <select id="tdedit" name="escolamembro1" id="" class="custom-select" >
                                   <option value="">Não estuda</option>
                                INSERIR LOGICA DAS ESCOLAS PARA MEMBRO FAMILIA    
                                </select>
                            </td>
                 
                            
                        </tr>
                        <tr class="hide">
                            <td class="pt-3-half"><input id="tdedit" type="text" value="" name="nomemembro2"/></td>
                            <td class="pt-3-half"><input id="tdedit" type="date" value="" name="nascimentomembro2"/></td>
                            <td class="pt-3-half"><input id="tdedit" type="text" name="trabmembro2"/></td>
                            <td> 
                               <select id="tdedit" name="escolamembro2" id="" class="custom-select" >
                                   INSERIR LOGICA DAS ESCOLAS PARA MEMBRO FAMILIA    
                               </select>
                            </td>
                           
                            
                        </tr>
                       
                    </table>
                    
                </div>
            
           </div>
        -->
        
        </div>

      
            <button class="btn btn-success float-right" type="submit">
                Avançar
            </button>
      </form>
@stop