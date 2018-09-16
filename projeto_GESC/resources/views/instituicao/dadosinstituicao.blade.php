@extends('layout.principal') 
@section('conteudo')
<h1 class="text">Dados da Instituição </h1>
<div class="container" id="meio"> </div>

    @if(count($instituicao)==0)
    <form class="form" action="/instituicao/edita" method="POST"  
        onsubmit="return validarInstituicao(instituicao.nomeinstituicao, instituicao.cnpj, instituicao.logradouro, instituicao.cep, instituicao.email, 
        instituicao.telefone, instituicao.nummetasmensais, instituicao.numtermocolaboradorformento, instituicao.numplanotrabalho,
        instituicao.entidademantenedora, instituicao.entidadeexecutora);" name="instituicao">
        
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="idcidade" value="0">
            <input type="hidden" name="idinstituicao" id="idinstituicao" value="">
            <div class="row">
                <div class="col-sm-8">
                    <label >Nome Instituição*</label>
                    <input name="nomeinstituicao" class="form-control" type="text" value="" maxlength="255" autocomplete="off" >
                    <span id="msgNomeInstituicao"></span>
                    <br>
                </div>
                <div class="col-sm-4">
                    <label >CNPJ*</label>
                    <input name="cnpj" id="cnpj" class="form-control" type="text" value="" maxlength="14" autocomplete="off" onkeyup="mascara(this, Cnpj);">
                    <span id="msgCnpj"></span>
                    <br>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-8">
                <label >Endereço*</label>
                    <input name="logradouro" class="form-control" type="text" value="" maxlength="255" autocomplete="off" >
                    <span id="msgEndereco"></span>
                    <br>
                </div>
                <div class="col-sm-4">
                <label >Cep*</label>
                    <input name="cep" id="cep" class="form-control" type="text" value="" maxlength="8" autocomplete="off" onkeyup="mascara(this, Cep);">
                    <span id="msgCep"></span>
                    <br>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-8">
                    <label >E-mail*</label>
                    <input name="email" class="form-control" type="text" value="" maxlength="255" autocomplete="off" >
                    <span id="msgEmail"></span>
                    <br>
                </div>
                <div class="col-sm-4">
                    <label >Telefone*</label>
                    <input name="telefone" id="telefone" class="form-control" type="text" value="" maxlength="11" autocomplete="off" onkeyup="mascara(this, Telefone);">
                    <span id="msgTelefone"></span>
                    <br>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <label >N. de metas mensais*</label>
                    <input name="nummetasmensais" id="nummetasmensais" class="form-control" type="text" value="" maxlength="255" autocomplete="off" onkeyup="mascara(this, retiraLetras);">
                    <span id="msgMetasMensais"></span>
                    <br>
                </div>
                <div class="col-sm-4">
                    <label >N. do termo de colaboração*</label>
                    <input name="numtermocolaboradorformento" class="form-control" type="text" value="" maxlength="255" autocomplete="off" >
                    <span id="msgTermoColab"></span>
                    <br>
                </div>
                <div class="col-sm-4">
                    <label >N. do plano de trabalho*</label>
                    <input name="numplanotrabalho" class="form-control" type="text" value="" maxlength="255" autocomplete="off" >
                    <span id="msgNumTermoTrab"></span>
                    <br>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <label >Entidade Mantedora*</label>
                    <input name="entidademantenedora" class="form-control" type="text" value="" maxlength="255" autocomplete="off" >
                    <span id="msgEntidadeMantedora"></span>
                    <br>
                </div>
                <div class="col-sm-6">
                    <label >Entidade Executora*</label>
                    <input name="entidadeexecutora" class="form-control" type="text" value="" maxlength="255" autocomplete="off" >
                    <span id="msgEntidadeExecutora"></span>
                    <br>
                </div>
            <br>
            </div>
        <div class="float-right">
            <button type="submit" class="btn btn-primary" id="btn_instituicao">Salvar</button>
        </div>
        </form>
    @else
        <form class="form" action="/instituicao/edita" method="POST"  
        onsubmit="return validarInstituicao(instituicao.nomeinstituicao, instituicao.cnpj, instituicao.logradouro, instituicao.cep, instituicao.email, 
        instituicao.telefone, instituicao.nummetasmensais, instituicao.numtermocolaboradorformento, instituicao.numplanotrabalho,
        instituicao.entidademantenedora, instituicao.entidadeexecutora);" name="instituicao">
        
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="idinstituicao" id="idinstituicao" value="{{ $instituicao[0]->idinstituicao }}">
            <div class="row">
                <div class="col-sm-8">
                    <label >Nome Instituição*</label>
                    <input name="nomeinstituicao" class="form-control" type="text" value="{{ $instituicao[0]->nomeinstituicao }}" maxlength="255" autocomplete="off" >
                    <span id="msgNomeInstituicao"></span>
                    <br>
                </div>
                <div class="col-sm-4">
                    <label >CNPJ*</label>
                    <input name="cnpj" id="cnpj" class="form-control" type="text" value="{{ $instituicao[0]->cnpj }}" maxlength="14" autocomplete="off" onkeyup="mascara(this, Cnpj);">
                    <span id="msgCnpj"></span>
                    <br>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-8">
                <label >Endereço*</label>
                    <input name="logradouro" class="form-control" type="text" value="{{ $instituicao[0]->logradouro }}" maxlength="255" autocomplete="off" >
                    <span id="msgEndereco"></span>
                    <br>
                </div>
                <div class="col-sm-4">
                <label >Cep*</label>
                    <input name="cep" id="cep" class="form-control" type="text" value="{{ $instituicao[0]->cep }}" maxlength="8" autocomplete="off" onkeyup="mascara(this, Cep);">
                    <span id="msgCep"></span>
                    <br>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-8">
                    <label >E-mail*</label>
                    <input name="email" class="form-control" type="text" value="{{ $instituicao[0]->email }}" maxlength="255" autocomplete="off" >
                    <span id="msgEmail"></span>
                    <br>
                </div>
                <div class="col-sm-4">
                    <label >Telefone*</label>
                    <input name="telefone" id="telefone" class="form-control" type="text" value="{{ $instituicao[0]->telefone }}" maxlength="11" autocomplete="off" onkeyup="mascara(this, Telefone);">
                    <span id="msgTelefone"></span>
                    <br>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <label >N. de metas mensais*</label>
                    <input name="nummetasmensais" id="nummetasmensais" class="form-control" type="text" value="{{ $instituicao[0]->nummetasmensais }}" maxlength="255" autocomplete="off" onkeyup="mascara(this, retiraLetras);">
                    <span id="msgMetasMensais"></span>
                    <br>
                </div>
                <div class="col-sm-4">
                    <label >N. do termo de colaboração*</label>
                    <input name="numtermocolaboradorformento" class="form-control" type="text" value="{{ $instituicao[0]->numtermocolaboradorformento }}" maxlength="255" autocomplete="off" >
                    <span id="msgTermoColab"></span>
                    <br>
                </div>
                <div class="col-sm-4">
                    <label >N. do plano de trabalho*</label>
                    <input name="numplanotrabalho" class="form-control" type="text" value="{{ $instituicao[0]->numplanotrabalho }}" maxlength="255" autocomplete="off" >
                    <span id="msgNumTermoTrab"></span>
                    <br>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <label >Entidade Mantedora*</label>
                    <input name="entidademantenedora" class="form-control" type="text" value="{{ $instituicao[0]->entidademantenedora }}" maxlength="255" autocomplete="off" >
                    <span id="msgEntidadeMantedora"></span>
                    <br>
                </div>
                <div class="col-sm-6">
                    <label >Entidade Executora*</label>
                    <input name="entidadeexecutora" class="form-control" type="text" value="{{ $instituicao[0]->entidadeexecutora }}" maxlength="255" autocomplete="off" >
                    <span id="msgEntidadeExecutora"></span>
                    <br>
                </div>
            <br>
            </div>
        
            <button type="submit" class="btn btn-primary" id="btn_instituicao">Salvar</button>
        
        </form>
    @endif
    
    

    <div class="container" id="meio"></div>
    <h4 class="text">Número de dias de funcionamento por mês</h4>
    <form class="form" action="/instituicao/diasFuncionamento" method="POST">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="idano" value="{{$ano}}">
    <h5 value="{{$ano}}" name="idano">Ano - {{$ano}}</h5>

    <br>
    <div class="col-md-6 centered form-group">
    <table class="table table-striped table-bordered" align="center">
        <thead>
            <tr align="center">
            <div class="col-md-6">
                <th>Mês</th>
            </div>
            <div class="col-md-4">
                <th>Numero de dias de funcionamento</th>
            </div>
            </tr>
        </thead>
    
            <tr >
                <td align="center" class="font-weight-bold">Janeiro</td>
                @if(empty($diasFuncionamento[0]->jan) || $diasFuncionamento[0]->jan==0)
                    <td align="center"><input name="jan" id="jan" class="combo-box col-2" type="number" maxlength="2"></td>
                @else
                    <td align="center"><input type="number" id="jan" class="combo-box col-2" name="jan" value="{{$diasFuncionamento[0]->jan}}" maxlength="2"></td>
                @endif
            </tr>
            <tr>
                <td align="center" class="font-weight-bold">Fevereiro</td>
                @if(empty($diasFuncionamento[0]->fev) || $diasFuncionamento[0]->fev==0)
                    <td align="center" ><input type="number" id="fev" class="combo-box col-2" name="fev" maxlength="2"></td>
                @else
                    <td align="center"><input type="number" name="fev" id="fev" value="{{$diasFuncionamento[0]->fev}}" class="combo-box col-2" maxlength="2"></td>
                @endif
            </tr>
            <tr>
                <td align="center" class="font-weight-bold">Março</td>
                @if(empty($diasFuncionamento[0]->mar) || $diasFuncionamento[0]->mar==0)
                    <td align="center"><input name="mar" id="mar" class="combo-box col-2" type="number" maxlength="2"></td>
                @else
                    <td align="center"><input type="number" name="mar" id="mar" value="{{$diasFuncionamento[0]->mar}}" class="combo-box col-2" maxlength="2"></td>
                @endif
            </tr>
            <tr>
                <td align="center" class="font-weight-bold">Abril</td>
                @if(empty($diasFuncionamento[0]->abr) || $diasFuncionamento[0]->abr==0)
                    <td align="center"><input  name="abr" id="abr" class="combo-box col-2" type="number" maxlength="2"></td>
                @else
                    <td align="center"><input class="combo-box col-2" type="number" id="abr" name="abr" value="{{$diasFuncionamento[0]->abr}}" maxlength="2"></td>
                @endif
            </tr>
            <tr>
                <td align="center" class="font-weight-bold">Maio</td>
                @if(empty($diasFuncionamento[0]->mai) || $diasFuncionamento[0]->mai==0)
                    <td align="center" ><input name="mai" type="number" id="mai" class="combo-box col-2" maxlength="2"></td>
                @else
                    <td align="center" ><input  name="mai" value="{{$diasFuncionamento[0]->mai}}" id="mai" class="combo-box col-2" type="number" maxlength="2"></td>
                @endif
            </tr>
            <tr>
                <td align="center" class="font-weight-bold">Junho</td>
                @if(empty($diasFuncionamento[0]->jun) || $diasFuncionamento[0]->jun==0)
                    <td align="center" ><input name="jun" id="jun" class="combo-box col-2" type="number" maxlength="2"></td>
                @else
                    <td align="center"><input name="jun" id="jun" value="{{$diasFuncionamento[0]->jun}}" type="number" class="combo-box col-2" maxlength="2"></td>
                @endif
            </tr>
            <tr>
                <td align="center" class="font-weight-bold">Julho</td>
                @if(empty($diasFuncionamento[0]->jul) || $diasFuncionamento[0]->jul==0)
                    <td align="center" ><input name="jul" id="jul" class="combo-box col-2" type="number" maxlength="2"></td>
                @else
                    <td align="center" ><input name="jul" id="jul" value="{{$diasFuncionamento[0]->jul}}" class="combo-box col-2" type="number" maxlength="2"></td>
                @endif
            </tr>
            <tr>
                <td align="center" class="font-weight-bold">Agosto</td>
                @if(empty($diasFuncionamento[0]->ago) || $diasFuncionamento[0]->ago==0)
                    <td align="center"><input name="ago" id="ago" class="combo-box col-2" type="number" maxlength="2"></td>
                @else
                    <td align="center"><input name="ago" id="ago" value="{{$diasFuncionamento[0]->ago}}" class="combo-box col-2" type="number" maxlength="2"></td>
                @endif
            </tr>
            <tr>
                <td align="center" class="font-weight-bold">Setembro</td>
                @if(empty($diasFuncionamento[0]->setembro) || $diasFuncionamento[0]->setembro==0)
                    <td align="center"><input  name="setembro" id="setembro" class="combo-box col-2 form-control" type="number" maxlength="2"></td>
                @else
                    <td align="center"><input name="setembro" id="setembro" value="{{$diasFuncionamento[0]->setembro}}" class="combo-box col-2" type="number" maxlength="2"></td>
                @endif
            </tr>
            <tr>
                <td align="center" class="font-weight-bold">Outubro</td>
                @if(empty($diasFuncionamento[0]->outubro) || $diasFuncionamento[0]->outubro==0)
                    <td align="center"><input name="outubro" id="outubro" class="combo-box col-2" type="number" maxlength="2"></td>
                @else
                    <td align="center"><input name="outubro" id="outubro" value="{{$diasFuncionamento[0]->outubro}}" class="combo-box col-2" type="number" maxlength="2"></td>
                @endif
            </tr>
            <tr>
                <td align="center" class="font-weight-bold">Novembro</td>
                @if(empty($diasFuncionamento[0]->nov) || $diasFuncionamento[0]->nov==0)
                    <td align="center"><input name="nov" id="nov" class="combo-box col-2" type="number" maxlength="2"></td>
                @else
                    <td align="center"><input name="nov" id="nov" value="{{$diasFuncionamento[0]->nov}}" class="combo-box col-2" type="number" maxlength="2"></td>
                @endif
            </tr>
            <tr>
                <td align="center" class="font-weight-bold">Dezembro</td>
                @if(empty($diasFuncionamento[0]->dez) || $diasFuncionamento[0]->dez==0)
                    <td align="center"><input  name="dez" id="dez" class="combo-box col-2" type="number" maxlength="2"></td>
                @else
                    <td align="center"><input name="dez" id="dez" value="{{$diasFuncionamento[0]->dez}}" class="combo-box col-2" type="number" maxlength="2"></td>
                @endif
            </tr>
        
            
    </table>
        
    </div>
    <div class="row">
        <button type="submit" class="btn btn-primary"  id="btn_instituicao">Salvar</button>
    </div>
    </form>

