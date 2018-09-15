@extends('layout.principal') 
@section('conteudo')
<div class="container" id="responsavel">
<form action="/adicionaResponsavel" method="POST" name = "responsavel" onsubmit="return validarDadosResp(responsavel.nomeresp1, responsavel.datanascimentoresp1, 
responsavel.logradouro, responsavel.bairro, responsavel.cpfresp1, responsavel.rgresp1, responsavel.tel1resp1, responsavel.tel2resp1,
responsavel.nomeresp2, responsavel.datanascimentoresp2, responsavel.cpfresp2, responsavel.rgresp2, responsavel.tel1resp2, responsavel.tel2resp2);">
    {{ csrf_field() }}
        <div class="form">
        
        <h2>Responsável 01</h2>
        
        <div class="form-group">
            <div class="row">
                <div class="col-sm-6">
                    <label>Nome*</label>
                    <input class="form-control" type="text" name="nomeresp1" maxlength="255" autocomplete="off">
                    <span id="msgNomeResp1"></span>
                </div>
                
                <div class="col-sm-4">
                    <label>Data de Nascimento*</label>
                    <input type="date" class="form-control" name="datanascimentoresp1" id="datanascimentoresp1">
                    <span id="msgDataResp1"></span>
                </div>

                <div class="col-sm-2">
                    <label>Sexo*</label>
                    <select class="form-control" name="sexoresp1" id="">
                        <option value="M">Masculino</option>
                        <option value="F">Feminino</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                    <div class="col-sm-2">
                    <label>RG</label>
                    <input type="text" class="form-control" name="rgresp1" id="rgresp1" autocomplete="off" onkeyup="mascara(this, Rg);" maxlength="9"> 
                   
                    <span id="msgRgResp1"></span>
                </div>
                <div class="col-sm-2">
                        <label>Órgão Emissor RG</label>
                        <select class="form-control" name="emissorrgresposnavel1" id="">
                                <option class="form-control" value="SSP">SSP - Secretaria de Segurança Pública</option>
                                <option value="CRAS">CRAS - Conselho Regional de Assistentes Sociais</option>
                                <option value="COREN">COREN - Conselho Regional de Enfermagem</option>
                                <option value="CRA">CRA - Conselho Regional de Administração</option>
                                <option value="CRB">CRB - Conselho Regional de Biblioteconomia</option>
                                <option value="CRC">CRC - Conselho Regional de Contabilidade</option>
                                <option value="CRE">CRE - Conselho Regional de Estatística</option>
                                <option value="CREA">CREA - Conselho Regional de Engenharia Arquitetura e Agronomia</option>
                                <option value="CRECI">CRECI - Conselho Regional de Corretores de Imóveis</option>
                                <option value="CREFIT">CREFIT - Conselho Regional de Fisioterapia e Terapia Ocupacional</option>
                                <option value="CRF">CRF - Conselho Regional de Farmácia</option>
                                <option value="CRM">CRM - Conselho Regional de Medicina</option>
                                <option value="CRN">CRN - Conselho Regional de Nutrição</option>
                                <option value="CRO">CRO - Conselho Regional de Odontologia</option>
                                <option value="CRP">CRP - Conselho Regional de Psicologia</option>
                                <option value="CRPRE">CRPRE - Conselho Regional de Profissionais de Relações Públicas</option>
                                <option value="CRQ">CRQ - Conselho Regional de Química</option>
                                <option value="CRRC">CRRC - Conselho Regional de Representantes Comerciais</option>
                                <option value="CRMV">CRMV - Conselho Regional de Medicina Veterinária</option>
                                <option value="DPF">DPF - Polícia Federal</option>
                                <option value="EST">EST - Documentos Estrangeiros</option>
                                <option value="I CLA">I CLA - Carteira de Identidade Classista</option>
                                <option value="MAE">MAE - Ministério da Aeronáutica</option>
                                <option value="MEX">MEX - Ministério do Exército</option>
                                <option value="MMA">MMA - Ministério da Marinha</option>
                                <option value="OAB">OAB - Ordem dos Advogados do Brasil</option>
                                <option value="OMB">OMB - Ordens dos Músicos do Brasil</option>
                                <option value="IFP">IFP - Instituto de Identificação Félix Pacheco</option>
                                <option value="OUT">OUT - Outros Emissores</option>
                        </select>
                    </div>

                <div class="col-sm-4">
                    <label>CPF</label>
                    <input type="text" class="form-control" name="cpfresp1" id="cpfresp1" maxlength="11" autocomplete="off" onkeyup="mascara(this, cpf);">
                    <span id="msgCpfResp1"></span>
                </div>

                <div class="col-sm-4">
                    <label>Estado Civil*</label>
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
        <div class="form-group ">
                <div class="row" >
                    <div class="col-sm-2">
                        <label>CEP</label>
                        <input class="form-control" type="text" name="cep" id="cep" maxlength="8" autocomplete="off" onkeyup="mascara(this, Cep);"/>
                        <span id="msgCep"></span>
                    </div>
                    <div class="col-sm-5">
                        <label>Endereço*</label>
                        <input type="text" class="form-control" id="logradouro" name="logradouro" maxlength="255" autocomplete="off">
                        <span id="msgEndereco"></span>
                    </div>

                    <div class="col-sm-2">
                        <label>Nº</label>
                        <input class="form-control" type="number" name="ncasa" maxlength="255" autocomplete="off"/>
                    </div>

                    
                    <div class="col-sm-3">
                        <label>Bairro*</label>
                        <input type="text" class="form-control" id="bairro" name="bairro" maxlength="255" autocomplete="off">
                        <span id="msgBairro"></span>
                    </div>
                </div>
            </div>
            <div class="form-group ">
                <div class="row" >
                    <div class="col-sm-8">
                        <label>Complemento</label>
                        <input type="text" class="form-control" name="complemento" maxlength="255" autocomplete="off">
                    </div>

                    
                </div>
            </div>
        <div class="form-group">
            <div class="row">
                <div class="col-sm-8">
                    <label>Profissão</label>
                    <input type="text" class="form-control" name="profissaoresp1" autocomplete="off">
                </div>
              <!--   <div class="col-sm-4">
                    <label for="">Renda Familiar</label>
                    <select class="form-control" name="" id="">
                        <option value="">de 960 R$ até 1200 R$</option>
                    </select>
                </div>
                 -->
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col-sm-8">
                    <label>Local de Trabalho</label>
                    <input type="text" class="form-control" name="trabalhoresp1" autocomplete="off">
                </div>

                <div class="col-sm-4">
                    <label>Escolaridade*</label>
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
                    <input type="text" class="form-control" name="tel1resp1" id="tel1resp1"  autocomplete="off" onkeyup="mascara(this, Telefone);" maxlength="11">
                    <span id="msgTel1Resp1"></span>
                </div>
                <div class="col-sm-4">
                    <label>Telefone 2</label>
                    <input type="text" class="form-control" name="tel2resp1" id="tel2resp1" autocomplete="off" onkeyup="mascara(this, Telefone);" maxlength="11">
                    <span id="msgTel2Resp1"></span>
                </div>
            </div>
        </div>

        <label>Observações</label>
        <textarea name="obsresp1" id="" cols="10" rows="2" class="form-control"></textarea>

        <div class="container" id="meio">

        </div>
            
        <h2>Responsável 02</h2>
      
        <div class="form-group">
            <div class="row">
                <div class="col-sm-6">
                    <label>Nome*</label>
                    <input class="form-control" type="text" name="nomeresp2" id="nomeresp2" maxlength="255" autocomplete="off">
                    <span id="msgNomeResp2"></span>
                </div>
            

                <div class="col-sm-4">
                    <label>Data de Nascimento*</label>
                    <input type="date" class="form-control" name="datanascimentoresp2">
                    <span id="msgDataResp2"></span>
                </div>

                <div class="col-sm-2">
                        <label>Sexo*</label>
                        <select class="form-control" name="sexoresp2" id="">
                            <option value="M">Masculino</option>
                            <option value="F">Feminino</option>
                        </select>
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col-sm-">
                    <label>RG</label>
                    <input type="text" class="form-control" name="rgresp2" id="rgresp2" autocomplete="off" onkeyup="mascara(this, Rg);" maxlength="9">
                    <span id="msgRgResp2"></span>
                </div>
                <div class="col-sm-2">
                        <label>Órgão Emissor RG</label>
                        <select class="form-control" name="emissorrgresposnavel2" id="">
                                <option class="form-control" value="SSP">SSP - Secretaria de Segurança Pública</option>
                                <option value="CRAS">CRAS - Conselho Regional de Assistentes Sociais</option>
                                <option value="COREN">COREN - Conselho Regional de Enfermagem</option>
                                <option value="CRA">CRA - Conselho Regional de Administração</option>
                                <option value="CRB">CRB - Conselho Regional de Biblioteconomia</option>
                                <option value="CRC">CRC - Conselho Regional de Contabilidade</option>
                                <option value="CRE">CRE - Conselho Regional de Estatística</option>
                                <option value="CREA">CREA - Conselho Regional de Engenharia Arquitetura e Agronomia</option>
                                <option value="CRECI">CRECI - Conselho Regional de Corretores de Imóveis</option>
                                <option value="CREFIT">CREFIT - Conselho Regional de Fisioterapia e Terapia Ocupacional</option>
                                <option value="CRF">CRF - Conselho Regional de Farmácia</option>
                                <option value="CRM">CRM - Conselho Regional de Medicina</option>
                                <option value="CRN">CRN - Conselho Regional de Nutrição</option>
                                <option value="CRO">CRO - Conselho Regional de Odontologia</option>
                                <option value="CRP">CRP - Conselho Regional de Psicologia</option>
                                <option value="CRPRE">CRPRE - Conselho Regional de Profissionais de Relações Públicas</option>
                                <option value="CRQ">CRQ - Conselho Regional de Química</option>
                                <option value="CRRC">CRRC - Conselho Regional de Representantes Comerciais</option>
                                <option value="CRMV">CRMV - Conselho Regional de Medicina Veterinária</option>
                                <option value="DPF">DPF - Polícia Federal</option>
                                <option value="EST">EST - Documentos Estrangeiros</option>
                                <option value="I CLA">I CLA - Carteira de Identidade Classista</option>
                                <option value="MAE">MAE - Ministério da Aeronáutica</option>
                                <option value="MEX">MEX - Ministério do Exército</option>
                                <option value="MMA">MMA - Ministério da Marinha</option>
                                <option value="OAB">OAB - Ordem dos Advogados do Brasil</option>
                                <option value="OMB">OMB - Ordens dos Músicos do Brasil</option>
                                <option value="IFP">IFP - Instituto de Identificação Félix Pacheco</option>
                                <option value="OUT">OUT - Outros Emissores</option>
                        </select>
                    </div>

                <div class="col-sm-4">
                    <label>CPF</label>
                    <input type="text" class="form-control" name="cpfresp2" id="cpfresp2" maxlength="11" autocomplete="off" onkeyup="mascara(this, cpf);">
                    <span id="msgCpfResp2"></span>
                </div>
                
                <div class="col-sm-4">
                    <label>Estado Civil*</label>
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
                    <input type="text" class="form-control" name="profissaoresp2" autocomplete="off">
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col-sm-8">
                    <label>Local de Trabalho</label>
                    <input type="text" class="form-control" name="trabalhoresp2" autocomplete="off">
                </div>
                <div class="col-sm-4">
                    <label>Escolaridade*</label>
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
                    <input type="tel" class="form-control" name="tel1resp2" id="tel1resp2" autocomplete="off" onkeyup="mascara(this, Telefone);" maxlength="11">
                    <span id="msgTel1Resp2"></span>
                </div>
                <div class="col-sm-4">
                    <label>Telefone 2</label>
                    <input type="tel" class="form-control" name="tel2resp2" id="tel2resp2" autocomplete="off" onkeyup="mascara(this, Telefone);" maxlength="11">
                    <span id="msgTel2Resp2"></span>
                </div>
            </div>
        </div>

        <label>Observações</label>
        <textarea name="obsresp2" id="" cols="10" rows="2" class="form-control"></textarea>
    
        </div>
    

    <!-- ABA FAMILIA -->
    <div class="" id="familia" >
        
        <br>
        <div class="form-group">
            <div class="row">
                <div class="col-sm-8">
                    <label>Número do NIS</label>
                    <input type="text" class="form-control" name="numnis" autocomplete="off">
                    <span id="msgNumNis"></span>
                </div>
                <div class="col-sm-4">
                    <label>Moradia*</label>
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
            <label>Tipo Habitação*</label>
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
                <div class="col-sm-3">
                    <label>CRAS/CREAS*</label>
                    <select name="cras" id="" class="custom-select" name="cras">
                        @foreach($cras as $c)
                            <option value="{{ $c->idcras}}">{{ $c->nomecras }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-sm-3">
                    <label>Renda familiar</label>
                    <select name="rendafamiliar" id="" class="custom-select form-control">
                        <option value="1 a 2 salarios minimo">1 à 2 salários minimo</option>
                        <option value="2 a 3 salarios minimo">2 à 3 salários minimo</option>
                        <option value="Mais de 3 salarios minimos">Mais de 3 salarios minimos</option>
                    </select>
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
    </div>
<script src="js/buscaCep.js"></script>

<script src="js/validaResponsaveis.js"></script>


@stop