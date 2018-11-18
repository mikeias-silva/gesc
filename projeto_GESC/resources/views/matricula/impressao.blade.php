
<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
    
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
      
      <!-- =========== Trecho ABAIXO que nao esta sendo utilizado mais ======= -->
        <!--webService CEP-->
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"
                integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
                crossorigin="anonymous">
        </script>
    <!-- 
        <link rel="profile" href="http://gmpg.org/xfn/11">
        <link rel="pingback" href="http://themes.getbootstrap.com/xmlrpc.php">
        <link rel="apple-touch-icon" sizes="180x180" href="http://themes.getbootstrap.com/wp-content/themes/bootstrap-marketplace/assets/images/fav/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="http://themes.getbootstrap.com/wp-content/themes/bootstrap-marketplace/assets/images/fav/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="http://themes.getbootstrap.com/wp-content/themes/bootstrap-marketplace/assets/images/fav/favicon-16x16.png">
        <link rel="manifest" href="http://themes.getbootstrap.com/wp-content/themes/bootstrap-marketplace/assets/images/fav/manifest.json">
        <link rel="shortcut icon" href="http://themes.getbootstrap.com/wp-content/themes/bootstrap-marketplace/assets/images/fav/favicon.ico">
        <script type="text/javascript" async="" src="https://www.google-analytics.com/analytics.js"></script>
        <script src="http://themes.getbootstrap.com/wp-content/themes/bootstrap-marketplace/assets/javascript/jquery.min.js"></script>
        <script src="http://themes.getbootstrap.com/wp-content/themes/bootstrap-marketplace/assets/javascript/Chart.min.js"></script>
        <script src="http://themes.getbootstrap.com/wp-content/themes/bootstrap-marketplace/assets/javascript/Chart.bundle.min.js"></script>
        <script src="http://themes.getbootstrap.com/wp-content/themes/bootstrap-marketplace/assets/javascript/tether.min.js"></script>
        <script src="http://themes.getbootstrap.com/wp-content/themes/bootstrap-marketplace/assets/javascript/popper.min.js"></script>
        <script src="http://themes.getbootstrap.com/wp-content/themes/bootstrap-marketplace/assets/javascript/bootstrap.min.js"></script>
        <script src="http://themes.getbootstrap.com/wp-content/themes/bootstrap-marketplace/assets/javascript/scripts.js?ver=1516485707"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
       
         --><script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
      
    
       
      <!-- =========== Trecho ACIMA que nao esta sendo utilizado mais ======= -->
       
    
     
       <!--  <script src="{{ asset('js/app.js') }}" defer></script>
     -->
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet"> 
       
        <link rel="stylesheet" href="/css/style.css">
       <!--   <script src="js/Ativo-inativo.js"></script>
    -->
        
        <title>GESC - Gerenciamento de Serviço de Convivência</title>
</head>

