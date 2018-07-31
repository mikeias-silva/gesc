@extends('layout.principal') 
@extends('matricula.identificacao')
@section('conteudo')

<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" id="identificacao-tab" data-toggle="tab" href="#identificacao" role="tab" aria-controls="identificacao" aria-selected="true">Identificação</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="responsavel-tab" data-toggle="tab" href="#responsavel" role="tab" aria-controls="responsavel" aria-selected="false">Responsável</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="familia-tab" data-toggle="tab" href="#familia" role="tab" aria-controls="familia" aria-selected="false">Constituição Familiar</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="conclusao-tab" data-toggle="tab" href="#conclusao" role="tab" aria-controls="conclusao" aria-selected="false">Conclusao</a>
    </li>
</ul>

<div class="tab-content" id="myTabContent">
    <!--ABA IDENTIFICAÇÃO -->
    <div class="tab-pane fade show active" id="identificacao" role="tabpanel" aria-labelledby="identificacao-tab">
    
        
    <div id="identmatricula">

    <form   onsubmit="return validarMatricula(matriculaNova.nomecrianca, matriculaNova.datanascimentocrianca, matriculaNova.rgcrianca,
    matriculaNova.cpfcrianca, matriculaNova.cep, matriculaNova.logradouro, matriculaNova.bairro);" name="matriculaNova">
            <div class="form-group ">
            {{ csrf_field() }}
            <div class="form-group" >
                <label>Nome</label>
                <input type="text" class="form-control" name="nomecrianca" maxlength="255" autocomplete="off">
                <spam id="msgNomeCrianca"></spam>
            </div>

                
            <div class="form-group">
                <label>Nascimento</label>
                <input type="date" class="form-control" name="datanascimentocrianca">
                <spam id="msgDataNascimento"></spam>
            </div>

            <div class="form-group">
                <label>Sexo</label>
                <select name="sexocrianca" id="" class="custom-select" value="">
                    <option value="M">Masculino</option>
                    <option value="F">Feminino</option>
                </select>
            </div>

            <div class="form-group">
                <label>RG</label>
                <input type="text" class="form-control" id="rgcrianca" name="rgcrianca" onkeyup="mascara(this, Rg);" maxlength="9" autocomplete="off">
                <spam id="msgRg"></spam>
            </div>

            <div class="form-group">
                <label>CPF</label>
                <input type="text" class="form-control" name="cpfcrianca" id="cpfcrianca" maxlength="11" autocomplete="off" onkeyup="mascara(this, Cpf);">
                <spam id="msgCpf"></spam>
            </div>

            <div class="form-group">
                <label>CEP</label>
                <input type="text" class="form-control" name="cep" id="cep" maxlength="8" autocomplete="off" onkeyup="mascara(this, Cep);">
                <spam id="msgCep"></spam>
            </div>

            <div class="form-group">
                <label>Endereço</label>
                <input type="text" class="form-control" name="logradouro" maxlength="255" autocomplete="off">
                <spam id="msgEndereco"></spam>
            </div>

            <div class="form-group">
                <label>Bairro</label>
                <input type="text" class="form-control" name="bairro" maxlength="255" autocomplete="off">
                <spam id="msgBairro"></spam>
            </div>

            <div class="form-group ">
                <label>Complemento</label>
                <input type="text" class="form-control" name="complemento" maxlength="255" autocomplete="off">
            </div>

            <div class="form-group">
                <label>CRAS/CREAS</label>
                <select name="cras" id="" class="custom-select" name="cras">
                    @foreach($cras as $c)
                        <option value="{{ $c->id}}">{{ $c->nomeCras }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>publico priritario</label>
                <select name="pprioritario" id="" class="custom-select">
                    @foreach($pprioritario as $p)
                        <option value="{{ $p->idpublicoprioritario }}">{{ $p->publicoprioritario }}</option>
                    @endforeach

                    
                </select>
            </div>

            

            <div class="form-group">
                <label>Escola</label>
                <select name="escola" id="" class="custom-select" >
                    @foreach($escola as $e)
                        <option value="{{ $e->idescola }}">{{ $e->nomeescola }}</option>
                    @endforeach
                </select>

            </div>

            <div class="form-group">
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

            <div class="form-group ">
                <label>Observações de Saúde</label>
                <textarea name="obssaude" id="" cols="10" rows="2" class="form-control" maxlength="255" autocomplete="off"></textarea>
            </div>

        </div>
    </div>

    </div>

    <!-- ABA RESPONSÁVEL -->
    <div class="tab-pane fade" id="responsavel" role="tabpanel" aria-labelledby="responsavel-tab">
        <div class="form">
        <h2>Responsável 01</h2>
        <label>Nome</label>
        <input class="form-control" type="text" name="nomeresp1" >
        
        <label>Sexo</label>
        <select class="form-control" name="sexoresp1" id="">
            <option value="M">Masculino</option>
            <option value="F">Feminino</option>
        </select>
        

        <label>Data de Nascimento</label>
        <input type="date" class="form-control" name="datanascimentoresp1">

        <label>RG</label>
        <input type="text" class="form-control" name="rgresp1">

        <label>CPF</label>
        <input type="text" class="form-control" name="cpfresp1">
        
        <label>Estado Civil</label>
        <select class="form-control" name="estadocivilresp1" id="">
            <option value="1">Solteiro</option>
            <option value="2">Casado</option>
            <option value="3">Divorciado</option>
            <option value="4">Viúvo</option>
            <option value="5">Separado</option>
        </select>


        <label>Profissão</label>
        <input type="text" class="form-control" name="profissaoresp1">

        <label>Salário</label>
        <input type="number" class="form-control" name="salarioresp1">

        <label>Local de Trabalho</label>
        <input type="text" class="form-control" name="trabalhoresp1">

        <label>Escolaridade</label>
        <select class="form-control" name="escolaridaderesp1" id="">
            <option value="1">Ensino Fundamental Incompleto</option>
            <option value="2">Ensino Fundamental Completo</option>
            <option value="3">Ensino Médio Incompleto</option>
            <option value="4">Ensino Médio Completo</option>
            <option value="5">Ensino Superior Incompleto</option>
            <option value="6">Ensino Superior Completo</option>
        </select>

        <div class="form-group ">
            <label>Telefone</label>
            <input type="number" class="form-control" name="tel1resp1">
        </div>
        <div class="form-group ">
            <label>Telefone 2</label>
            <input type="number" class="form-control" name="tel2resp1">
        </div>

        <label>Observações</label>
        <textarea name="obsresp1" id="" cols="10" rows="2" class="form-control"></textarea>

        <div class="container" id="meio">

        </div>
            
        <h2>Responsável 02</h2>
        <label>Nome:</label>
        <input class="form-control" type="text" name="nomeresp2" id="nomeresp">

        <div class="form-group" >
                <label>Sexo</label>
                <select class="form-control" name="sexoresp2" id="">
                    <option value="M">Masculino</option>
                    <option value="F">Feminino</option>
                </select>
        </div>

        <label>Data de Nascimento</label>
        <input type="date" class="form-control" name="datanascimentoresp2">

        <label>RG</label>
        <input type="text" class="form-control" name="rgresp2">

        <label>CPF</label>
        <input type="text" class="form-control" name="cpfresp2">
        
        <label>Estado Civil</label>
        <select class="form-control" id="" name="estadocivilresp2">
            <option value="1">Solteiro</option>
            <option value="2">Casado</option>
            <option value="3">Divorciado</option>
            <option value="4">Viúvo</option>
            <option value="5">Separado</option>
        </select>

        <label>Profissão</label>
        <input type="text" class="form-control" name="profissaoresp2">

        <label>Salário</label>
        <input type="number" class="form-control" name="salarioresp2">

        <label>Local de Trabalho</label>
        <input type="text" class="form-control" name="trabalhoresp2">

        <label>Escolaridade</label>
        <select class="form-control" id="" name="escolaridaderesp2">
                <option value="1">Ensino Fundamental Incompleto</option>
                <option value="2">Ensino Fundamental Completo</option>
                <option value="3">Ensino Médio Incompleto</option>
                <option value="4">Ensino Médio Completo</option>
                <option value="5">Ensino Superior Incompleto</option>
                <option value="6">Ensino Superior Completo</option>
        </select>

        <label>Telefone 1</label>
        <input type="tel" class="form-control" name="tel1resp2">

        <label>Telefone 2</label>
        <input type="tel" class="form-control" name="tel2resp2">

        <label>Observações</label>
        <textarea name="obsresp2" id="" cols="10" rows="2" class="form-control"></textarea>
    
        </div>
    </div>

    <!-- ABA FAMILIA -->
    <div class="tab-pane fade" id="familia" role="tabpanel" aria-labelledby="familia-tab">
        <div>
        <label>Número do NIS</label>
        <input type="text" class="form-control" name="numnis">

        <label>Moradia</label>
        <select class="form-control" name="moradia" id="">
            <option value="1">Alugada</option>
            <option value="2">Cedida</option>
            <option value="3">Prórpia</option>
        </select>

        
        <!-- radio buttons -->
        <span>Tipo Habitação</span>
        <div class="form-check">
            <label class="form-check-label" for="rd-alvenaria">
                <input type="radio" class="form-check-input" id="rd-alvenaria" name="tipohabitacao" value="alvenaria">Alvenaria
            </label>
        </div>
        <div class="form-check">
            <label class="form-check-label" for="rd-madeira">
                <input type="radio" class="form-check-input" id="rd-madeira" name="tipohabitacao" value="madeira">Madeira
            </label>
        </div>
        <div class="form-check">
            <label class="form-check-label" for="rd-mista">
                <input type="radio" class="form-check-input" id="rd-mista" name="tipohabitacao" value="Mista">Mista
            </label>
        </div>
                
        <!-- checkboxes -->
        <span>Programas Sociais</span>
        <div class="form-check">
            <label class="form-check-label">
                <input type="checkbox" class="form-check-input" name="arearisco" value="1">Area de risco
            </label>
        </div>

        <div class="form-check">
            <label class="form-check-label">
                <input type="checkbox" class="form-check-input" name="bolsafamilia" value="1">Bolsa Familia
            </label>
        </div>

        <div class="form-check">
            <label class="form-check-label">
                <input type="checkbox" class="form-check-input" name="beneficiopc" value="1">Benefício Pessoa Continuada
            </label>
        </div>
        
        </div>
    </div>

    <!-- CONCLUSÃO -->
    <div class="tab-pane fade" id="conclusao" role="tabpanel" aria-labelledby="responsavel-tab">
        <span>Turma</span>
        <select name="turma" id="" class="form-control">
            @foreach($turmas as $t)
            <option value="{{ $t->idturma }}">{{ $t->GrupoConvivencia }}</option>
            @endforeach
        </select>
    </div>
</div>


    <a href="/matriculas">
        <button class="btn btn-default" id="btn-mat">Cancelar</button>
    </a>
                
        <button type="submit" class="btn btn-primary" id="btn-mat">Confirmar Matricula</button>
    
    </form>

<script>
    function validarMatricula(nomeCrianca, dataNascimentoCrianca, rgCrianca, cpfCrianca, cep, endereco, bairro) {
        var permissao = false;
        var formulario = document.register;
        var tesNomeCrianca = nomeCrianca.value;
        var tesDataNascimentoCrianca = new Date(dataNascimentoCrianca.value+"T03:00:00Z");
        var tesRgCrianca = rgCrianca.value;
        var tesCpfCrianca = cpfCrianca.value;
        var tesCep = cep.value;
        var tesEndereco = endereco.value;
        var tesBairro = bairro.value;
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
    }

</script>
@stop