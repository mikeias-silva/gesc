@extends('layout.principal') 
@section('conteudo')

<h1 class="text">Imprimir Ficha de Frequência</h1>
<hr>
<spam id="campoObrigatorio"></spam>
<spam id="cpfInvalido"></spam>
<form class="form" action="/fichaFrequencia/imprimir" method="post" name="imprimeFicha" id="imprimeFicha"
    onsubmit = "return validaDados(imprimeFicha.nomeresponsaveltec, imprimeFicha.cpfresponsavel, imprimeFicha.profissao, imprimeFicha.visitasdomiciliares,
    imprimeFicha.atendimentosgrupo, imprimeFicha.reuniaoacolhimento, imprimeFicha.encaminhamentos, imprimeFicha.atendimentosindividuais,
    imprimeFicha.encaminhamentoprivada, imprimeFicha.planoelaborado);">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="form-group">
        <div class="row">
            <div class="col-sm-2">
                <label>Mês/Ano</label>
                <select style="border:1px solid #808080;" class="form-control" name="periodo" id="periodo">
                    <option value="{{$mes}}">{{$mes}}/{{$ano}}</option>
                    @if($mes==1)
                        <option value="12">12/{{$a=$ano-1}}</option>
                    @else
                        <option value="{{$m = $mes-1}}">0{{$m = $mes-1}}/{{$ano}}</option>
                    @endif
                </select>
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="row">
            <div class="col-sm-8" >
                <label>Nome do responsável técnico do serviço</label>
                <input type="text" style="border:1px solid #808080;" class="form-control" name="nomeresponsaveltec" id="nomeresponsaveltec" maxlength="255" autocomplete="off">
                <spam id="msgNomeResp"></spam>
            </div>
                            
            <div class="col-sm-4">
                <label>CPF</label>
                <input type="text" style="border:1px solid #808080;" class="form-control" name="cpfresponsavel" id="cpfresponsavel" maxlength="11" autocomplete="off"  onkeyup="mascara( this, removeLetra );">
                <spam id="msgcpfresponsavel"></spam>
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="row">
            <div class="col-sm-8" >
                <label>Profissão e N. de registro de classe</label>
                <input type="text" style="border:1px solid #808080;" class="form-control" name="profissao" id="profissao" maxlength="255" autocomplete="off">
                <spam id="msgprofissao"></spam>
            </div>
        </dvi>
    </div>  
    </br>

    <table class="table col-sm-8">
        <thead>
            <tr>
                <td><label>N. de visitas domiciliares:</label></td>
                <td>
                    <div class="col-md-2">
                        <input type="text" onkeyup="mascara( this, removeLetra );" style="border:1px solid #808080;" cols="2" class="form-control" name="visitasdomiciliares" id="visitasdomiciliares" maxlength="4" autocomplete="off">
                    </div>
                </td>
            </tr>
            <tr>
                <td><label>N. de atendimentos em grupo:</label></td>
                <td>
                    <div class="col-md-2">
                        <input type="text" onkeyup="mascara( this, removeLetra );" style="border:1px solid #808080;" class="form-control" name="atendimentosgrupo" id="atendimentosgrupo" maxlength="4" autocomplete="off">
                    </div>
                </td>
            </tr>
            <tr>
                <td><label>N. de reuniões de acolhimento e/ou avaliação:</label></td>
                <td>
                    <div class="col-md-2">
                        <input type="text" onkeyup="mascara( this, removeLetra );" style="border:1px solid #808080;" class="form-control" name="reuniaoacolhimento" id="reuniaoacolhimento" maxlength="4" autocomplete="off">
                    </div>
                </td>
            </tr>
            <tr>
                <td><label>N. de encaminhamentos de CRAS e CREAS:</label></td>
                <td>
                    <div class="col-md-2">
                        <input type="text" onkeyup="mascara( this, removeLetra );" style="border:1px solid #808080;" class="form-control" name="encaminhamentos" id="encaminhamentos" maxlength="4" autocomplete="off">
                    </div>
                </td>
            </tr>
            <tr>
                <td><label>N. de atendimentos individuais:</label></td>
                <td>
                    <div class="col-md-2">
                    <input type="text" onkeyup="mascara( this, removeLetra );" style="border:1px solid #808080;" class="form-control" name="atendimentosindividuais" id="atendimentosindividuais" maxlength="4" autocomplete="off">
                    </div>
                </td>
            </tr>
            <tr>
                <td><label>N. de encaminhamentos para rede privada:</label></td>
                <td>
                    <div class="col-md-2">
                        <input type="text" onkeyup="mascara( this, removeLetra );" style="border:1px solid #808080;" class="form-control" name="encaminhamentoprivada" id="encaminhamentoprivada" maxlength="4" autocomplete="off">
                    </div>
                </td>
            </tr>
            <tr>
                <td><label>N. de planos individuais e/ou familiar elaborados:</label></td>
                <td>
                    <div class="col-md-2">
                        <input type="text" onkeyup="mascara( this, removeLetra );" style="border:1px solid #808080;" class="form-control" name="planoelaborado" id="planoelaborado" maxlength="4" autocomplete="off">
                    </div>
                </td>
            </tr>
        </thead>
    </table>

    <div class="form-group ">
        <label>Descrição das atividades executadas durante o mês no serviço contratado</label>
        <textarea style="border:1px solid #808080;" name="descricaoatividade" id="" cols="10" rows="2" class="form-control" maxlength="1000" autocomplete="off"></textarea>
    </div>

    <div class="form-group ">
        <label>Observações</label>
        <textarea style="border:1px solid #808080;" name="obs" id="" cols="10" rows="2" class="form-control" maxlength="1000" autocomplete="off"></textarea>
    </div>

    
    <div class="footer">
        <button type="submit" class="btn btn-primary">Inprimir Ficha de Frequência</button>
    </div>
