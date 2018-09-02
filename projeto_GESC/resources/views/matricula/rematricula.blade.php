
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
                            <input type="date" class="form-control" name="datanascimentocrianca">
                            <span id="msgDataNascimento"></span>
                        </div>
    
                        <div class="col-sm-2">
                            <label>Sexo</label>
                            <select name="sexocrianca" id="" class="custom-select" value="">
                                <option value="M">Masculino</option>
                                <option value="F">Feminino</option>
                            </select>
                        </div>
                    </div>
                </div>
                
                <div class="form-group ">
                    <div class="row" >
                        <div class="col-sm-4">
                            <label>RG</label>
                            <input type="text" class="form-control" id="rgcrianca" name="rgcrianca" onkeyup="mascara(this, Rg);" maxlength="9" autocomplete="off">
                            <span id="msgRg"></span>
                        </div>
    
                        <div class="col-sm-4">
                            <label>CPF</label>
                            <input type="text" class="form-control" name="cpfcrianca" id="cpfcrianca" maxlength="11" autocomplete="off" onkeyup="mascara(this, Cpf);">
                            <span id="msgCpf"></span>
                        </div>
    
                        <div class="col-sm-4">
                            <label>CEP</label>
                            <input type="text" class="form-control" name="cep" id="cep" maxlength="8" autocomplete="off" onkeyup="mascara(this, Cep);">
                            <span id="msgCep"></span>
                        </div>
                    </div>
                </div>
    
                <div class="form-group ">
                    <div class="row" >
                        <div class="col-sm-5">
                            <label>Endereço</label>
                            <input type="text" class="form-control" id="logradouro" name="logradouro" maxlength="255" autocomplete="off">
                            <span id="msgEndereco"></span>
                        </div>
    
                        <div class="col-sm-1">
                            <label>Nº</label>
                            <input class="form-control" type="text" name="ncasa"/>
                        </div>
    
                        <div class="col-sm-2">
                            <label>Cidade</label>
                            <input disabled class="form-control" type="text" id="cidade"/>
                        </div>
                        <div class="col-sm-4">
                            <label>Bairro</label>
                            <input type="text" class="form-control" id="bairro" name="bairro" maxlength="255" autocomplete="off">
                            <span id="msgBairro"></span>
                        </div>
                    </div>
                </div>
                <div class="form-group ">
                        <div class="row" >
                            <div class="col-sm-6">
                                <label>Complemento</label>
                                <input type="text" class="form-control" name="complemento" maxlength="255" autocomplete="off">
                            </div>
        
                            <div class="col-sm-6">
                                <label>CRAS/CREAS</label>
                                <select name="cras" id="" class="custom-select" name="cras">
                                    <option value="">Nenhum</option>
                                    @foreach($cras as $c)
                                        <option value="{{ $c->idcras}}">{{ $c->nomecras }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
        
                    <div class="form-group " >
                        <div class="row" >
                            <div class="col-sm-6">
                                <label>Público Prioritário</label>
                                <select name="pprioritario" id="" class="custom-select">
                                    <option value="">Nenhum</option>
                                    @foreach($pprioritario as $p)
                                        <option value="{{ $p->idpublicoprioritario }}">{{ $p->publicoprioritario }}</option>
                                    @endforeach
                                </select>
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
    </div>
    
            
</body>
</html>
