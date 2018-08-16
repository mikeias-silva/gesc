<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
  
  <!-- =========== Trecho ABAIXO que nao esta sendo utilizado mais ======= -->
    
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
   
    <script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
   
   
   
  <!-- =========== Trecho ACIMA que nao esta sendo utilizado mais ======= -->
   



   <!--  <script src="{{ asset('js/app.js') }}" defer></script>
   -->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

   <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
   
    <link rel="stylesheet" href="/css/style.css">
    
    <title>GESC - Gerenciamento de Serviço de Convivência</title>
</head>
    <body>
        <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap shadow">
            <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">GESC</a>
        </nav>
        <div class="container-fluid">
            <div class="row">
                <nav class=" col-md-2 d-none d-md-block bg-light sidebar">
                    <div class="sidebar-sticky">
                        <ul class="nav flex-column">
                            <li>
                                <a class="nav-link disabled" href="dashboard">
                                        <i class="fa fa-home fa-2x"></i> Dashboard
                                    <span class="sr-only">(current)</span>
                                </a>
                            </li>
                            <li>
                                <a class="nav-link disabled" href="matriculas">
                                        <i class="fa fa-address-book fa-2x"></i>
                                        Matriculas
                                    <span class="sr-only">(current)</span>
                                </a>
                            </li>
                            <li>
                                <a class="nav-link disabled" href="instituicao">
                                        <i class="fa fa-bank fa-2x"></i>
                                         Instituição
                                    <span class="sr-only">(current)</span>
                                </a>
                            </li>
                            <li>
                                <a class="nav-link disabled" href="/cras">
                                    <i class="fa fa-university fa-2x"></i>
                                     CRAS/CREAS
                                    <span class="sr-only">(current)</span>
                                </a>
                            </li>
                            <li>
                                <a class="nav-link disabled" href="/turmas">
                                    <i class="fa fa-teacher fa-2x"></i>
                                     Turmas
                                    <span class="sr-only">(current)</span>
                                </a>
                            </li>
                                <a class="nav-link disabled" href="/usuarios">
                                    <i class="fa fa-user-plus fa-2x" ></i>
                                     Gerenciamento de Usuário
                                    <span class="sr-only">(current)</span>
                                </a>
                            </li>
                            <li>
                                <a class="nav-link disabled" href="/vagas">
                                    <i class="fa fa-user-plus fa-2x" ></i>
                                     Gerenciamento de Vagas
                                    <span class="sr-only">(current)</span>
                                </a>
                            </li>

                            <li>
                                <a class="nav-link disabled" href="/controle_frequencia">
                                    <i class="fa fa-graduation-cap fa-2x" ></i>
                                     Controle de Frequência
                                    <span class="sr-only">(current)</span>
                                </a>
                            </li>

                        </ul>

                    </div>
                </nav>
            </div>
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                    <div style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;" class="chartjs-size-monitor">
                        <div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                            <div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div>
                        </div>
                        <div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                            <div style="position:absolute;width:200%;height:200%;left:0; top:0"></div>
                        </div>
                    </div>       
                @yield('conteudo')

            </main>

<script>

$('#editar').on('show.bs.modal', function (event) {
    console.log('modal opened');
    var button = $(event.relatedTarget) 
    var nome = button.data('mytitle')
    var telefone = button.data('mytelefone') 
    var id = button.data('myid')
    var statuscras = button.data('mystatuscras')
    var modal = $(this)
    modal.find('.modal-body #nomecras').val(nome)
    modal.find('.modal-body #telefone').val(telefone)
    modal.find('.modal-body #statuscras').val(statuscras)
    modal.find('.modal-body #idcras').val(id);

});

$('#excluir').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) 
    var id = button.data('myid') 
    var modal = $(this)
   // modal.find('.modal-body #crasId').val(id);
    modal.find('.modal-body #idcras').val(id);
    console.log(id);
    console.log("EXCLUIR modal");
    
});
$('#excluirturma').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) 
    var id = button.data('myid') 
    var modal = $(this)
   // modal.find('.modal-body #crasId').val(id);
    modal.find('.modal-body #idturma').val(id);
    console.log(id);
    console.log("EXCLUIR modal turma");
    
});

$('#editarturma').on('show.bs.modal', function (event) {
    console.log('modal opened');
    var button = $(event.relatedTarget) 
    var nome = button.data('mygrupo')
    var turno = button.data('myturno')
    var educador = button.data('myeducador') 
    var id = button.data('myid') 
    var modal = $(this)
    console.log(educador.value);
    modal.find('.modal-body #GrupoConvivencia').val(nome)
    modal.find('.modal-body #turno').val(turno)
    modal.find('.modal-body #educador').val(educador)
    modal.find('.modal-body #idturma').val(id)

});

/*
    Valicações de usuários

*/

