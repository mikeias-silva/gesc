@extends('layout.principal') 
@section('conteudo')
<h1 class="text">Dados da Instituição </h1>
<div class="container" id="meio"> </div>
    <form class="form" action="/instituicao/edita" method="POST"  
    onsubmit="return validarInstituicao(instituicao.cnpj);" name="instituicao">
    
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="idinstituicao" id="idinstituicao" value="{{ $instituicao[0]->idinstituicao }}">
        
        <h3 >Nome Instituição</h3>
        <input name="nomeinstituicao" class="form-control" type="text" value="{{ $instituicao[0]->nomeinstituicao }}" maxlength="255" autocomplete="off" >
        <h3 >CNPJ</h3>
        <input name="cnpj" id="cnpj" class="form-control" type="text" value="{{ $instituicao[0]->cnpj }}" maxlength="255" autocomplete="off" onkeyup="mascara(this, Cnpj);">
        <h3 >Endereço</h3>
        <input name="logradouro" class="form-control" type="text" value="{{ $instituicao[0]->logradouro }}" maxlength="255" autocomplete="off" >
        <h3 >Cep</h3>
        <input name="cep" id="cep" class="form-control" type="text" value="{{ $instituicao[0]->cep }}" maxlength="255" autocomplete="off" onkeyup="mascara(this, Cep);">
        <h3 >E-mail</h3>
        <input name="email" class="form-control" type="text" value="{{ $instituicao[0]->email }}" maxlength="255" autocomplete="off" >
        <h3 >Telefone</h3>
        <input name="telefone" id="telefone" class="form-control" type="text" value="{{ $instituicao[0]->telefone }}" maxlength="255" autocomplete="off" onkeyup="mascara(this, Telefone);">
        <h3 >N. de metas mensais</h3>
        <input name="nummetasmensais" class="form-control" type="text" value="{{ $instituicao[0]->nummetasmensais }}" maxlength="255" autocomplete="off" >
        <h3 >N. do termo de colaboração\formento</h3>
        <input name="numtermocolaboradorformento" class="form-control" type="text" value="{{ $instituicao[0]->numtermocolaboradorformento }}" maxlength="255" autocomplete="off" >
        <h3 >N. do plano de trabalho</h3>
        <input name="numplanotrabalho" class="form-control" type="text" value="{{ $instituicao[0]->numplanotrabalho }}" maxlength="255" autocomplete="off" >
        <h3 >Entidade Mantedora</h3>
        <input name="entidademantenedora" class="form-control" type="text" value="{{ $instituicao[0]->entidademantenedora }}" maxlength="255" autocomplete="off" >
        <h3 >Entidade Executora</h3>
        <input name="entidadeexecutora" class="form-control" type="text" value="{{ $instituicao[0]->entidadeexecutora }}" maxlength="255" autocomplete="off" >


        

        <!--<h3>Cidade/UF</h3>
        {{ $cidadeins[0]->nomecidade }}
        {{ $cidadeins[0]->siglaestado }}-->
        <button type="submit" class="btn btn-primary" id="btn_instituicao">Salvar</button>
    </form>
    

    <div class="container" id="meio"></div>
    <select name="" id="" class="form-control col-md-1">
        <option value="">2017</option>
        <option value="">2018</option>
    </select>

    <table class="table table-striped container col-md-6" align="center">
        <thead>
            <tr align="center">
                <th>Mês</th>
                <th>Numero de dias de funcionamento</th>
            </tr>
        </thead>
    
            <tr>
                <td align="center">Janeiro</td>
                <td align="center"><input type="combo-box col-2"></td>
            </tr>
            <tr>
                <td align="center">Fevereiro</td>
                <td align="center"><input type="combo-box col-2"></td>
            </tr>
            <tr>
                <td align="center">Março</td>
                <td align="center"><input type="combo-box col-2"></td>
            </tr>
            <tr>
                <td align="center">Abril</td>
                <td align="center"><input type="combo-box col-2"></td>
            </tr>
            <tr>
                <td align="center">Maio</td>
                <td align="center"><input type="combo-box col-2"></td>
            </tr>
            <tr>
                <td align="center">Junho</td>
                <td align="center"><input type="combo-box col-2"></td>
            </tr>
            <tr>
                <td align="center">Julho</td>
                <td align="center"><input type="combo-box col-2"></td>
            </tr>
            <tr>
                <td align="center">Agosto</td>
                <td align="center"><input type="combo-box col-2"></td>
            </tr>
            <tr>
                <td align="center">Setembro</td>
                <td align="center"><input type="combo-box col-2"></td>
            </tr>
            <tr>
                <td align="center">Outubro</td>
                <td align="center"><input type="combo-box col-2"></td>
            </tr>
            <tr>
                <td align="center">Novembro</td>
                <td align="center"><input type="combo-box col-2"></td>
            </tr>
            <tr>
                <td align="center">Dezembro</td>
                <td align="center"><input type="combo-box col-2"></td>
            </tr>
        
            
    </table>
    <div class="container">
        <button class="btn btn-primary"  id="btn_instituicao">Salvar</button>
    </div>

<script>

    function validarInstituicao(cnpj){
        var permissao = true;
        var formulario = document.register;
        console.log(validarCNPJ(cnpj.value));


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
    }

    function validarCNPJ(cnpj) {
 
        cnpj = cnpj.replace(/[^\d]+/g,'');

        if(cnpj == '') return false;
        
        if (cnpj.length != 14)
            return false;

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
            return false;
            
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
            return false;
            
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
            return false;
                
        return true;
        
    }
</script>
@stop