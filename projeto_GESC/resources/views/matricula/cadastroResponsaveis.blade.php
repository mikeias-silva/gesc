@extends('layout.principal') 
@section('conteudo')
<div class="container" id="responsavel">
@if(empty($idcrianca))
<form action="adicionaResponsavel" method="POST" name = "responsavel" onsubmit="return validarDadosResp(responsavel.nomeresp1, responsavel.datanascimentoresp1, 
responsavel.cpfresp1, responsavel.rgresp1, responsavel.tel1resp1, responsavel.tel2resp1,
responsavel.nomeresp2, responsavel.datanascimentoresp2, responsavel.cpfresp2, responsavel.rgresp2, responsavel.tel1resp2, responsavel.tel2resp2);">
@else
<form action="adicionaResponsavelTroca_{{$idcrianca}}_{{$idresponsavel}}" method="POST" name = "responsavel" onsubmit="return validarDadosRespTroca(responsavel.nomeresp1, responsavel.datanascimentoresp1, 
responsavel.cpfresp1, responsavel.rgresp1, responsavel.tel1resp1, responsavel.tel2resp1);">
@endif

    {{ csrf_field() }}
        <div class="form">
        @if(empty($idcrianca))
            <h2>Responsável 01</h2>
        @else
            <h1>Troca de Responsável</h2>
            <h2>Responsável</h2>
        @endif
        
        <div class="form-group">
            <div class="row">
                <div class="col-sm-6">
                    <label>Nome*</label>
                    <input class="form-control" type="text" name="nomeresp1" maxlength="255" autocomplete="off" autofocus/>
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
                                {{-- <option value="CRAS">CRAS - Conselho Regional de Assistentes Sociais</option>
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
                                <option value="OUT">OUT - Outros Emissores</option> --}}
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
       @if(empty($idcrianca)) 
        <div class="container" id="meio">

        </div>
            
        <h2>Responsável 02</h2>
      
        <div class="form-group">
            <div class="row">
                <div class="col-sm-6">
                    <label>Nome*</label>
                    <input class="form-control" type="text" name="nomeresp2" id="nomeresp2" maxlength="255" autocomplete="off" />
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
                <div class="col-sm-2">
                    <label>RG</label>
                    <input type="text" class="form-control" name="rgresp2" id="rgresp2" autocomplete="off" onkeyup="mascara(this, Rg);" maxlength="9">
                    <span id="msgRgResp2"></span>
                </div>
                <div class="col-sm-2">
                        <label>Órgão Emissor RG</label>
                        <select class="form-control" name="emissorrgresposnavel2" id="">
                                <option class="form-control" value="SSP">SSP - Secretaria de Segurança Pública</option>
                                {{-- <option value="CRAS">CRAS - Conselho Regional de Assistentes Sociais</option>
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
                                <option value="OUT">OUT - Outros Emissores</option> --}}
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
        @endif
    

    <!-- ABA FAMILIA -->



    @if(empty($idcrianca))
            <button class="btn btn-success float-right" type="submit">
                Avançar
            </button>
    @else
        <div class="float-right">   
            <a href="listagemMatriculas">
                <button class="btn btn-secondary">
                    Cancelar
                </button>
            </a>
        </div> 
                <button class="btn btn-success float-right" type="submit">
                    Confirmar Troca
                </button>
    @endif
    </form>

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
                <p class="text-justify">Nesta tela é efetuada o cadastro de responsáveis, podendo ser cadastrado um OU dois responsáveis, junto dos dados  sociais da mesma, como programas sociais, renda familiar, CRAS/CREAS vinculados, etc. </p>
                <p class="text-justify">Para cada responsável é obrigatório informar o seu nome, data de nascimento, sexo, escolaridade, estado civil e o endereço do mesmo. O endereço é informado somente uma vez, sendo que os campos “Endereço” e “Bairro” serão preenchidos automaticamente caso seja informado um número de CEP válido.</p>
                <p class="text-justify">A lista de membros da família é dinâmica, ou seja, é possível adicionar novos espaços para o cadastro dos mesmos, permitindo assim a inclusão de quantos membros for desejado. Também é permitir remover membros da família. </p>
                <p class="text-justify">Não é necessário informar pontuação nos campos de RG, CPF e Telefone, somente dígitos.</p>                            
            </div>
        </div>
    </div>
</div>
<script src="/js/buscaCep.js"></script>

<script src="/js/validaResponsaveis.js"></script>
<script src="/js/membro_familia.js"></script>

@stop