$('#incluirusuario').on('hidden.bs.modal', function (event) {
    $(this).find('input:text').val('');
    document.getElementById("adm").checked = true;
    document.getElementById("msgemail").innerHTML="";
    document.getElementById("msgnomeusuario").innerHTML="";
    document.getElementById("msgsenha").innerHTML="";
    document.getElementById("msgnome").innerHTML="";
});

$('#editarusuario').on('hidden.bs.modal', function (event) {
    $(this).find('input:text').val('');
    document.getElementById("msgemail_edit").innerHTML="";
    document.getElementById("msgnomeusuario_edit").innerHTML="";
    document.getElementById("msgsenha_edit").innerHTML="";
    document.getElementById("msgnome_edit").innerHTML="";
});

$('#editarusuario').on('show.bs.modal', function (event) {
    console.log('modal opened');
    var button = $(event.relatedTarget) 
    var nome = button.data('mynome')  
    var id = button.data('myid')
    var nomeusuario = button.data('mynomeusuario')
    var senha = button.data('mysenha')
    var tipousuario = button.data('mytipousuario') 
    var email = button.data('myemail') 
    console.log(tipousuario);
    var modal = $(this)
    modal.find('.modal-body #nome').val(nome)
    modal.find('.modal-body #senha').val(senha)
    modal.find('.modal-body #nomeusuario').val(nomeusuario)
    modal.find('.modal-body #nomeUsuarioAtual').val(nomeusuario)
    modal.find('.modal-body #email').val(email)
    modal.find('.modal-body #idusuario').val(id)
    if (tipousuario=="Administrador"){
        document.getElementById("Admin").checked = true;
        console.log("ADM");
    }else if (tipousuario=="Educador"){
        console.log("EDU");
        document.getElementById("Edu").checked = true;
    }});

$('#inativar').on('show.bs.modal', function (event) {
    console.log("Modal aberta");
    var button = $(event.relatedTarget) 
    var id = button.data('myid') 
    var modal = $(this)
   // modal.find('.modal-body #crasId').val(id);
    modal.find('.modal-body #id').val(id);
    
    console.log(id);
});

    $('#ativar').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) 
    var id = button.data('myid') 
    var modal = $(this)
   // modal.find('.modal-body #crasId').val(id);
    modal.find('.modal-body #id').val(id);
    console.log(id);
});

function validar(nome, senha, email, nomeusuario, listaUsuario) {
    //console.log(listaUsuario.value);
    var i, array_user;
    var cont=0;
    array_user = listaUsuario.value.split("|");
    var permissao = true;
    var formulario = document.register;
    var tesNome = nome.value;
    var tesSenha = senha.value;
    var tesEmail = email.value;
    var tesNomeUsuario = nomeusuario.value;
    usuario = email.value.substring(0, email.value.indexOf("@"));
    dominio = email.value.substring(email.value.indexOf("@")+ 1, email.value.length);

    for (i in array_user){
        if(array_user[i]==tesNomeUsuario){
            console.log(array_user[i]);
            cont++;
        }
    }

    if (tesNome == "") {
        document.getElementById("msgnome").innerHTML="<font color='red'>Preencha o campo com seu nome</font>";
        console.log('Preencha o campo com seu nome');
        //alert('Preencha o campo com seu nome');
        //document.getElementById("msgnome").innerHTML="O campo nome é obrigatório";
        permissao = false;
    } else {
        document.getElementById("msgnome").innerHTML="";
    }

    if (tesSenha == "") {
        document.getElementById("msgsenha").innerHTML="<font color='red'>Preencha o campo senha</font>";
        console.log('Preencha o campo senha');
        permissao = false;
    } else {
        document.getElementById("msgsenha").innerHTML="";
    }

    if (tesEmail == "") {
        document.getElementById("msgemail").innerHTML="<font color='red'>Informe o email</font>";
        //console.log('Preencha o campo senha');
        permissao = false;
    } else if ((usuario.length >=1) &&
            (dominio.length >=3) && 
            (usuario.search("@")==-1) && 
            (dominio.search("@")==-1) &&
            (usuario.search(" ")==-1) && 
            (dominio.search(" ")==-1) &&
            (dominio.search(".")!=-1) &&      
            (dominio.indexOf(".") >=1)&& 
            (dominio.lastIndexOf(".") < dominio.length - 1)) {
                document.getElementById("msgemail").innerHTML="";
                //alert("E-mail valido");
                console.log("E-mail valido");
    } else {
        document.getElementById("msgemail").innerHTML="<font color='red'>E-mail inválido </font>";
        permissao = false;
    }

    if (tesNomeUsuario == "") {
        document.getElementById("msgnomeusuario").innerHTML="<font color='red'>Informe o nome de usuário</font>";
        console.log('Preencha o campo nome usuário');
        permissao = false;
    } else if (cont>0){
        document.getElementById("msgnomeusuario").innerHTML="<font color='red'>Nome de usuário já cadastrado, por favor informe outro</font>";
        console.log('Nome de usuário repetido');
        permissao = false;
    } else {
        document.getElementById("msgnomeusuario").innerHTML="";
    }

    return permissao;
}

