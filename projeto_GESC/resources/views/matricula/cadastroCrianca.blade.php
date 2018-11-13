@extends('layout.principal')
@section('conteudo')
<div class="container">
    <!--ABA IDENTIFICAÇÃO -->
    <h1>Nova Matrícula</h1>
    <h2>Cadastro Criança</h2>

    <form action="adicionaCrianca" method="POST" 
    onsubmit="return validarCrianca(novaCrianca.nomecrianca, novaCrianca.datanascimentocrianca, novaCrianca.rgcrianca, novaCrianca.cpfcrianca);" name="novaCrianca">
            {{ csrf_field() }}
            <div class="form-group">
            
                <input name="idresponsavel1" type="hidden" value="{{ $idresponsavel1 }}"/>
                
                @if (!empty($idresponsavel2 ))
                    <input name="idresponsavel2" type="hidden" value="{{ $idresponsavel2 }}"/> 
                @endif 
                @if (!empty($responsaveis[0]))
                    
                    <input name="idresponsavel1" type="hidden" value="{{ $responsaveis[0] }}"/> 
                
                    
                @endif 
                @if (!empty($responsaveis[1] ))
                    <input name="idresponsavel2" type="hidden" value="{{ $responsaveis[1] }}"/>
                @endif
                
            <div class="form-group ">
                <div class="row">
                    <div class="col-sm-6" >
                        <label>Nome</label>
                        <input type="text" class="form-control" name="nomecrianca" maxlength="255" autocomplete="off" autofocus/>
                        <span id="msgNomeCrianca"></span>
                    </div>
                         
                    <div class="col-sm-4">
                        <label>Nascimento</label>
                        <input type="date" class="form-control" name="datanascimentocrianca">
                        <span id="msgDataNascimento"></span>
                    </div>

                    
                    <div class="col-sm-2">
                        <label>Sexo</label>
                        <select name="sexocrianca" id="" class="custom-select" value="">
                            <option value="F">Feminino</option>
                            <option value="M">Masculino</option>
                        </select>
                    </div>
                </div>
            </div>
            
            <div class="form-group ">
                <div class="row" >
                    <div class="col-sm-2">
                        <label>RG</label>
                        <input type="text" class="form-control" id="rgcrianca" name="rgcrianca" onkeyup="mascara(this, Rg);" maxlength="9" autocomplete="off">
                        <span id="msgRg"></span>
                    </div>
                    <div class="col-sm-2">
                            <label>Órgão Emissor RG</label>
                            <select class="form-control" name="emissorrgcrianca" id="">
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
                        <input type="text" class="form-control" name="cpfcrianca" id="cpfcrianca" maxlength="11" autocomplete="off" onkeyup="mascara(this, Cpf);">
                        <span id="msgCpf"></span>
                    </div>

                   
                </div>
            </div>

            <div class="form-group " >
                <div class="row" >
                    <div class="col-sm-6">
                        <label>Público Prioritário</label>
                        <select name="pprioritario" id="" class="custom-select">
                            @foreach($pprioritario as $p)
                                <option value="{{ $p->idpublicoprioritario }}">{{ $p->publicoprioritario }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-6">
                        <label>Escola</label>
                        <select name="escola" id="" class="custom-select" >
                            @foreach($escolas as $e)
                                <option value="{{ $e->idescola }}">{{ $e->nomeescola }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            

            <div class="form-group">
                <div class="row">
                    
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-sm-3">
                        <label>Serie Escolar</label>
                        <select name="serie" id="" class="custom-select"> 
                            <option value="1">1º Fundamental</option>
                            <option value="2">2º Fundamental</option>
                            <option value="3">3º Fundamental</option>
                            <option value="4">4º Fundamental</option>
                            <option value="5">5º Fundamental</option>
                            <option value="6">6º Fundamental</option>
                            <option value="7">7º Fundamental</option>
                            <option value="8">8º Fundamental</option>
                            <option value="9">9º Fundamental</option>
                            <option value="10">1º Médio</option>
                            <option value="11">2º Médio</option>
                            <option value="12">3º Médio</option>   
                        </select>
                    </div>
                    <div class="col-sm-3">
                        <label>Ano da matrícula</label>
                        <select class="form-control" name="anomatricula" id="anomatricula">
                            <option value="{{$ano}}">{{$ano}}</option>
                            <option value="{{$a = $ano+1}}">{{$a = $ano+1}}</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="form-group ">
                <label>Observações de Saúde</label>
                <textarea name="obssaude" id="" cols="10" rows="2" class="form-control" maxlength="255" autocomplete="off"></textarea>
            </div>
            
        </form>

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
                    <select id="" class="custom-select form-control" name="idcras">
                        @foreach($cras as $c)
                            <option value="{{ $c->idcras}}">{{ $c->nomecras }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-sm-3">
                    <label>Renda familiar</label>
                    <select name="rendafamiliar" id="" class="custom-select form-control">
                        <option value="1 a 2 salarios minimo">1 à 2 salários mínimo</option>
                        <option value="2 a 3 salarios minimo">2 à 3 salários mínimo</option>
                        <option value="Mais de 3 salarios minimos">Mais de 3 salarios mínimos</option>
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
            <div class="">
                <div id="table" class="table-editable">
                    
                    <span class="table-add float-right mb-3 mr-2"><a href="#!" class="text-success"><i class="fa fa-plus fa-2x"
                        aria-hidden="true"></i></a></span>
                    <table class="table table-bordered table-responsive-md text-center">
                        <h5 class="text-center font-weight-bold text-uppercase py-6">Membros Familia</h5>
                    
                        <tr>
                            
                            <th class="text-center">Nome</th>
                            <th class="text-center">Data Nascimento</th>
                            <th class="text-center">Local Trabalha</th>
                            <th class="text-center">Escola</th>
                            <th class="text-center">Opções</th>
                        
                        </tr> 
                        <tr class="hide">

                            <td class="pt-3-half"><input id="tdedit" type="text" value="" name="nomemembro[]"/></td>
                            <td class="pt-3-half"><input id="tdedit" type="date" value="" name="nascimentomembro[]"/></td>
                            <td class="pt-3-half"><input id="tdedit" type="text" name="trabmembro[]"/></td>
                            <td> 
                               <select id="tdedit" name="escolamembro[]" id="" class="custom-select" >
                                   @foreach ($escolas as $escola)
                                       <option value="{{ $escola->idescola }}">{{ $escola->nomeescola }}</option>
                                   @endforeach
                                    
                                </select>
                            </td>             
                        </tr>
                       
                    </table>            
                </div>     
           </div>       
        </div>

        <div class="float-right">
            <button type="submit" class="btn btn-success">Avançar</button>
        </div>
      </form>
    </div>
</div>



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
                <p class="text-justify">Nesta tela é realizado o cadastro da criança que está efetuando a matrícula, sendo obrigatório informar o Nome, Data de nascimento e o Sexo. </p>
                <p class="text-justify">Não é necessário informar pontuação nos campos de RG e CPF, somente dígitos.</p>
                <p class="text-justify">Ao clicar no botão “Próximo” sistema salvar os dados e então existem dois possíveis resultados, caso exista vaga disponível  sistema irá solicitar que o novo aluno matriculado seja alocado em uma turma, caso contrário o mesmo irá para a lista de espera.</p>         
            </div>
        </div>
    </div>
</div>

<script src="/js/validaCrianca.js"></script>
<script src="/js/membro_familia.js"></script>
<script src="/js/buscaCep.js"></script>

@stop
