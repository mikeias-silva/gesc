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
                <input name="cep" type="hidden" value="{{ $cep }}"/>
                <input name="bairro" type="hidden" value="{{ $bairro }}"/>
                <input name="logradouro" type="hidden" value="{{ $logradouro }}"/>
                <input name="ncasa" type="hidden" value="{{ $ncasa }}"/>
                <input name="complemento" type="hidden" value="{{ $complemento }}"/>
                
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
                </div>
            </div>

            <div class="form-group ">
                <label>Observações de Saúde</label>
                <textarea name="obssaude" id="" cols="10" rows="2" class="form-control" maxlength="255" autocomplete="off"></textarea>
            </div>
            <div class="float-right">
                <button type="submit" class="btn btn-success">Avançar
                   
                </button>
            </div>
        </form>
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

@stop
