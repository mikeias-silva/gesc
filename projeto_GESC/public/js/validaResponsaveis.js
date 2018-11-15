function validarDadosResp(nomeresp1, datanascimentoresp1, cpfresp1, rgresp1, tel1resp1, tel2resp1,
    nomeresp2, datanascimentoresp2, cpfresp2, rgresp2, tel1resp2, tel2resp2) {
    var permissao = true;
    var nomeresp1 = nomeresp1.value;
    var datanascimentoresp1 = datanascimentoresp1.value;
    //var logradouro = logradouro.value;
    //var bairro = bairro.value;
    var cpfresp1 = cpfresp1.value;
    var rgresp1 = rgresp1.value;
    var hoje = new Date();
    var dataSelecionada = new Date(datanascimentoresp1);
    var tel1resp1 = tel1resp1.value;
    var tel2resp1 = tel2resp1.value;
    //console.log(hoje);
    //console.log(data2);
    var nomeresp2 = nomeresp2.value;
    var datanascimentoresp2 = datanascimentoresp2.value;
    var cpfresp2 = cpfresp2.value;
    var rgresp2 = rgresp2.value;
    var tel1resp2 = tel1resp2.value;
    var tel2resp2 = tel2resp2.value;


    if(nomeresp1==""){
        document.getElementById("msgNomeResp1").innerHTML="<font color='red'>Campo obrigatório</font>";
        permissao = false;
    } else {
        document.getElementById("msgNomeResp1").innerHTML="";
    }

    if(datanascimentoresp1==""){
        document.getElementById("msgDataResp1").innerHTML="<font color='red'>Campo obrigatório</font>";
        permissao = false;
    } else if(hoje < dataSelecionada){
        document.getElementById("msgDataResp1").innerHTML="<font color='red'>Data de nascimento inválida, por favor verifique</font>";
    } else {
        document.getElementById("msgDataResp1").innerHTML="";
    }

   /* if(logradouro==""){
        document.getElementById("msgEndereco").innerHTML="<font color='red'>Campo obrigatório</font>";
        permissao = false;
    } else {
        document.getElementById("msgEndereco").innerHTML="";
    }*/

    /*if(bairro==""){
        document.getElementById("msgBairro").innerHTML="<font color='red'>Campo obrigatório</font>";
        permissao = false;
    } else {
        document.getElementById("msgBairro").innerHTML="";
    }*/

    if(cpfresp1!=""){
        if(validarCPF(cpfresp1)){
            document.getElementById("msgCpfResp1").innerHTML="<font color='red'>O CPF informado não é válido, por favor verifique</font>";
            permissao = false;
        } else {
            document.getElementById("msgCpfResp1").innerHTML="";
        }
    } else {
        document.getElementById("msgCpfResp1").innerHTML="";
    }

    if(rgresp1!="" && rgresp1.length < 8){
        document.getElementById("msgRgResp1").innerHTML="<font color='red'>O RG informado não é válido, por favor verifique</font>";
        permissao = false;
    } else {
        document.getElementById("msgRgResp1").innerHTML="";
    }

    if(tel1resp1!="" && tel1resp1.length < 8){
        document.getElementById("msgTel1Resp1").innerHTML="<font color='red'>O telefone informado não é válido, por favor verifique</font>";
        permissao = false;
    } else {
        document.getElementById("msgTel1Resp1").innerHTML="";
    }

    if(tel2resp1!="" && tel2resp1.length < 8){
        document.getElementById("msgTel2Resp1").innerHTML="<font color='red'>O RG telefone não é válido, por favor verifique</font>";
        permissao = false;
    } else {
        document.getElementById("msgTel2Resp1").innerHTML="";
    }
    //resp 2
    if(nomeresp2!="" || datanascimentoresp2!=""  || cpfresp2!="" || rgresp2!="" || tel1resp2!="" || tel2resp2!="" ){

        if(nomeresp2==""){
            document.getElementById("msgNomeResp2").innerHTML="<font color='red'>Campo obrigatório</font>";
            permissao = false;
        } else {
            document.getElementById("msgNomeResp2").innerHTML="";
        }
    
        if(datanascimentoresp2==""){
            document.getElementById("msgDataResp2").innerHTML="<font color='red'>Campo obrigatório</font>";
            permissao = false;
        } else if(hoje < dataSelecionada){
            document.getElementById("msgDataResp2").innerHTML="<font color='red'>Data de nascimento inválida, por favor verifique</font>";
        } else {
            document.getElementById("msgDataResp2").innerHTML="";
        }

        if(cpfresp2!=""){
            if(validarCPF(cpfresp2)){
                document.getElementById("msgCpfResp2").innerHTML="<font color='red'>O CPF informado não é válido, por favor verifique</font>";
                permissao = false;
            } else {
                document.getElementById("msgCpfResp2").innerHTML="";
            }
        } else {
            document.getElementById("msgCpfResp2").innerHTML="";
        }
    
        if(rgresp2!="" && rgresp2.length < 8){
            document.getElementById("msgRgResp2").innerHTML="<font color='red'>O RG informado não é válido, por favor verifique</font>";
            permissao = false;
        } else {
            document.getElementById("msgRgResp2").innerHTML="";
        }
    
        if(tel1resp2!="" && tel1resp2.length < 8){
            document.getElementById("msgTel1Resp2").innerHTML="<font color='red'>O telefone informado não é válido, por favor verifique</font>";
            permissao = false;
        } else {
            document.getElementById("msgTel1Resp2").innerHTML="";
        }
    
        if(tel2resp2!="" && tel2resp1.length < 8){
            document.getElementById("msgTel2Resp2").innerHTML="<font color='red'>O RG telefone não é válido, por favor verifique</font>";
            permissao = false;
        } else {
            document.getElementById("msgTel2Resp2").innerHTML="";
        }
    }

    return permissao;
}

