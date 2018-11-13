
@extends('layout.principal')
@section('conteudo')
<body id="conteudoimprimir " >
        
        <div class="container">
            <h4 class="text-center content text-uppercase" id="titulorematricula">ASSOCIAÇÃO DE PROMOÇÃO À MENINA - APAM</h4>
            <h5 class="text-center content text-uppercase" style="font-weight: bold;">Matrícula {{ $ano-1 }}</h5>
        <br>
        <form action="confirmarEdit" method="post">
           <!-- <input name="idmatricula" type="text" value="{{ $idmatricula }}"> -->
               <!-- {{ csrf_token() }} -->
            {{ csrf_field() }} 
           <!--  <input type="hidden" name="_token" value="{{ csrf_token() }}">-->
            <input name="idcrianca" type="hidden" value="{{ $dadoscrianca->idcrianca }}">
            <input name="idpessoacrianca" type="hidden" value="{{  $dadoscrianca->idpessoa}}">
            <input name="idresponsavel1" type="hidden" value="{{  $responsaveis[0]->idresponsavel}}">
            <input name="idpessoaresponsavel1" type="hidden" value="{{  $responsaveis[0]->idpessoa}}">
            <input name="idfamilia" type="hidden" value="{{ $dadosfamilia[0]->idfamilia }}">
            
        <div>
                <div class="form-group " >
               
                <div class="form-group ">
                    <div class="row">
                        <div class="col-sm-7" >
                            <label>Nome</label>
                            <input  value="{{ $dadoscrianca->nomecrianca }}" type="text" class="form-control" name="nomecrianca" maxlength="255" autocomplete="off">
                            <span id="msgNomeCrianca"></span>
                        </div>
                            
                        <div class="col-md-3">
                            <label>Nascimento</label>
                            <input  value="{{ $dadoscrianca->nascimentocrianca }}" type="date" class="form-control" name="datanascimentocrianca">
                            <span id="msgDataNascimento"></span>
                        </div>
    
                        <div class="col-sm-2">
                            <label>Sexo</label>
                           <select class="form-control" name="sexocrianca" id="">

                                <option value="{{ $dadoscrianca->sexocrianca }}">
                                    @if ($dadoscrianca->sexocrianca == 'M')
                                        Masculino
                                   @else
                                       Feminino
                                   @endif
                                </option>

                                @if ($dadoscrianca->sexocrianca == 'M')
                                     <option value="F">Feminino</option>
                                @else
                                    <option value='M'>Masculino</option>
                                @endif
                                
                           </select>
                        </div>
                    </div>
                </div>
                
                <div class="form-group ">
                    <div class="row" >
                        <div class="col-sm-4">
                            <label>RG</label>
                            <input  value="{{ $dadoscrianca->rgcrianca }}" type="text" class="form-control" id="rgcrianca" name="rgcrianca" onkeyup="mascara(this, Rg);" maxlength="9" autocomplete="off">
                            <span id="msgRg"></span>
                        </div>
    
                        <div class="col-sm-4">
                            <label>CPF</label>
                            <input  value="{{ $dadoscrianca->cpfcrianca }}" type="text" class="form-control" name="cpfcrianca" id="cpfcrianca" maxlength="11" autocomplete="off" onkeyup="mascara(this, Cpf);">
                            <span id="msgCpf"></span>
                        </div>
    
                        <div class="col-sm-4">
                            <label>CEP</label>
                            <input value="{{ $responsaveis[0]->cep }}" type="text" class="form-control" name="cep" id="cep" maxlength="8" autocomplete="off" onkeyup="mascara(this, Cep);">
                            <span id="msgCep"></span>
                        </div>
                    </div>
                </div>
    
                <div class="form-group ">
                    <div class="row" >
                        <div class="col-sm-5">
                            <label>Endereço</label>
                            <input value="{{ $responsaveis[0]->logradouro }}" type="text" class="form-control" id="logradouro" name="logradouro" maxlength="255" autocomplete="off">
                            <span id="msgEndereco"></span>
                        </div>
    
                        <div class="col-sm-1">
                            <label>Nº</label>
                            <input value="{{ $responsaveis[0]->ncasa }}" class="form-control" type="text" name="ncasa"/>
                        </div>
    
                        
                        <div class="col-sm-4">
                            <label>Bairro</label>
                            <input value="{{ $responsaveis[0]->bairro }}" type="text" class="form-control" id="bairro" name="bairro" maxlength="255" autocomplete="off">
                            <span id="msgBairro"></span>
                        </div>
                    </div>
                </div>
                <div class="form-group ">
                        <div class="row" >
                            <div class="col-sm-6">
                                <label>Complemento</label>
                                <input value="{{ $responsaveis[0]->complementoendereco }}" type="text" class="form-control" name="complemento" maxlength="255" autocomplete="off">
                            </div>
                            @foreach ($dadosfamilia as $dadofamilia)
                            <div class="col-sm-6">
                                <label>CRAS/CREAS</label>
                                <select class="form-control" name="idcras" id="" >
                                   
                                    @foreach ($cras as $cras)
                                        @if($cras->idcras==$dadosfamilia[0]->idcras)
                                            <option value="{{ $cras->idcras }}" selected='selected'>{{ $cras->nomecras }}</option>
                                        @else 
                                            <option value="{{ $cras->idcras }}">{{ $cras->nomecras }}</option>
                                        @endif    
                                    @endforeach
                                </select>
                            </div>
                            @endforeach
                        </div>
                    </div>
        
                    <div class="form-group " >
                        <div class="row" >
                            <div class="col-sm-6">
                                <label>Público Prioritário</label>
                                <select class="form-control" name="idpublicoprioritario" id="">
                                    @foreach ($pprioritario as $pprioritario)
                                        @if($pprioritario->idpublicoprioritario==$dadoscrianca->idpublicoprioritario)
                                            <option value="{{ $pprioritario->idpublicoprioritario }}" selected='selected'>{{ $pprioritario->publicoprioritario }}</option>
                                        @else 
                                            <option value="{{ $pprioritario->idpublicoprioritario }}">{{ $pprioritario->publicoprioritario }}</option>
                                        @endif 
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    
        
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-6">
                                <label>Escola</label>
                                <select name="idescola" id="" class="custom-select form-control" >
                                   <option value="{{ $dadoscrianca->idescola }}">{{ $dadoscrianca->nomeescola }} </option>
                                    @foreach($escola as $e)
                                        <option value="{{ $e->idescola }}">{{ $e->nomeescola }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
        
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-3">
                                <label>Serie Escolar</label>
                                <select name="serie" id="" class="custom-select form-control"> 
                                    @foreach ($dadosmatricula as $dadosmatricula)
                                    <option value="{{ $dadosmatricula->serieescolar }}">{{ $dadosmatricula->serieescolar }} </option>
                                   
                                    @endforeach
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
                        <textarea value="{{ $dadoscrianca->obssaude }}" name="obssaude" id="" cols="10" rows="2" class="form-control" maxlength="255" autocomplete="off">{{ $dadoscrianca->obssaude }}</textarea>
                    </div>
                </div>
        </div>
   
    
    <div class="form">
            <br>
            <h4>Responsável 01 
                <a href="listagemResponsaveis_{{ $dadoscrianca->idcrianca }}_{{$responsaveis[0]->idresponsavel}}">
                        <i class="material-icons" data-toggle="tooltip" data-placement="right" title="Trocar responsável">sync</i>
                </a>
            </h4>
    
            <div class="form-group">
                <div class="row">
                    <div class="col-sm-6">
                        <label>Nome</label>
                        <input value="{{ $responsaveis[0]->nomeresponsavel }}" class="form-control" type="text" name="nomeresp1" maxlength="255" autocomplete="off">
                        <span id="msgNomeResp1"></span>
                    </div>
                    
                    <div class="col-sm-4">
                        <label>Data de Nascimento</label>
                        <input value="{{ $responsaveis[0]->nascimentoresponsavel }}" type="date" class="form-control" name="datanascimentoresp1">
                        <span id="msgDataResp1"></span>
                    </div>
    
                    <div class="col-sm-2">
                        <label>Sexo</label>
                        <select class="form-control" name="sexoresponsavel1" id="">

                            <option value="{{ $responsaveis[0]->sexoresponsavel }}">
                                @if ($responsaveis[0]->sexoresponsavel == 'M')
                                    Masculino
                                @else
                                    Feminino
                                @endif
                            </option>
                            
                            @if ($responsaveis[0]->sexoresponsavel == 'M')
                                    <option value="F">Feminino</option>
                            @else
                                <option value='M'>Masculino</option>
                            @endif
                            
                        </select>
                    </div>
                </div>
            </div>
    
            <div class="form-group">
                <div class="row">
                        <div class="col-sm-4">
                        <label>RG</label>
                        <input value="{{ $responsaveis[0]->rgresponsavel }}" type="text" class="form-control" name="rgresp1" autocomplete="off" onkeyup="mascara(this, Rg);" maxlength="9"> 
                        <span id="msgRgResp1"></span>
                    </div>
    
                    <div class="col-sm-4">
                        <label>CPF</label>
                        <input value="{{ $responsaveis[0]->cpfresponsavel }}" type="text" class="form-control" name="cpfresp1" maxlength="11" autocomplete="off" onkeyup="mascara(this, Cpf);">
                        <span id="msgCpfResp1"></span>
                    </div>
    
                    <div class="col-sm-4">
                        <label>Estado Civil</label>
                        <select class="form-control" name="estadocivilresp1" id="">
                            <option value="{{ $responsaveis[0]->estadocivil }}">{{ $responsaveis[0]->estadocivil }}</option>
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
                        <input value="{{ $responsaveis[0]->profissao }}" type="text" class="form-control" name="profissaoresp1">
                    </div>
                    
                </div>
            </div>
    
            <div class="form-group">
                <div class="row">
                    <div class="col-sm-8">
                        <label>Local de Trabalho</label>
                        <input value="{{ $responsaveis[0]->localtrabalho }}" type="text" class="form-control" name="trabalhoresp1">
                    </div>
                    <div class="col-sm-4">
                        <label>Escolaridade</label>
                        <select class="form-control" name="escolaridaderesp1" id="">
                            <option value="{{ $responsaveis[0]->escolaridade }}">{{ $responsaveis[0]->escolaridade }} atual</option>
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
                        <input value="{{ $responsaveis[0]->telefone }}" type="text" class="form-control" name="tel1resp1" id="tel1resp1"  onkeyup="mascara(this, Telefone);" maxlength="11">
                        <span id="msgTel1Resp1"></span>
                    </div>
                    <div class="col-sm-4">
                        <label>Telefone 2</label>
                        <input value="{{ $responsaveis[0]->telefone2 }}" type="text" class="form-control" name="tel2resp1" id="tel2resp1" onkeyup="mascara(this, Telefone);" maxlength="11">
                        <span id="msgTel2Resp1"></span>
                    </div>
                </div>
            </div>
    
            <label>Observações</label>
            <textarea name="obsresp1" id="" cols="10" rows="2" class="form-control">{{ $responsaveis[0]->outrasobs }}</textarea>
    
            
            
            @if (!empty($responsaveis[1]->nomeresponsavel))
            <input name="idresponsavel2" type="hidden" value="{{  $responsaveis[1]->idresponsavel}}">
            <input name="idpessoaresponsavel2" type="hidden" value="{{  $responsaveis[1]->idpessoa}}">
            <div class="container" id="meio">
    
                </div>
            <br>
            <h4>Responsável 02
                <a href="/listagemResponsaveis/{{ $dadoscrianca->idcrianca }}/{{$responsaveis[0]->idresponsavel}}">
                        <i class="material-icons" data-toggle="tooltip" data-placement="right" title="Trocar responsável">sync</i>
                </a>
            </h4>
            <div class="form-group">
                <div class="row">
                    <div class="col-sm-6">
                        <label>Nome:</label>
                        <input  value="{{ $responsaveis[1]->nomeresponsavel }}" class="form-control" type="text" name="nomeresp2" id="nomeresp2" maxlength="255" autocomplete="off">
                        <span id="msgNomeResp2"></span>
                    </div>
    
                    <div class="col-sm-4">
                        <label>Data de Nascimento</label>
                        <input  value="{{ $responsaveis[1]->nascimentoresponsavel }}" type="date" class="form-control" name="datanascimentoresp2">
                        <span id="msgDataResp2"></span>
                    </div>
    
                    <div class="col-sm-2">
                            <label>Sexo</label>
                            <select class="form-control" name="sexoresponsavel2" id="">

                                <option value="{{ $responsaveis[1]->sexoresponsavel }}">
                                    @if ($responsaveis[1]->sexoresponsavel == 'M')
                                        Masculino
                                    @else
                                        Feminino
                                    @endif
                                </option>
                                
                                @if ($responsaveis[1]->sexoresponsavel == 'M')
                                        <option value="F">Feminino</option>
                                @else
                                    <option value='M'>Masculino</option>
                                @endif
                                
                            </select>
                    </div>
                </div>
            </div>
    
            <div class="form-group">
                <div class="row">
                    <div class="col-sm-4">
                        <label>RG</label>
                        <input  value="{{ $responsaveis[1]->rgresponsavel }}" type="text" class="form-control" name="rgresp2" id="rgresp2" autocomplete="off" onkeyup="mascara(this, Rg);" maxlength="9">
                        <span id="msgRgResp2"></span>
                    </div>
    
                    <div class="col-sm-4">
                        <label>CPF</label>
                        <input  value="{{ $responsaveis[1]->cpfresponsavel }}" type="text" class="form-control" name="cpfresp2" id="cpfresp2" maxlength="11" autocomplete="off" onkeyup="mascara(this, Cpf);">
                        <span id="msgCpfResp2"></span>
                    </div>
                    
                    <div class="col-sm-4">
                        <label>Estado Civil</label>
                        <select class="form-control" id="" name="estadocivilresp2">
                            <option value="{{ $responsaveis[1]->estadocivil }}">{{ $responsaveis[1]->estadocivil }} atual</option>
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
                        <input value="{{ $responsaveis[1]->profissao }}" type="text" class="form-control" name="profissaoresp2">
                    </div>
                   
                </div>
            </div>
    
            <div class="form-group">
                <div class="row">
                    <div class="col-sm-8">
                        <label>Local de Trabalho</label>
                        <input value="{{ $responsaveis[1]->localtrabalho }}" type="text" class="form-control" name="trabalhoresp2">
                    </div>
                    <div class="col-sm-4">
                        <label>Escolaridade</label>
                        <select class="form-control" id="" name="escolaridaderesp2">
                            <option value="{{ $responsaveis[1]->escolaridade }}">atual {{ $responsaveis[1]->escolaridade }}</option>
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
                        <input value="{{  $responsaveis[1]->telefone }}" type="tel" class="form-control" name="tel1resp2" id="tel1resp2" onkeyup="mascara(this, Telefone);" maxlength="11">
                        <span id="msgTel1Resp2"></span>
                    </div>
                    <div class="col-sm-4">
                        <label>Telefone 2</label>
                        <input value="{{  $responsaveis[1]->telefone2 }}" type="tel" class="form-control" name="tel2resp2" id="tel2resp2" onkeyup="mascara(this, Telefone);" maxlength="11">
                        <span id="msgTel2Resp2"></span>
                    </div>
                </div>
            </div>
            
            <div>
                <label>Observações</label>
                <textarea name="obsresp2" id="" cols="10" rows="2" class="form-control">{{  $responsaveis[1]->outrasobs }}</textarea>
            </div>
            </div>
            <br>
            
            @endif
            <br>
            <div class="form-group">
                <div class="row">
                    <div class="col-sm-8">
                        <label>Número do NIS</label>
                        <input value="{{ $dadosfamilia[0]->numnis }}" type="text" class="form-control" name="numnis">
                        <span id="msgNumNis"></span>
                    </div>
                    <div class="col-sm-4">
                        <label>Moradia</label>
                        <select class="form-control" name="moradia" id="">
                            <option value="{{ $dadosfamilia[0]->moradia }}">{{ $dadosfamilia[0]->moradia }}</option>
                            @if( $dadosfamilia[0]->moradia =='Alugada')
                                <option value="1" selected='selected'>Alugada</option>
                            @else
                                <option value="1">Alugada</option>
                            @endif

                            @if( $dadosfamilia[0]->moradia =='Cedida')
                                <option value="2" selected='selected'>Cedida</option>
                            @else
                                <option value="2">Cedida</option>
                            @endif

                            @if($dadosfamilia[0]->moradia =='Propria')
                                <option value="3" selected='selected'>Própria</option>
                            @else
                                <option value="3">Própria</option>
                            @endif
                            
                            
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
                            <label class="form-check-label" for="rd-alvenaria" >
                                @if ($dadosfamilia[0]->tipohabitacao == 'Alvenaria')
                                    
                                    <input type="radio" class="form-check-input" id="rd-alvenaria" name="tipohabitacao" value="alvenaria" checked>Alvenaria
                
                                    
                                @else
                                    <input type="radio" class="form-check-input" id="rd-alvenaria" name="tipohabitacao" value="alvenaria">Alvenaria
                                   
                                @endif
                            </label>
                        </div>
                    </div>
                    <div class="col-sm-1">
                        <div class="form-check">
                            <label class="form-check-label" for="rd-madeira">
                                @if ($dadosfamilia[0]->tipohabitacao == 'Madeira')
                                    <input type="radio" class="form-check-input" id="rd-madeira" name="tipohabitacao" value="madeira" checked>Madeira
                                
                                @else
                                    <input type="radio" class="form-check-input" id="rd-madeira" name="tipohabitacao" value="madeira">Madeira
                            
                                @endif
                            </label>
                        </div>
                    </div>
                    <div class="col-sm-1">
                        <div class="form-check">
                            <label class="form-check-label" for="rd-mista">
                                @if ($dadosfamilia[0]->tipohabitacao == 'Mista')
                                    
                                    <input type="radio" class="form-check-input" id="rd-mista" name="tipohabitacao" value="Mista" checked>Mista
                                @else
                                    
                                    <input type="radio" class="form-check-input" id="rd-mista" name="tipohabitacao" value="Mista">Mista
                                @endif
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
                        @if ($dadosfamilia[0]->arearisco == '1')
                            <input type="checkbox" class="form-check-input" name="arearisco" value="1" checked>Mora em área de risco
                        @else
                            <input type="checkbox" class="form-check-input" name="arearisco" value="1" >Mora em área de risco
                        @endif
                        
                    </label>
                </div>
    
                <div class="form-check col-sm-2">
                    <label class="form-check-label">
                        @if ($dadosfamilia[0]->bolsafamilia == '1')
                            <input type="checkbox" class="form-check-input" name="bolsafamilia" value="1" checked>Beneficiário do Bolsa Familia

                        @else
                            <input type="checkbox" class="form-check-input" name="bolsafamilia" value="1">Beneficiário do Bolsa Familia

                        @endif
                    </label>
                </div>
    
                <div class="form-check col-sm-2">
                    <label class="form-check-label">
                        @if ($dadosfamilia[0]->beneficiopc == '1')
                           <input type="checkbox" class="form-check-input" name="beneficiopc" value="1" checked>Benefício Pessoa Continuada

                        @else
                            <input type="checkbox" class="form-check-input" name="beneficiopc" value="1">Benefício Pessoa Continuada

                        @endif
                    </label>
                </div>
            </div>
            
           
         

            <div class="float-right">

                <a class="btn btn-secondary" href="{{"listagemMatriculas"}}">
                    Cancelar
                </a>
                <button type="submit" class="btn btn-primary">Alterar</button>
                
            </div>
        </div>
    </form>
        <br>
    
</body>

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
                <p class="text-justify">Nesta tela é possível atualizar todos os dados relacionados e uma matrícula, sendo eles dados da criança, responsáveis e sociais.</p>
                <p class="text-justify">A lista de membros da família é dinâmica, ou seja, é possível adicionar novos espaços para o cadastro dos mesmos, permitindo assim a inclusão de quantos membros for desejado. Também é permitir remover membros da família. </p>
                <p class="text-justify">Não é necessário informar pontuação nos campos de RG, CPF e Telefone, somente dígitos. </p>
                            
            </div>
        </div>
    </div>
</div>

<script src="/js/editMatricula.js"></script>

<script>
    addEventListener("keydown", function(event) {
        if (event.keyCode == 112){
            event.preventDefault();
            $("#help").modal("show");  
        }
    });

    function myFunction(){
        var conteudo = document.getElementById('conteudoimprimir').innerHTML,
        tela_impressao = window.open('about:blank');

        document.body.innerHTML = 
          "<html><head><title></title></head><body>" + 
          conteudo + "</body>";
        tela_impressao.document.write(conteudo);

        

        

         tela_impressao.window.print();
         tela_impressao.window.close();
    }
</script>
@stop
