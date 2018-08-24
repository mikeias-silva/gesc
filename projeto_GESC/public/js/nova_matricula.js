 /*   function validarMatricula(nomeCrianca, dataNascimentoCrianca, rgCrianca, cpfCrianca, cep, endereco, bairro, nomeResp1, dataNascResp1,
                                rgResp1, cpfResp1, salarioRep1, tel1Resp1, tel2Resp1, nomeResp2, dataNascResp2, rgResp2, cpfResp2,
                                salarioResp2, tel1Resp2, tel2Resp2, numNis) {
        var permissao = true;
        var formulario = document.register;
        var tesNomeCrianca = nomeCrianca.value;
        var tesDataNascimentoCrianca = new Date(dataNascimentoCrianca.value+"T03:00:00Z");
        var tesRgCrianca = rgCrianca.value;
        var tesCpfCrianca = cpfCrianca.value;
        var tesCep = cep.value;
        var tesEndereco = endereco.value;
        var tesBairro = bairro.value;
        var tesNomeResp1 = nomeResp1.value;
        var tesDataNascimentoResp1 = new Date(dataNascResp1.value+"T03:00:00Z");
        var tesRgResp1 = rgResp1.value;
        var tesCpfResp1 = cpfResp1.value;
        var tesSalarioRep1 = salarioRep1.value;
        var tesTel1Resp1 = tel1Resp1.value;
        var tesTel2Resp1 = tel2Resp1.value;
        var tesNumNis = numNis.value;
        //console.log(tesCep);
        //console.log(tesRgCrianca);
        //console.log(tesDataNascimentoCrianca);
        //var idade = calculaIdade(tesDataNascimentoCrianca);

        if (tesNomeCrianca == "") {
            document.getElementById("msgNomeCrianca").innerHTML="<font color='red'>Este campo é de preenchimento obrigatório</font>";
            permissao = false;
        } else {
            document.getElementById("msgNomeCrianca").innerHTML="";
        }

        if ((dataNascimentoCrianca.value) == "") {
            document.getElementById("msgDataNascimento").innerHTML="<font color='red'>Este campo é de preenchimento obrigatório</font>";
            permissao = false;
        } else if (new Date()<tesDataNascimentoCrianca){
            document.getElementById("msgDataNascimento").innerHTML="<font color='red'>A data informada não é válida, por favor verifique</font>";
            permissao = false;
        } else {
            var idade = calculaIdade(tesDataNascimentoCrianca);
            //console.log(idade);
            document.getElementById("msgDataNascimento").innerHTML="";
            if(idade>17){
                document.getElementById("msgDataNascimento").innerHTML="<font color='red'>Não é premitido a matrícula de maiores de idade, por favor verifique</font>";
                permissao = false;
            }else {
                document.getElementById("msgDataNascimento").innerHTML="";
            }
        }

        if (tesRgCrianca == "") {
        document.getElementById("msgRg").innerHTML="<font color='red'>Este campo é de preenchimento obrigatório</font>";
        permissao = false;
        } else if(tesRgCrianca.length<9){
            document.getElementById("msgRg").innerHTML="<font color='red'>O RG informado é inválido, por favor verifique</font>";
            permissao = false;
        }
        else {
            document.getElementById("msgRg").innerHTML="";
        }

        if (tesCpfCrianca == "") {
            document.getElementById("msgCpf").innerHTML="<font color='red'>Este campo é de preenchimento obrigatório</font>";
            permissao = false;
        } else if(validaCPF(tesCpfCrianca)){
            document.getElementById("msgCpf").innerHTML="<font color='red'>O CPF informado é inválido, por favor verifique</font>";
            permissao = false;
        }
        else {
            document.getElementById("msgCpf").innerHTML="";
        }

        if (tesCep == "") {
        document.getElementById("msgCep").innerHTML="<font color='red'>Este campo é de preenchimento obrigatório</font>";
        permissao = false;
        } else if(tesCep.length<8){
            document.getElementById("msgCep").innerHTML="<font color='red'>O CEP informado é inválido, por favor verifique</font>";
            permissao = false;
        }
        else {
            document.getElementById("msgCep").innerHTML="";
        }

        if (tesEndereco == "") {
        document.getElementById("msgEndereco").innerHTML="<font color='red'>Este campo é de preenchimento obrigatório</font>";
        permissao = false;
        } else {
            document.getElementById("msgEndereco").innerHTML="";
        }

        if (tesBairro == "") {
        document.getElementById("msgBairro").innerHTML="<font color='red'>Este campo é de preenchimento obrigatório</font>";
        permissao = false;
        } else {
            document.getElementById("msgBairro").innerHTML="";
        }

        if (tesNomeResp1 == "") {
        document.getElementById("msgNomeResp1").innerHTML="<font color='red'>Este campo é de preenchimento obrigatório</font>";
        permissao = false;
        } else {
            document.getElementById("msgNomeResp1").innerHTML="";
        }

        if ((dataNascResp1.value) == "") {
            document.getElementById("msgDataResp1").innerHTML="<font color='red'>Este campo é de preenchimento obrigatório</font>";
            permissao = false;
        } else if (new Date()<tesDataNascimentoResp1){
            document.getElementById("msgDataResp1").innerHTML="<font color='red'>A data informada não é válida, por favor verifique</font>";
            permissao = false;
        } else {
            document.getElementById("msgDataResp1").innerHTML="";
        }

        if (tesRgResp1 == "") {
        document.getElementById("msgRgResp1").innerHTML="<font color='red'>Este campo é de preenchimento obrigatório</font>";
        permissao = false;
        } else if(tesRgResp1.length<9){
            document.getElementById("msgRgResp1").innerHTML="<font color='red'>O RG informado é inválido, por favor verifique</font>";
            permissao = false;
        }
        else {
            document.getElementById("msgRgResp1").innerHTML="";
        }

        if (tesCpfResp1 == "") {
            document.getElementById("msgCpfResp1").innerHTML="<font color='red'>Este campo é de preenchimento obrigatório</font>";
            permissao = false;
        } else if(validaCPF(tesCpfResp1)){
            document.getElementById("msgCpfResp1").innerHTML="<font color='red'>O CPF informado é inválido, por favor verifique</font>";
            permissao = false;
        }
        else {
            document.getElementById("msgCpfResp1").innerHTML="";
        }

        if (tesSalarioRep1 == "") {
            document.getElementById("msgSalarioResp1").innerHTML="<font color='red'>Este campo é de preenchimento obrigatório</font>";
            permissao = false;
        } else {
            document.getElementById("msgSalarioResp1").innerHTML="";
        }

        if (tesTel1Resp1 == "") {
            document.getElementById("msgTel1Resp1").innerHTML="<font color='red'>Este campo é de preenchimento obrigatório</font>";
            permissao = false;
        } else if(tesTel1Resp1.length<10){
            document.getElementById("msgTel1Resp1").innerHTML="<font color='red'>O telefone informado não é válido, por favor verifique</font>";
            permissao = false;
        } else {
            document.getElementById("msgTel1Resp1").innerHTML="";
        }

        if (tesTel2Resp1 != ""){
            if(tesTel2Resp1.length<10){
                document.getElementById("msgTel2Resp1").innerHTML="<font color='red'>O telefone informado não é válido, por favor verifique</font>";
                permissao = false;
            } else {
                document.getElementById("msgTel2Resp1").innerHTML="";
            }
        } else {
            document.getElementById("msgTel2Resp1").innerHTML="";
        }

        if(nomeResp2.value!="" || dataNascResp2.value!="" || rgResp2.value!="" || cpfResp2.value!="" || salarioResp2.value!="" || tel1Resp2.value!="" ||
            tel2Resp2.value!=""){
                var tesNomeResp2 = nomeResp2.value;
                var tesDataNascimentoResp2 = new Date(dataNascResp2.value+"T03:00:00Z");
                var tesRgResp2 = rgResp2.value;
                var tesCpfResp2 = cpfResp2.value;
                var tesSalarioRep2 = salarioResp2.value;
                var tesTel1Resp2 = tel1Resp2.value;
                var tesTel2Resp2 = tel2Resp2.value;

                if (tesNomeResp2 == "") {
                    document.getElementById("msgNomeResp2").innerHTML="<font color='red'>Este campo é de preenchimento obrigatório</font>";
                    permissao = false;
                } else {
                    document.getElementById("msgNomeResp2").innerHTML="";
                }

                if ((dataNascResp2.value) == "") {
                    document.getElementById("msgDataResp2").innerHTML="<font color='red'>Este campo é de preenchimento obrigatório</font>";
                    permissao = false;
                } else if (new Date()<tesDataNascimentoResp2){
                    document.getElementById("msgDataResp2").innerHTML="<font color='red'>A data informada não é válida, por favor verifique</font>";
                    permissao = false;
                } else {
                    document.getElementById("msgDataResp2").innerHTML="";
                }

                if (tesRgResp2 == "") {
                    document.getElementById("msgRgResp2").innerHTML="<font color='red'>Este campo é de preenchimento obrigatório</font>";
                    permissao = false;
                } else if(tesRgResp2.length<9){
                    document.getElementById("msgRgResp2").innerHTML="<font color='red'>O RG informado é inválido, por favor verifique</font>";
                    permissao = false;
                }
                else {
                    document.getElementById("msgRgResp2").innerHTML="";
                }

                if (tesCpfResp2 == "") {
                    document.getElementById("msgCpfResp2").innerHTML="<font color='red'>Este campo é de preenchimento obrigatório</font>";
                    permissao = false;
                } else if(validaCPF(tesCpfResp2)){
                    document.getElementById("msgCpfResp2").innerHTML="<font color='red'>O CPF informado é inválido, por favor verifique</font>";
                    permissao = false;
                }
                else {
                    document.getElementById("msgCpfResp2").innerHTML="";
                }

                if (tesSalarioRep2 == "") {
                    document.getElementById("msgSalarioResp2").innerHTML="<font color='red'>Este campo é de preenchimento obrigatório</font>";
                    permissao = false;
                } else {
                    document.getElementById("msgSalarioResp2").innerHTML="";
                }

                if (tesTel1Resp2 == "") {
                    document.getElementById("msgTel1Resp2").innerHTML="<font color='red'>Este campo é de preenchimento obrigatório</font>";
                    permissao = false;
                } else if(tesTel1Resp2.length<10){
                    document.getElementById("msgTel1Resp2").innerHTML="<font color='red'>O telefone informado não é válido, por favor verifique</font>";
                    permissao = false;
                } else {
                    document.getElementById("msgTel1Resp2").innerHTML="";
                }

                if (tesTel2Resp2 != ""){
                    if(tesTel2Resp2.length<10){
                        document.getElementById("msgTel2Resp2").innerHTML="<font color='red'>O telefone informado não é válido, por favor verifique</font>";
                        permissao = false;
                    } else {
                        document.getElementById("msgTel2Resp2").innerHTML="";
                    }
                } else {
                    document.getElementById("msgTel2Resp2").innerHTML="";
                }
        }

        if (tesNumNis == "") {
            document.getElementById("msgNumNis").innerHTML="<font color='red'>Este campo é de preenchimento obrigatório</font>";
            permissao = false;
        } else {
            document.getElementById("msgNumNis").innerHTML="";
        }

        return permissao;

    }

     function calculaIdade(dataNascimento){
        var idade;
        var d = new Date;
        //console.log(dataNascimento);
        //console.log(d);
        idade = d.getFullYear() - dataNascimento.getFullYear();
        if ( new Date(d.getFullYear(), d.getMonth(), d.getDate()) < 
            new Date(d.getFullYear(), dataNascimento.getMonth(), dataNascimento.getDate()) )
            idade--;
        return idade;
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

    function Rg(v){
        v=v.replace(/\D/g,"");
        //v=v.replace(/(\d{2})(\d)/,"$1.$2");
        //v=v.replace(/(\d{3})(\d)/,"$1.$2");
        //v=v.replace(/(\d{3})(\d{1})$/,"$1-$2");
        return v;
    }

    function Cpf(v){
        v=v.replace(/\D/g,"");
        //v=v.replace(/(\d{3})(\d)/,"$1.$2")
		//v=v.replace(/(\d{3})(\d)/,"$1.$2")
		//v=v.replace(/(\d{3})(\d{1,2})$/,"$1-$2")
        return v;
    }

    function Cep(v){
        v=v.replace(/\D/g,"");
        //v=v.replace(/^(\d{2})(\d)/,"$1.$2")
		//v=v.replace(/\.(\d{3})(\d)/,".$1-$2")
        return v;
    }

    function Moeda(v){
        v=v.replace(/\D/g,"");
        v=v.replace(/([0-9]{2})$/g, ".$1")
		/*if( v.length > 6 )
            v = v.replace(/([0-9]{3}),([0-9]{2}$)/g, ".$1,$2");
        return v;
    }

     function Telefone (v){
        v=v.replace(/\D/g,"");             //Remove tudo o que não é dígito
        //v=v.replace(/^(\d{2})(\d)/g,"($1) $2"); //Coloca parênteses em volta dos dois primeiros dígitos
        //v=v.replace(/(\d)(\d{4})$/,"$1-$2");    //Coloca hífen entre o quarto e o quinto dígitos
        return v;
    }
*//*}
    function id( el ){
        return document.getElementById( el );
    }
    window.onload = function(){
        id('rgcrianca').onkeyup = function(){
            mascara( this, Rg );
        }

        id('cpfcrianca').onkeyup = function(){
            mascara( this, Cpf );
        }

        id('cpfcrianca').onkeyup = function(){
            mascara( this, Cep );
        }

        id('salarioresp1').onkeyup = function(){
            mascara( this, Moeda );
        }

        id('tel1resp1').onkeyup = function(){
            mascara( this, Telefone );
        }

        id('tel2resp1').onkeyup = function(){
            mascara( this, Telefone );
        }

        id('tel1resp2').onkeyup = function(){
            mascara( this, Telefone );
        }

        id('tel2resp2').onkeyup = function(){
            mascara( this, Telefone );
        }
        
        id('salarioresp2').onkeyup = function(){
            mascara( this, Moeda );
        }

        id('cpfresp2').onkeyup = function(){
            mascara( this, Cpf );
        }

        id('rgresp2').onkeyup = function(){
            mascara( this, Rg );
        }
    }
    */
