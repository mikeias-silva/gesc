
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="/css/style.css">
   
    <title>Document</title>
</head>
<body>
    
 <!--ABA IDENTIFICAÇÃO -->
 <div class="tab-pane fade show active" id="identificacao" role="tabpanel" aria-labelledby="identificacao-tab">
    
        
        <div class="container">
        <br>
    
        <div >
                <div class="form-group ">
                {{ csrf_field() }}
                <div class="form-group ">
                    <div class="row">
                        <div class="col-sm-7" >
                            <label>Nome<span id="campoobrigatorio"></span></label>
                            <input disabled value="{{ $dadoscrianca->nomecrianca }}" type="text" class="form-control" name="nomecrianca" maxlength="255" autocomplete="off">
                            <span id="msgNomeCrianca"></span>
                        </div>
                            
                        <div class="col-md-3">
                            <label>Nascimento</label>
                            <input disabled value="{{ $dadoscrianca->nascimentocrianca }}" type="date" class="form-control" name="datanascimentocrianca">
                            <span id="msgDataNascimento"></span>
                        </div>
    
                        <div class="col-sm-2">
                            <label>Sexo</label>
                            @if($dadoscrianca->sexocrianca = 'm')
                            <input disabled class="form-control" type="text" value="Masculino"/>
                            @elseif($dadoscrianca->sexocrianca = 'f')
                            <input disabled class="form-control" type="text" value="Feminino"/>
                            @endif
                        </div>
                    </div>
                </div>
                
                <div class="form-group ">
                    <div class="row" >
                        <div class="col-sm-4">
                            <label>RG</label>
                            <input disabled value="{{ $dadoscrianca->rgcrianca }}" type="text" class="form-control" id="rgcrianca" name="rgcrianca" onkeyup="mascara(this, Rg);" maxlength="9" autocomplete="off">
                            <span id="msgRg"></span>
                        </div>
    
                        <div class="col-sm-4">
                            <label>CPF</label>
                            <input disabled value="{{ $dadoscrianca->cpfcrianca }}" type="text" class="form-control" name="cpfcrianca" id="cpfcrianca" maxlength="11" autocomplete="off" onkeyup="mascara(this, Cpf);">
                            <span id="msgCpf"></span>
                        </div>
    
                        <div class="col-sm-4">
                            <label>CEP</label>
                            <input value="{{ $dadoscrianca->cep }}" type="text" class="form-control" name="cep" id="cep" maxlength="8" autocomplete="off" onkeyup="mascara(this, Cep);">
                            <span id="msgCep"></span>
                        </div>
                    </div>
                </div>
    
                <div class="form-group ">
                    <div class="row" >
                        <div class="col-sm-5">
                            <label>Endereço</label>
                            <input value="{{ $dadoscrianca->logradouro }}" type="text" class="form-control" id="logradouro" name="logradouro" maxlength="255" autocomplete="off">
                            <span id="msgEndereco"></span>
                        </div>
    
                        <div class="col-sm-1">
                            <label>Nº</label>
                            <input value="{{ $dadoscrianca->ncasa }}" class="form-control" type="text" name="ncasa"/>
                        </div>
    
                        <div class="col-sm-2">
                            <label>Cidade</label>
                            <input value="Ponta Grossa" disabled class="form-control" type="text" id="cidade"/>
                        </div>
                        <div class="col-sm-4">
                            <label>Bairro</label>
                            <input value="{{ $dadoscrianca->bairro }}" type="text" class="form-control" id="bairro" name="bairro" maxlength="255" autocomplete="off">
                            <span id="msgBairro"></span>
                        </div>
                    </div>
                </div>
                <div class="form-group ">
                        <div class="row" >
                            <div class="col-sm-6">
                                <label>Complemento</label>
                                <input value="{{ $dadoscrianca->complementoendereco }}" type="text" class="form-control" name="complemento" maxlength="255" autocomplete="off">
                            </div>
                            @foreach ($dadosfamilia as $dadofamilia)
                            <div class="col-sm-6">
                                <label>CRAS/CREAS</label>
                                <input type="text" class="form-control" value="{{ $dadofamilia->nomecras }}">    
                            </div>
                            @endforeach
                        </div>
                    </div>
        
                    <div class="form-group " >
                        <div class="row" >
                            <div class="col-sm-6">
                                <label>Público Prioritário</label>
                                
                            </div>
                        </div>
                    </div>
                    
        
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-6">
                                <label>Escola</label>
                                <select name="escola" id="" class="custom-select" >
                                   <option value="">Nenhum</option>
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
                                <select name="serie" id="" class="custom-select"> 
                                    <option value="">...</option>
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
                </div>
        </div>
   
    
    <div class="form">
            <br>
            <h4>Responsável 01</h4>
    
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
                <br>
            <h4>Responsável 02</h4>
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
                            <span class="form-check-label" for="rd-alvenaria">
                                <input type="radio" class="form-check-input" id="rd-alvenaria" name="tipohabitacao" value="alvenaria" checked>Alvenaria
                            </span>
                        </div>
                    </div>
                    <div class="col-sm-1">
                        <div class="form-check">
                            <span class="form-check-label" for="rd-madeira">
                                <input type="radio" class="form-check-input" id="rd-madeira" name="tipohabitacao" value="madeira">Madeira
                            </span>
                        </div>
                    </div>
                    <div class="col-sm-1">
                        <div class="form-check">
                            <span class="form-check-label" for="rd-mista">
                                <input type="radio" class="form-check-input" id="rd-mista" name="tipohabitacao" value="Mista">Mista
                            </span>
                        </div>
                    </div>
                </div>
            </div>
                        
                <!-- checkboxes -->
                <label>Programas Sociais</label>
                <div class="form-inline">
                <div class="form-check col-sm-2">
                    <span class="form-check-label">
                        <input type="checkbox" class="form-check-input" name="arearisco" value="1">Mora em área de risco
                    </span>
                </div>
    
                <div class="form-check col-sm-2">
                    <span class="form-check-label">
                        <input type="checkbox" class="form-check-input" name="bolsafamilia" value="1">Beneficiário do Bolsa Familia
                    </span>
                </div>
    
                <div class="form-check col-sm-2">
                    <span class="form-check-label">
                        <input type="checkbox" class="form-check-input" name="beneficiopc" value="1">Benefício Pessoa Continuada
                    </span>
                </div>
            </div>
        </div>
       
    </div>
</body>
</html>