function validarEditar(nome, senha, email, nomeusuario, listaUsuario, nomeUsuarioAtual) {
    var i, array_user;
    var cont=0;
    array_user = listaUsuario.value.split("|");
    var permissao = true;
    var formulario = document.register;
    var tesNome = nome.value;
    var tesSenha = senha.value;
    var tesEmail = email.value;
    var tesNomeUsuario = nomeusuario.value;
    var tesNomeUsuarioAtual = nomeUsuarioAtual.value;
    usuario = email.value.substring(0, email.value.indexOf("@"));
    dominio = email.value.substring(email.value.indexOf("@")+ 1, email.value.length);
    console.log(tesNomeUsuarioAtual);
    for (i in array_user){
        if(array_user[i]==tesNomeUsuario){
            console.log(array_user[i]);
            cont++;
        }
    }
    if (tesNome == "") {
        document.getElementById("msgnome_edit").innerHTML="<font color='red'>Preencha o campo com seu nome</font>";
        console.log('Preencha o campo com seu nome');
        //alert('Preencha o campo com seu nome');
        //document.getElementById("msgnome").innerHTML="O campo nome é obrigatório";
        permissao = false;
    } else {
        document.getElementById("msgnome_edit").innerHTML="";
    }

    if (tesSenha == "") {
        document.getElementById("msgsenha_edit").innerHTML="<font color='red'>Preencha o campo senha</font>";
        console.log('Preencha o campo senha');
        permissao = false;
    } else {
        document.getElementById("msgsenha_edit").innerHTML="";
    }

    if (tesEmail == "") {
        document.getElementById("msgemail_edit").innerHTML="<font color='red'>Informe o email</font>";
        //console.log('Preencha o campo senha');
        permissao = false;
    } else if ((usuario.length >=1) &&
            (dominio.length >=3) && 
            (usuario.search("@")==-1) && 
            (dominio.search("@")==-1) &&
            (usuario.search(" ")==-1) && 
            (dominio.search(" ")==-1) &&
            (dominio.search(".")!=-1) &&      
            (dominio.indexOf(".") >=1)&& 
            (dominio.lastIndexOf(".") < dominio.length - 1)) {
                document.getElementById("msgemail_edit").innerHTML="";
                //alert("E-mail valido");
                console.log("E-mail valido");
    } else {
        document.getElementById("msgemail_edit").innerHTML="<font color='red'>E-mail inválido </font>";
        permissao = false;
    }

    if (tesNomeUsuario == "") {
        document.getElementById("msgnomeusuario_edit").innerHTML="<font color='red'>Informe o nome de usuário</font>";
        console.log('Preencha o campo nome usuário');
        permissao = false;
    } else if(cont>1 && tesNomeUsuarioAtual!=tesNomeUsuario){
        document.getElementById("msgnomeusuario_edit").innerHTML="<font color='red'>Nome de usuário já cadastrado, por favor informe outro</font>";
        console.log('Nome de usuário repetido');
        permissao = false;
    } else {
        document.getElementById("msgnomeusuario_edit").innerHTML="";
    }

    return permissao;
}

/*function validacaoEmail(field) {
    usuario = field.value.substring(0, field.value.indexOf("@"));
    dominio = field.value.substring(field.value.indexOf("@")+ 1, field.value.length);
    
    if ((usuario.length >=1) &&
        (dominio.length >=3) && 
        (usuario.search("@")==-1) && 
        (dominio.search("@")==-1) &&
        (usuario.search(" ")==-1) && 
        (dominio.search(" ")==-1) &&
        (dominio.search(".")!=-1) &&      
        (dominio.indexOf(".") >=1)&& 
        (dominio.lastIndexOf(".") < dominio.length - 1)) {
    document.getElementById("msgemail").innerHTML="";
    document.getElementById("salvar").disabled=false;
    //alert("E-mail valido");
    console.log("E-mail valido");
    }
    else{
    document.getElementById("msgemail").innerHTML="<font color='red'>E-mail inválido </font>";
    if(!document.getElementById("salvar").disabled) document.getElementById("salvar").disabled=true;
    //alert("E-mail invalido");
}
}*/

/*
    validações de cras e cras
*/

$('#inativar').on('show.bs.modal', function (event) {
    console.log("Modal aberta");
    var button = $(event.relatedTarget) 
    var id = button.data('myid') 
    var modal = $(this)
   // modal.find('.modal-body #crasId').val(id);
    modal.find('.modal-body #idmatricula').val(id);
    
});

</script>


</body>

</html>