<script>


    function validarInstituicao(nome, cnpj, endereco, cep, email, telefone, metasMensais, numTermoColab, numTermoTrab, 
    entidadeMant, entidadeExec){
        var permissao = true;
        var formulario = document.register;
        var tesNome = nome.value;
        var tesCnpj = cnpj.value;
        var tesEndereco = endereco.value;
        var tesCep = cep.value;
        var tesEmail = email.value;
        var tesTelefone = telefone.value;
        var tesMetasMensais = metasMensais.value;
        var tesNumTermoColab = numTermoColab.value;
        var tesNumTermoTrab = numTermoTrab.value;
        var tesEntidadeMant = entidadeMant.value;
        var tesEntidadeExec = entidadeExec.value;

        if (tesNome == "") {
            document.getElementById("msgNomeInstituicao").innerHTML="<font color='red'>Campo obrigatório</font>";
            permissao = false;
        } else {
            document.getElementById("msgNomeInstituicao").innerHTML="";
        }

        if (tesCnpj == "") {
            document.getElementById("msgCnpj").innerHTML="<font color='red'>Campo obrigatório</font>";
            permissao = false;
        } else if(validarCNPJ(tesCnpj)){
            document.getElementById("msgCnpj").innerHTML="<font color='red'>O CNPJ informado não é válido, por favor verifique</font>";
            permissao = false;
        } else {
            document.getElementById("msgCnpj").innerHTML="";
        }

        if (tesEndereco == "") {
            document.getElementById("msgEndereco").innerHTML="<font color='red'>Campo obrigatório</font>";
            permissao = false;
        } else {
            document.getElementById("msgEndereco").innerHTML="";
        }

        if (tesCep == "") {
            document.getElementById("msgCep").innerHTML="<font color='red'>Campo obrigatório</font>";
            permissao = false;
        } else if(tesCep.length<8){
            document.getElementById("msgCep").innerHTML="<font color='red'>O CEP informado não é válido, por favor verifique</font>";
            permissao = false;
        }else {
            document.getElementById("msgCep").innerHTML="";
        }

        if (tesEmail == "") {
            document.getElementById("msgEmail").innerHTML="<font color='red'>Campo obrigatório</font>";
            permissao = false;
        } else if(validarEmail(email)){
            document.getElementById("msgEmail").innerHTML="<font color='red'>O email informado não é válido, por favor verifique</font>";
            permissao = false;
        } else {
            document.getElementById("msgEmail").innerHTML="";
        }

        if (tesTelefone == "") {
            document.getElementById("msgTelefone").innerHTML="<font color='red'>Campo obrigatório</font>";
            permissao = false;
        } else if(tesTelefone.length<10){
            document.getElementById("msgTelefone").innerHTML="<font color='red'>O telefone informado não é válido, por favor verifique</font>";
            permissao = false;
        }else {
            document.getElementById("msgTelefone").innerHTML="";
        }

        if (tesMetasMensais == "") {
            document.getElementById("msgMetasMensais").innerHTML="<font color='red'>Campo obrigatório</font>";
            permissao = false;
        } else {
            document.getElementById("msgMetasMensais").innerHTML="";
        }
        
        if (tesNumTermoColab == "") {
            document.getElementById("msgTermoColab").innerHTML="<font color='red'>Campo obrigatório</font>";
            permissao = false;
        } else {
            document.getElementById("msgTermoColab").innerHTML="";
        }

        if (tesNumTermoTrab == "") {
            document.getElementById("msgNumTermoTrab").innerHTML="<font color='red'>Campo obrigatório</font>";
            permissao = false;
        } else {
            document.getElementById("msgNumTermoTrab").innerHTML="";
        }

        if (tesEntidadeMant == "") {
            document.getElementById("msgEntidadeMantedora").innerHTML="<font color='red'>Campo obrigatório</font>";
            permissao = false;
        } else {
            document.getElementById("msgEntidadeMantedora").innerHTML="";
        }

        if (tesEntidadeExec == "") {
            document.getElementById("msgEntidadeExecutora").innerHTML="<font color='red'>Campo obrigatório</font>";
            permissao = false;
        } else {
            document.getElementById("msgEntidadeExecutora").innerHTML="";
        }

        return permissao;
    }

    function mascara(o,f){
        v_obj=o
        v_fun=f
        setTimeout("execmascara()",1)
    }
    function execmascara(){
        v_obj.value=v_fun(v_obj.value)
    }

    function Cep(v){
        v=v.replace(/\D/g,"");
        //v=v.replace(/^(\d{2})(\d)/,"$1.$2")
		//v=v.replace(/\.(\d{3})(\d)/,".$1-$2")
        return v;
    }

    function Telefone (v){
        v=v.replace(/\D/g,"");             //Remove tudo o que não é dígito
        //v=v.replace(/^(\d{2})(\d)/g,"($1) $2"); //Coloca parênteses em volta dos dois primeiros dígitos
        //v=v.replace(/(\d)(\d{4})$/,"$1-$2");    //Coloca hífen entre o quarto e o quinto dígitos
        return v;
    }

    function Cnpj (v){
        v=v.replace(/\D/g,"");             //Remove tudo o que não é dígito
        //v=v.replace(/^(\d{2})(\d{3})?(\d{3})?(\d{4})?(\d{2})?/, "$1.$2.$3/$4-$5"); 
        return v;
    }

    function retiraLetras (v){
        v=v.replace(/\D/g,"");   
        return v;
    }
    function id( el ){
        return document.getElementById( el );
    }

    window.onload = function(){
        id('cep').onkeyup = function(){
            mascara( this, Cep );
        }

        id('telefone').onkeyup = function(){
            mascara( this, Telefone );
        }

        id('cnpj').onkeyup = function(){
            mascara( this, Cnpj );
        }

        id('nummetasmensais').onkeyup = function(){
            mascara( this, retiraLetras );
        }

        var data = new Date();
        if(data.getMonth()>1){
            document.getElementById("jan").disabled = true;
        }
        if(data.getMonth()>2){
            document.getElementById("fev").disabled = true;
        }
        if(data.getMonth()>3){
            document.getElementById("mar").disabled = true;
        }
        if(data.getMonth()>4){
            document.getElementById("abr").disabled = true;
        }
        if(data.getMonth()>5){
            document.getElementById("mai").disabled = true;
        }
        if(data.getMonth()>6){
            document.getElementById("jun").disabled = true;
        }
        if(data.getMonth()>7){
            document.getElementById("jul").disabled = true;
        }
        if(data.getMonth()>8){
            document.getElementById("ago").disabled = true;
        }
        if(data.getMonth()>9){
            document.getElementById("set").disabled = true;
        }
        if(data.getMonth()>10){
            document.getElementById("out").disabled = true;
        }
        if(data.getMonth()>11){
            document.getElementById("nov").disabled = true;
        }
        if(data.getMonth()>12){
            document.getElementById("dez").disabled = true;
        }


    }

    function validarCNPJ(cnpj) {
 
        cnpj = cnpj.replace(/[^\d]+/g,'');

        if(cnpj == '') return true;
        
        if (cnpj.length != 14)
            return true;

        // Elimina CNPJs invalidos conhecidos
        if (cnpj == "00000000000000" || 
            cnpj == "11111111111111" || 
            cnpj == "22222222222222" || 
            cnpj == "33333333333333" || 
            cnpj == "44444444444444" || 
            cnpj == "55555555555555" || 
            cnpj == "66666666666666" || 
            cnpj == "77777777777777" || 
            cnpj == "88888888888888" || 
            cnpj == "99999999999999")
            return true;
            
        // Valida DVs
        tamanho = cnpj.length - 2
        numeros = cnpj.substring(0,tamanho);
        digitos = cnpj.substring(tamanho);
        soma = 0;
        pos = tamanho - 7;
        for (i = tamanho; i >= 1; i--) {
            soma += numeros.charAt(tamanho - i) * pos--;
        if (pos < 2)
                pos = 9;
        }
        resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
        if (resultado != digitos.charAt(0))
            return true;
            
        tamanho = tamanho + 1;
        numeros = cnpj.substring(0,tamanho);
        soma = 0;
        pos = tamanho - 7;
        for (i = tamanho; i >= 1; i--) {
            soma += numeros.charAt(tamanho - i) * pos--;
        if (pos < 2)
                pos = 9;
        }
        resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
        if (resultado != digitos.charAt(1))
            return true;
                
        return false;
        
    }

    function validarEmail(email) {
        usuario = email.value.substring(0, email.value.indexOf("@"));
        dominio = email.value.substring(email.value.indexOf("@")+ 1, email.value.length);
        if ((usuario.length >=1) &&
            (dominio.length >=3) && 
            (usuario.search("@")==-1) && 
            (dominio.search("@")==-1) &&
            (usuario.search(" ")==-1) && 
            (dominio.search(" ")==-1) &&
            (dominio.search(".")!=-1) &&      
            (dominio.indexOf(".") >=1)&& 
            (dominio.lastIndexOf(".") < dominio.length - 1)) {
                return false;
            } else {return true}
        

    }
</script>
@stop