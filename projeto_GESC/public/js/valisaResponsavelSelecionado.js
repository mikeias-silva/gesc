function validaSelecao(){
    var permissao = true;
    var aux = 0;
    var checkResponsavel = document.getElementsByName("idresponsavel[]");
    for (var i=0; i < checkResponsavel.length; i++){
        if ((checkResponsavel[i].checked)) {
            aux++;
        }
    }

    if(aux<1){
        document.getElementById("msgValidaSelec").innerHTML="<font color='red'>É necessário seleciona ao menos um responsável para efetuar a matrícula</br></font>";
        permissao = false;
    } else if (aux >2){
        document.getElementById("msgValidaSelec").innerHTML="<font color='red'>Só pode ser selecionado no máximo dois responsáveis</br></font>";
        permissao = false;
    } else {
        document.getElementById("msgValidaSelec").innerHTML="";
    }

    return permissao;
}