function validarCPF(cpf) {	
	cpf = cpf.replace(/[^\d]+/g,'');	
	if(cpf == '') return true;	
	// Elimina CPFs invalidos conhecidos	
	if (cpf.length != 11 || 
		cpf == "00000000000" || 
		cpf == "11111111111" || 
		cpf == "22222222222" || 
		cpf == "33333333333" || 
		cpf == "44444444444" || 
		cpf == "55555555555" || 
		cpf == "66666666666" || 
		cpf == "77777777777" || 
		cpf == "88888888888" || 
		cpf == "99999999999")
			return true;		
	// Valida 1o digito	
	add = 0;	
	for (i=0; i < 9; i ++)		
		add += parseInt(cpf.charAt(i)) * (10 - i);	
		rev = 11 - (add % 11);	
		if (rev == 10 || rev == 11)		
			rev = 0;	
		if (rev != parseInt(cpf.charAt(9)))		
			return true;		
	// Valida 2o digito	
	add = 0;	
	for (i = 0; i < 10; i ++)		
		add += parseInt(cpf.charAt(i)) * (11 - i);	
	rev = 11 - (add % 11);	
	if (rev == 10 || rev == 11)	
		rev = 0;	
	if (rev != parseInt(cpf.charAt(10)))
		return true;		
	return false;   
}

//mascaras
function mascara(o,f){
    v_obj=o
    v_fun=f
    setTimeout("execmascara()",1)
}
function execmascara(){
    v_obj.value=v_fun(v_obj.value)
}
function cpf(v){
    v=v.replace(/\D/g,"");             //Remove tudo o que não é dígito
    return v;
}

function Cep(v){
    v=v.replace(/\D/g,"");
    //v=v.replace(/^(\d{2})(\d)/,"$1.$2")
    //v=v.replace(/\.(\d{3})(\d)/,".$1-$2")
    return v;
}

function Rg(v){
    v=v.replace(/\D/g,"");
    //v=v.replace(/^(\d{2})(\d)/,"$1.$2")
    //v=v.replace(/\.(\d{3})(\d)/,".$1-$2")
    return v;
}

function Telefone(v){
    v=v.replace(/\D/g,"");             //Remove tudo o que não é dígito
    return v;
}

function id( el ){
    return document.getElementById( el );
}
window.onload = function(){
    id('cpfresp1').onkeyup = function(){
        mascara( this, cpf );
    }

    id('cep').onkeyup = function(){
        mascara( this, Cep );
    }

    id('rgresp1').onkeyup = function(){
        mascara( this, Rg );
    }

    //recuperaData();
}

function recuperaData() {
    var dtToday = new Date();
    var month = dtToday.getMonth() + 1;     // getMonth() is zero-based
    var day = dtToday.getDate();
    var year = dtToday.getFullYear();
    if(month < 10)
    month = '0' + month.toString();
    if(day < 10)
    day = '0' + day.toString();

    var maxDate = year + '-' + month + '-' + day;
    $('#datanascimentoresp1').attr('max', maxDate);
    $('#datanascimentoresp2').attr('max', maxDate);
}

addEventListener("keydown", function(event) {
    if (event.keyCode == 112){
        event.preventDefault();
        $("#help").modal("show");  
    }
});