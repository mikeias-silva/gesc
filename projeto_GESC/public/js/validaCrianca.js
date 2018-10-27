function validarCrianca(nomecrianca, datanascimentocrianca, rgcrianca, cpfcrianca){
    var permissao = true;
    var nomecrianca = nomecrianca.value;
    var datanascimentocrianca = datanascimentocrianca.value;
    var rgcrianca = rgcrianca.value;
    var cpfcrianca = cpfcrianca.value;
    var hoje = new Date();
    var dataSelecionada = new Date(datanascimentocrianca);

    if(nomecrianca==""){
        document.getElementById("msgNomeCrianca").innerHTML="<font color='red'>Campo obrigatório</font>";
        permissao = false;
    } else {
        document.getElementById("msgNomeCrianca").innerHTML="";
    }

    if(datanascimentocrianca==""){
        document.getElementById("msgDataNascimento").innerHTML="<font color='red'>Campo obrigatório</font>";
        permissao = false;
    } else if(calculaIdade(dataSelecionada)>17){
        document.getElementById("msgDataNascimento").innerHTML="<font color='red'>Idade não pode ser maior que 18 anos, por favor verifique</font>";
        permissao = false;
    } else if(hoje < dataSelecionada){
        document.getElementById("msgDataNascimento").innerHTML="<font color='red'>Data de nascimento inválida, por favor verifique</font>";
        permissao = false;
    }else {
        document.getElementById("msgDataNascimento").innerHTML="";
    }

    if(cpfcrianca!=""){
        if(validarCPF(cpfcrianca)){
            document.getElementById("msgCpf").innerHTML="<font color='red'>O CPF informado não é válido, por favor verifique</font>";
            permissao = false;
        } else {
            document.getElementById("msgCpf").innerHTML="";
        }
    } else {
        document.getElementById("msgCpf").innerHTML="";
    }

    if(rgcrianca!="" && rgcrianca.length < 9){
        document.getElementById("msgRg").innerHTML="<font color='red'>O RG informado não é válido, por favor verifique</font>";
        permissao = false;
    } else {
        document.getElementById("msgRg").innerHTML="";
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

function mascara(o,f){
    v_obj=o
    v_fun=f
    setTimeout("execmascara()",1)
}
function execmascara(){
    v_obj.value=v_fun(v_obj.value)
}
function Cpf(v){
    v=v.replace(/\D/g,"");             //Remove tudo o que não é dígito
    return v;
}

function Rg(v){
    v=v.replace(/\D/g,"");
    //v=v.replace(/^(\d{2})(\d)/,"$1.$2")
    //v=v.replace(/\.(\d{3})(\d)/,".$1-$2")
    return v;
}

addEventListener("keydown", function(event) {
    if (event.keyCode == 112){
        event.preventDefault();
        $("#help").modal("show");  
    }
});