</form>

<script>
    function validaDados(nomeResp, cpf, profissao, visitasdomiciliares, atendimentosgrupo, reuniaoacolhimento, encaminhamentos, atendimentosindividuais,
                        encaminhamentoprivada, planoelaborado){
        var permissao = true;
        var formulario = document.register;
        var nomeResp = nomeResp.value;
        var cpf = cpf.value;
        var profissao = profissao.value;
        var visitasdomiciliares = visitasdomiciliares.value;
        var atendimentosgrupo = atendimentosgrupo.value;
        var reuniaoacolhimento = reuniaoacolhimento.value;
        var encaminhamentos = encaminhamentos.value;
        var atendimentosindividuais = atendimentosindividuais.value;
        var encaminhamentoprivada = encaminhamentoprivada.value;
        var planoelaborado = planoelaborado.value;
        var cont = 0;
        console.log(nomeResp);
        if(nomeResp==""){
            document.getElementById('nomeresponsaveltec').style.border = 'solid 1px red';
            cont++;
        }else{
            document.getElementById('nomeresponsaveltec').style.border = 'solid 1px #808080';
        }

        if(cpf==""){
            document.getElementById('cpfresponsavel').style.border = 'solid 1px red';
            cont++;
        }else{
            if(validaCPF(cpf)){
                document.getElementById('cpfresponsavel').style.border = 'solid 1px red';
                document.getElementById("cpfInvalido").innerHTML="<font color='red'>O CPF informado não é válido, por favor verifique</br></font>";
                permissao=false;
            }else{
                document.getElementById('cpfresponsavel').style.border = 'solid 1px #808080';
                document.getElementById("cpfInvalido").innerHTML="";
            }
            
        }

        if(profissao==""){
            document.getElementById('profissao').style.border = 'solid 1px red';
            cont++;
        }else{
            document.getElementById('profissao').style.border = 'solid 1px #808080';
        }

        if(visitasdomiciliares==""){
            document.getElementById('visitasdomiciliares').style.border = 'solid 1px red';
            cont++;
        }else{
            document.getElementById('visitasdomiciliares').style.border = 'solid 1px #808080';
        }

        if(atendimentosgrupo==""){
            document.getElementById('atendimentosgrupo').style.border = 'solid 1px red';
            cont++;
        }else{
            document.getElementById('atendimentosgrupo').style.border = 'solid 1px #808080';
        }

        if(reuniaoacolhimento==""){
            document.getElementById('reuniaoacolhimento').style.border = 'solid 1px red';
            cont++;
        }else{
            document.getElementById('reuniaoacolhimento').style.border = 'solid 1px #808080';
        }

        if(encaminhamentos==""){
            document.getElementById('encaminhamentos').style.border = 'solid 1px red';
            cont++;
        }else{
            document.getElementById('encaminhamentos').style.border = 'solid 1px #808080';
        }

        if(atendimentosindividuais==""){
            document.getElementById('atendimentosindividuais').style.border = 'solid 1px red';
            cont++;
        }else{
            document.getElementById('atendimentosindividuais').style.border = 'solid 1px #808080';
        }

        if(encaminhamentoprivada==""){
            document.getElementById('encaminhamentoprivada').style.border = 'solid 1px red';
            cont++;
        }else{
            document.getElementById('encaminhamentoprivada').style.border = 'solid 1px #808080';
        }

        if(planoelaborado==""){
            document.getElementById('planoelaborado').style.border = 'solid 1px red';
            cont++;
        }else{
            document.getElementById('planoelaborado').style.border = 'solid 1px #808080';
        }


        if(cont>0){
            document.getElementById("campoObrigatorio").innerHTML="<font color='red'>Existem campos obrigatórios não preenchidos, por favor verifique</br></font>";
            permissao=false;
        }else{
            document.getElementById("campoObrigatorio").innerHTML="";
        }
        //var tesTelefone = telefone.value;
        return true;
    }

    function validaCPF(cpf){
        var Soma;
        var Resto;
        Soma = 0; 
        if(cpf.length<9 || cpf=="00000000000" || cpf=="11111111111" || cpf=="22222222222"
                    || cpf=="33333333333" || cpf=="44444444444" || cpf=="55555555555" || cpf=="66666666666"
                    || cpf=="77777777777" || cpf=="88888888888" || cpf=="99999999999"){
                        return true;
            }
        for (i=1; i<=9; i++) Soma = Soma + parseInt(cpf.substring(i-1, i)) * (11 - i);
            Resto = (Soma * 10) % 11;
        
        if ((Resto == 10) || (Resto == 11))  Resto = 0;
            if (Resto != parseInt(cpf.substring(9, 10)) ) 
                return true;
        
        Soma = 0;
        for (i = 1; i <= 10; i++) Soma = Soma + parseInt(cpf.substring(i-1, i)) * (12 - i);
            Resto = (Soma * 10) % 11;
        
        if ((Resto == 10) || (Resto == 11))  Resto = 0;
            if (Resto != parseInt(cpf.substring(10, 11) ) ) 
                return true;
        
        return false;
     }
    
    function mascara(o,f){
        v_obj=o
        v_fun=f
        setTimeout("execmascara()",1)
    }
    function execmascara(){
        v_obj.value=v_fun(v_obj.value)
    }
    function removeLetra(v){
        v=v.replace(/\D/g,"");             //Remove tudo o que não é dígito
        //v=v.replace(/^(\d{2})(\d)/g,"($1) $2"); //Coloca parênteses em volta dos dois primeiros dígitos
        //v=v.replace(/(\d)(\d{4})$/,"$1-$2");    //Coloca hífen entre o quarto e o quinto dígitos
        return v;
    }

</script>

@stop