</html>
<body id="conteudoimprimir " >
        <div class="float-right">
            <a class="btn btn-toolbar " onclick="myFunction()"><i class="material-icons">
                    print
                </i>
            </a>
            <a href="#" id="btn-imprimir"></a>
        </div>
        <div class="container">
            <h4 class="text-center content text-uppercase" id="titulorematricula">ASSOCIAÇÃO DE PROMOÇÃO À MENINA - APAM</h4>
            <h5 class="text-center content text-uppercase" style="font-weight: bold;">Matrícula {{ $ano }}</h5>
        <br>
        <div>
                <div class="form-group " >
                {{ csrf_field() }}
                <div class="form-group ">
                    <div class="row">
                        <div class="col-sm-7" >
                            <label>Nome</label>
                            <input disabled  value="{{ $dadoscrianca->nomecrianca }}" type="text" class="form-control" name="nomecrianca" maxlength="255" autocomplete="off">
                            <span id="msgNomeCrianca"></span>
                        </div>
                            
                        <div class="col-md-3">
                            <label>Nascimento</label>
                            <input disabled  value="{{ $dadoscrianca->nascimentocrianca }}" type="date" class="form-control" name="datanascimentocrianca">
                            <span id="msgDataNascimento"></span>
                        </div>
    
                        <div class="col-sm-2">
                            <label>Sexo</label>
                            @if($dadoscrianca->sexocrianca = 'm')
                            <input disabled  class="form-control" type="text" value="Masculino"/>
                            @elseif($dadoscrianca->sexocrianca = 'f')
                            <input disabled  class="form-control" type="text" value="Feminino"/>
                            @endif
                        </div>
                    </div>
                </div>
                
                <div class="form-group ">
                    <div class="row" >
                        <div class="col-sm-4">
                            <label>RG</label>
                            <input disabled  value="{{ $dadoscrianca->rgcrianca }}" type="text" class="form-control" id="rgcrianca" name="rgcrianca" onkeyup="mascara(this, Rg);" maxlength="9" autocomplete="off">
                            <span id="msgRg"></span>
                        </div>
    
                        <div class="col-sm-4">
                            <label>CPF</label>
                            <input disabled  value="{{ $dadoscrianca->cpfcrianca }}" type="text" class="form-control" name="cpfcrianca" id="cpfcrianca" maxlength="11" autocomplete="off" onkeyup="mascara(this, Cpf);">
                            <span id="msgCpf"></span>
                        </div>
    
                        <div class="col-sm-4">
                            <label>CEP</label>
                            <input disabled value="{{ $dadoscrianca->cep }}" type="text" class="form-control" name="cep" id="cep" maxlength="8" autocomplete="off" onkeyup="mascara(this, Cep);">
                            <span id="msgCep"></span>
                        </div>
                    </div>
                </div>
    
                <div class="form-group ">
                    <div class="row" >
                        <div class="col-sm-5">
                            <label>Endereço</label>
                            <input disabled value="{{ $dadoscrianca->logradouro }}" type="text" class="form-control" id="logradouro" name="logradouro" maxlength="255" autocomplete="off">
                            <span id="msgEndereco"></span>
                        </div>
    
                        <div class="col-sm-1">
                            <label>Nº</label>
                            <input disabled value="{{ $dadoscrianca->ncasa }}" class="form-control" type="text" name="ncasa"/>
                        </div>
    
                        <div class="col-sm-2">
                            <label>Cidade</label>
                            <input disabled value="Ponta Grossa"  class="form-control" type="text" id="cidade"/>
                        </div>
                        <div class="col-sm-4">
                            <label>Bairro</label>
                            <input disabled value="{{ $dadoscrianca->bairro }}" type="text" class="form-control" id="bairro" name="bairro" maxlength="255" autocomplete="off">
                            <span id="msgBairro"></span>
                        </div>
                    </div>
                </div>
                <div class="form-group ">
                        <div class="row" >
                            <div class="col-sm-6">
                                <label>Complemento</label>
                                <input disabled value="{{ $dadoscrianca->complementoendereco }}" type="text" class="form-control" name="complemento" maxlength="255" autocomplete="off">
                            </div>
                            @foreach ($dadosfamilia as $dadofamilia)
                            <div class="col-sm-6">
                                <label>CRAS/CREAS</label>
                                <select disabled class="form-control" name="idcras" id="" >
                                    <option value="{{ $dadofamilia->idcras }}">{{ $dadofamilia->nomecras }}</option>
                                    @foreach ($cras as $cras)
                                        <option value="{{ $cras->idcras }}">{{ $cras->nomecras }}</option>
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
                                <select disabled class="form-control" name="idpublicoprioritario" id="">
                                        <option value="{{ $dadoscrianca->idpublicoprioritario }}">{{ $dadoscrianca->publicoprioritario }}</option>
                                    @foreach ($pprioritario as $pprioritario)
                                        <option value="{{ $pprioritario->idpublicopriotirario }}">{{ $pprioritario->publicoprioritario }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    
        
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-6">
                                <label>Escola</label>
                                <select disabled name="escola" id="" class="custom-select" >
                                   <option value="">{{ $dadoscrianca->nomeescola }}</option>
                                    @foreach($escola as $e)
                                        <option value="{{ $e->idescola }}">{{ $e->nomeescola }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-3">
                                    <label>Serie Escolar</label>
                                    <select disabled name="serie" id="" class="custom-select"> 
                                        @foreach ($dadosmatricula as $dadosmatricula)
                                        <option value="">{{ $dadosmatricula->serieescolar }} </option>
                                       
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
        
                    <div class="form-group">
                        <div class="row">
                           
                        </div>
                    </div>
        
                    <div class="form-group ">
                        <label>Observações de Saúde</label>
                        <textarea disabled value="{{ $dadoscrianca->obssaude }}" name="obssaude" id="" cols="10" rows="2" class="form-control" maxlength="255" autocomplete="off">{{ $dadoscrianca->obssaude }}</textarea>
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
                        <input disabled value="{{ $responsaveis[0]->nomeresponsavel }}" class="form-control" type="text" name="nomeresp1" maxlength="255" autocomplete="off">
                        <span id="msgNomeResp1"></span>
                    </div>
                    
                    <div class="col-sm-4">
                        <label>Data de Nascimento</label>
                        <input disabled value="{{ $responsaveis[0]->nascimentoresponsavel }}" type="date" class="form-control" name="datanascimentoresp1">
                        <span id="msgDataResp1"></span>
                    </div>
    
                    <div class="col-sm-2">
                        <label>Sexo</label>
                        @if($responsaveis[0]->sexoresponsavel = 'm')
                            <input disabled  class="form-control" type="text" value="Masculino"/>
                            @elseif($responsaveis[0]->sexoresponsavel = 'f')
                            <input disabled  class="form-control" type="text" value="Feminino"/>
                        @endif
                    </div>
                </div>
            </div>
    
            <div class="form-group">
                <div class="row">
                        <div class="col-sm-4">
                        <label>RG</label>
                        <input disabled value="{{ $responsaveis[0]->rgresponsavel }}" type="text" class="form-control" name="rgresp1" autocomplete="off" onkeyup="mascara(this, Rg);" maxlength="9"> 
                        <span id="msgRgResp1"></span>
                    </div>
    
                    <div class="col-sm-4">
                        <label>CPF</label>
                        <input disabled value="{{ $responsaveis[0]->cpfresponsavel }}" type="text" class="form-control" name="cpfresp1" maxlength="11" autocomplete="off" onkeyup="mascara(this, Cpf);">
                        <span id="msgCpfResp1"></span>
                    </div>
    
                    <div class="col-sm-4">
                        <label>Estado Civil</label>
                        <select disabled class="form-control" name="estadocivilresp1" id="">
                            <option value="{{ $responsaveis[0]->estadocivil }}"> {{ $responsaveis[0]->estadocivil }}</option>
                          
                        </select>
                    </div>
                </div>
            </div>
    
            <div class="form-group">
                <div class="row">
                    <div class="col-sm-8">
                        <label>Profissão</label>
                        <input disabled value="{{ $responsaveis[0]->profissao }}" type="text" class="form-control" name="profissaoresp1">
                    </div>
                    
                </div>
            </div>
    
            <div class="form-group">
                <div class="row">
                    <div class="col-sm-8">
                        <label>Local de Trabalho</label>
                        <input disabled value="{{ $responsaveis[0]->localtrabalho }}" type="text" class="form-control" name="trabalhoresp1">
                    </div>
                    <div class="col-sm-4">
                        <label>Escolaridade</label>
                        <select disabled class="form-control" name="escolaridaderesp1" id="">
                            <option value="{{ $responsaveis[0]->escolaridade }}">{{ $responsaveis[0]->escolaridade }} </option>
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
                        <input disabled value="{{ $responsaveis[0]->telefone }}" type="text" class="form-control" name="tel1resp1" id="tel1resp1"  onkeyup="mascara(this, Telefone);" maxlength="11">
                        <span id="msgTel1Resp1"></span>
                    </div>
                    <div class="col-sm-4">
                        <label>Telefone 2</label>
                        <input disabled value="{{ $responsaveis[0]->telefone2 }}" type="text" class="form-control" name="tel2resp1" id="tel2resp1" onkeyup="mascara(this, Telefone);" maxlength="11">
                        <span id="msgTel2Resp1"></span>
                    </div>
                </div>
            </div>
    
            <label>Observações</label>
            <textarea disabled name="obsresp1" id="" cols="10" rows="2" class="form-control">{{ $responsaveis[0]->outrasobs }}</textarea>
    
            
            
            @if (!empty($responsaveis[1]->nomeresponsavel))
            <div class="container" id="meio">
    
                </div>
            <br>
            <h4>Responsável 02</h4>
            <div class="form-group">
                <div class="row">
                    <div class="col-sm-6">
                        <label>Nome:</label>
                        <input disabled  value="{{ $responsaveis[1]->nomeresponsavel }}" class="form-control" type="text" name="nomeresp2" id="nomeresp2" maxlength="255" autocomplete="off">
                        <span id="msgNomeResp2"></span>
                    </div>
    
                    <div class="col-sm-4">
                        <label>Data de Nascimento</label>
                        <input disabled  value="{{ $responsaveis[1]->nascimentoresponsavel }}" type="date" class="form-control" name="datanascimentoresp2">
                        <span id="msgDataResp2"></span>
                    </div>
    
                    <div class="col-sm-2">
                            <label>Sexo</label>
                            <input disabled  value="{{ $responsaveis[1]->sexoresponsavel }}" type="text" class="form-control" name="" id="">
                    </div>
                </div>
            </div>
    
            <div class="form-group">
                <div class="row">
                    <div class="col-sm-4">
                        <label>RG</label>
                        <input disabled  value="{{ $responsaveis[1]->rgresponsavel }}" type="text" class="form-control" name="rgresp2" id="rgresp2" autocomplete="off" onkeyup="mascara(this, Rg);" maxlength="9">
                        <span id="msgRgResp2"></span>
                    </div>
    
                    <div class="col-sm-4">
                        <label>CPF</label>
                        <input disabled  value="{{ $responsaveis[1]->cpfresponsavel }}" type="text" class="form-control" name="cpfresp2" id="cpfresp2" maxlength="11" autocomplete="off" onkeyup="mascara(this, Cpf);">
                        <span id="msgCpfResp2"></span>
                    </div>
                    
                    <div class="col-sm-4">
                        <label>Estado Civil</label>
                        <select disabled class="form-control" id="" name="estadocivilresp2">
                            <option value="{{ $responsaveis[1]->estadocivil }}">{{ $responsaveis[1]->estadocivil }} </option>
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
                        <input disabled value="{{ $responsaveis[1]->profissao }}" type="text" class="form-control" name="profissaoresp2">
                    </div>
                   
                </div>
            </div>
    
            <div class="form-group">
                <div class="row">
                    <div class="col-sm-8">
                        <label>Local de Trabalho</label>
                        <input disabled value="{{ $responsaveis[1]->localtrabalho }}" type="text" class="form-control" name="trabalhoresp2">
                    </div>
                    <div class="col-sm-4">
                        <label>Escolaridade</label>
                        <select disabled class="form-control" id="" name="escolaridaderesp2">
                            <option value="{{ $responsaveis[1]->escolaridade }}"> {{ $responsaveis[1]->escolaridade }}</option>
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
                        <input disabled value="{{  $responsaveis[1]->telefone }}" type="tel" class="form-control" name="tel1resp2" id="tel1resp2" onkeyup="mascara(this, Telefone);" maxlength="11">
                        <span id="msgTel1Resp2"></span>
                    </div>
                    <div class="col-sm-4">
                        <label>Telefone 2</label>
                        <input disabled value="{{  $responsaveis[1]->telefone2 }}" type="tel" class="form-control" name="tel2resp2" id="tel2resp2" onkeyup="mascara(this, Telefone);" maxlength="11">
                        <span id="msgTel2Resp2"></span>
                    </div>
                </div>
            </div>
            
            <div>
                <label>Observações</label>
                <textarea disabled name="obsresp2" id="" cols="10" rows="2" class="form-control">{{  $responsaveis[1]->outrasobs }}</textarea>
            </div>
            </div>
            <br>
            
            
            @endif
            </br>
            <div class="form-group">
                <div class="row">
                    <div class="col-sm-8">
                        <label>Número do NIS</label>
                        <input disabled value="{{ $dadosfamilia[0]->numnis }}" type="text" class="form-control" name="numnis">
                        <span id="msgNumNis"></span>
                    </div>
                    <div class="col-sm-4">
                        <label>Moradia</label>
                        <select disabled class="form-control" name="moradia" id="">
                            <option value="{{ $dadosfamilia[0]->moradia }}"> {{ $dadosfamilia[0]->moradia }}</option>
                            <option value="1">Alugada</option>
                            <option value="2">Cedida</option>
                            <option value="3">Própria</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- radio buttons -->
            <div class="form-group">
                <label>Tipo Habitação</label>
                <div class="row">
                    <div class="col-sm-1">
                        <div class="form-check">
                            <label class="form-check-label" for="rd-alvenaria" >
                                @if ($dadosfamilia[0]->tipohabitacao == 'Alvenaria')
                                    
                                    <input disabled type="radio" class="form-check-input" id="rd-alvenaria" name="tipohabitacao" value="alvenaria" checked>Alvenaria
                
                                    
                                @else
                                    <input disabled type="radio" class="form-check-input" id="rd-alvenaria" name="tipohabitacao" value="alvenaria">Alvenaria
                                   
                                @endif
                            </label>
                        </div>
                    </div>
                    <div class="col-sm-1">
                        <div class="form-check">
                            <label class="form-check-label" for="rd-madeira">
                                @if ($dadosfamilia[0]->tipohabitacao == 'Madeira')
                                    <input disabled type="radio" class="form-check-input" id="rd-madeira" name="tipohabitacao" value="madeira" checked>Madeira
                                
                                @else
                                    <input disabled type="radio" class="form-check-input" id="rd-madeira" name="tipohabitacao" value="madeira">Madeira
                            
                                @endif
                            </label>
                        </div>
                    </div>
                    <div class="col-sm-1">
                        <div class="form-check">
                            <label class="form-check-label" for="rd-mista">
                                @if ($dadosfamilia[0]->tipohabitacao == 'Mista')
                                    
                                    <input disabled type="radio" class="form-check-input" id="rd-mista" name="tipohabitacao" value="Mista" checked>Mista
                                @else
                                    
                                    <input disabled type="radio" class="form-check-input" id="rd-mista" name="tipohabitacao" value="Mista">Mista
                                @endif
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                    <label>Renda familiar</label>
                    <select name="rendafamiliar" id="" class="custom-select form-control">
                        <option disabled value={{ $familia->rendapercapta }}>{{ $familia->rendapercapta }}</option>
                    </select>
                </div>
                  
                        
                <!-- checkboxes -->
                <label>Programas Sociais</label>
                <div class="form-inline">
                <div class="form-check col-sm-2">
                    <label class="form-check-label">
                        @if ($dadosfamilia[0]->arearisco == '1')
                            <input disabled type="checkbox" class="form-check-input" name="arearisco" value="1" checked>Mora em área de risco
                        @else
                            <input disabled type="checkbox" class="form-check-input" name="arearisco" value="1" >Mora em área de risco
                        @endif
                        
                    </label>
                </div>
    
                <div class="form-check col-sm-2">
                    <label class="form-check-label">
                        @if ($dadosfamilia[0]->bolsafamilia == '1')
                            <input disabled type="checkbox" class="form-check-input" name="bolsafamilia" value="1" checked>Beneficiário do Bolsa Familia

                        @else
                            <input disabled type="checkbox" class="form-check-input" name="bolsafamilia" value="1">Beneficiário do Bolsa Familia

                        @endif
                    </label>
                </div>
    
                <div class="form-check col-sm-2">
                    <label class="form-check-label">
                        @if ($dadosfamilia[0]->beneficiopc == '1')
                           <input disabled type="checkbox" class="form-check-input" name="beneficiopc" value="1" checked>Benefício Pessoa Continuada

                        @else
                            <input disabled type="checkbox" class="form-check-input" name="beneficiopc" value="1">Benefício Pessoa Continuada

                        @endif
                    </label>
                </div>
            </div>
            
           @if (!empty($membros))
               
           <div class="">
               <div id="table" class="table-editable">
{{--                     
                   <span class="table-add float-right mb-3 mr-2"><a href="#!" class="text-success"><i class="fa fa-plus fa-2x"
                       aria-hidden="true"></i></a></span> --}}
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
                           @foreach ($membros as $membro)
                           <input disabled name="idmembro" type="hidden" value={{ $membro->idmembro }}>
                           <td class="pt-3-half"><input disabled id="tdedit" type="text" value={{ $membro->nomemembro }} name="nomemembro[]"/></td>
                           <td class="pt-3-half"><input disabled id="tdedit" type="date" value={{ $membro->datanascimento }} name="nascimentomembro[]"/></td>
                           <td class="pt-3-half"><input disabled id="tdedit" type="text" value={{ $membro->localtrabalho }} name="trabmembro[]"/></td>
                           <td> 
                              <select id="tdedit" name="escolamembro[]" id="" class="custom-select" >
                               
                                  @foreach ($escola as $escola)
                                      <option disabled value="{{ $escola->idescola }}">{{ $escola->nomeescola }}</option>
                                  @endforeach
                                   
                               </select>
                           </td>        
                           @endforeach
                           {{-- <td class="pt-3-half"><input id="tdedit" type="text" value="" name="nomemembro[]"/></td>
                           <td class="pt-3-half"><input id="tdedit" type="date" value="" name="nascimentomembro[]"/></td>
                           <td class="pt-3-half"><input id="tdedit" type="text" name="trabmembro[]"/></td>
                           <td> 
                              <select id="tdedit" name="escolamembro[]" id="" class="custom-select" >
                                  @foreach ($escola as $escola)
                                      <option value="{{ $escola->idescola }}">{{ $escola->nomeescola }}</option>
                                  @endforeach
                                   
                               </select>
                           </td>              --}}
                       </tr>
                   </table>            
               </div>     
          </div>       

          @endif
           <div class="row">
                <div class="float-left"  style="margin: 40px 0px 40px 0px">
                    <div class="col-md-3">
                        <h3 >Responsável:</h3>
                    </div>
                        {{-- <div id="meio" class="col-sm-2"></div> --}}
                </div>
            </div>

           
        </div>
       
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
                <h5 class="text-left">Teste</h5>
                <p class="text-justify">O que temos que ter sempre em mente é que a necessidade de renovação processual nos obriga à análise das direções preferenciais no sentido do progresso. Podemos já vislumbrar o modo pelo qual a revolução dos costumes faz parte de um processo de gerenciamento das diretrizes de desenvolvimento para o futuro. Assim mesmo, 
                a hegemonia do ambiente político aponta para a melhoria das posturas dos órgãos dirigentes com relação às suas atribuições. </p>
                <p class="text-justify">No entanto, não podemos esquecer que a estrutura atual da organização cumpre um papel essencial na formulação do sistema de participação geral. Do mesmo modo, o novo modelo estrutural aqui preconizado apresenta tendências no sentido de aprovar a manutenção das novas proposições. Pensando mais a longo prazo, a percepção das dificuldades oferece uma interessante oportunidade para verificação do impacto na agilidade decisória. Todas estas questões, devidamente ponderadas, 
                levantam dúvidas sobre se a contínua expansão de nossa atividade facilita a criação das diversas correntes de <i class="material-icons">edit</i> pensamento. </p>
                            
            </div>
        </div>
    </div>
</div>

<script src="js/impressao.js"></script>

<script>
    function myFunction(){
         window.print();
        }
</script>
</html>
