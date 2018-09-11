@extends('layout.header')
@section('content')
   

    <body>
        <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap shadow">
            <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="/dashboard">
                <h3>GESC</h3>
            </a>
        </nav>
        @yield('login')
        <div class="container-fluid">
            <div class="row">
                <nav class=" col-md-2 d-none d-md-block bg-light sidebar">
                    <div class="sidebar-sticky navbar-collapse">
                        <ul class="nav flex-column">
                               
                            <li class="nav-item active">
                                <a class="nav-link  btn-light" id="menu" href="/dashboard">
                                    <i class="material-icons">home</i> 
                                        Página inicial
                                </a>
                            </li>
                         
                            <li class="nav-item">
                                <a class="nav-link  btn-light" href="" data-toggle="collapse" data-target="#collapseExample" >
                                    <i class="material-icons">library_books</i>
                                        Matriculas
                                </a>
                                <div class="collapse" id="collapseExample">
                                    <div>
                                        <ul> 
                                            <li>
                                                <a class="nav-link btn-light" id="removerlink" href="/listagemResponsaveis">Nova Matrícula
                                                </a>
                                            </li>
                                         
                                            <li>
                                                <a class="nav-link btn-light" id="removerlink" href="/listagemMatriculas">Matriculas atuais
                                                </a>
                                            </li>
                                            
                                            <li >
                                                <a class="nav-link  btn-light" id="removerlink" href="/listagemMatriculas/anteriores">Matriculas anteriores
                                                </a>
                                            </li>
                                             <li >
                                                <a class="nav-link  btn-light" id="removerlink" href="/listagemMatriculas/rematriculas">Rematricula
                                                </a>
                                            </li>
                                        </ul>
                                    </div>

                                </div>
                            </li>
                             <li class="nav-item">
                                <a class="nav-link  btn-light" href="/instituicao">
                                    <i class="material-icons">
                                        account_balance
                                        </i>
                                         Instituição
                                    
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link  btn-light" href="/cras">
                                    <i class="material-icons">
                                        location_city
                                    </i>
                                     CRAS/CREAS
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link btn-light" href="" data-toggle="collapse" data-target="#collapseTurmas" >
                                    <i class="material-icons">school</i>
                                        Controle de Turmas
                                </a>
                                <div class="collapse" id="collapseTurmas">
                                    <div>
                                        <ul> 
                                        <li class="nav-item">
                                            <a class="nav-link btn-light" href="/turmas">
                                               
                                                Turmas
                                            
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link  btn-light" href="/controle_frequencia">
                                                
                                                 Controle de Frequência
                                               
                                            </a>
                                        </li>
            
                                        <li class="nav-item">
                                            <a class="nav-link  btn-light" href="/transferencia_alunos">
                                              
                                                 Transferencia de Alunos
                                               
                                            </a>
                                        </li>
                                    </ul>
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link  btn-light" href="/usuarios">
                                    <i class="material-icons">
                                            person_add
                                    </i>
                                     Controle de Usuário
                                  
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link  btn-light" href="/vagas">
                                    <i class="material-icons">
                                        compare_arrows
                                    </i>
                                     Controle de Vagas
                                   
                                </a>
                            </li>

                           

                            <li class="nav-item">
                                <a class="nav-link  btn-light " href="/fichaFrequencia">
                                    <i class="material-icons">
                                        description
                                    </i>
                                     Ficha de Frequência
                                    
                                </a>
                            </li>

                            <li class="">
                                <a class="nav-link  btn-light" href="/logout">
                                    <i class="material-icons">power_settings_new 
                                    </i>
                                    Sair
                                  <!--   <span>SAIR</span>--> 
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
    //modal.find('.modal-body #password').val(senha)
    modal.find('.modal-body #nomeusuario').val(nomeusuario)
    modal.find('.modal-body #nomeUsuarioAtual').val(nomeusuario)
    modal.find('.modal-body #email').val(email)
    modal.find('.modal-body #id').val(id)
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

    /*if (tesSenha == "") {
        document.getElementById("msgsenha_edit").innerHTML="<font color='red'>Preencha o campo senha</font>";
        console.log('Preencha o campo senha');
        permissao = false;
    } else {
        document.getElementById("msgsenha_edit").innerHTML="";
    }*/

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

    function validarInclusao(nomeCras, telefone) {
    var permissao = true;
    var formulario = document.register;
    var tesNome = nomeCras.value;
    var tesTelefone = telefone.value;

    if (tesNome == "") {
        document.getElementById("msgcras").innerHTML="<font color='red'>Este campo é de preenchimento brigatório</font>";
        permissao = false;
    } else {
        document.getElementById("msgcras").innerHTML="";
    }

    if (tesTelefone == "") {
        document.getElementById("msgtelefone").innerHTML="<font color='red'>Este campo é de preenchimento brigatório</font>";
        permissao = false;
    } else if(tesTelefone.length<10){
        document.getElementById("msgtelefone").innerHTML="<font color='red'>O telefone informado não é válido, por favor verifique</font>";
        permissao = false;
    }
    else {
        document.getElementById("msgtelefone").innerHTML="";
    }

    return permissao;
    
    }

    function validarEdicao(nomeCras, telefone) {
    var permissao = true;
    var formulario = document.register;
    var tesNome = nomeCras.value;
    var tesTelefone = telefone.value;

    if (tesNome == "") {
        document.getElementById("msgcras_edit").innerHTML="<font color='red'>Este campo é de preenchimento brigatório</font>";
        permissao = false;
    } else {
        document.getElementById("msgcras_edit").innerHTML="";
    }

    if (tesTelefone == "") {
        document.getElementById("msgtelefone_edit").innerHTML="<font color='red'>Este campo é de preenchimento brigatório</font>";
        permissao = false;
    } else if(tesTelefone.length<10){
        document.getElementById("msgtelefone_edit").innerHTML="<font color='red'>O telefone informado não é válido, por favor verifique</font>";
        permissao = false;
    }
    else {
        document.getElementById("msgtelefone_edit").innerHTML="";
    }

    return permissao;
    
    }

$('#inativar').on('show.bs.modal', function (event) {
    console.log("Modal aberta");
    var button = $(event.relatedTarget) 
    var id = button.data('myid') 
    var modal = $(this)
   // modal.find('.modal-body #crasId').val(id);
    modal.find('.modal-body #idmatricula').val(id);
    
});
$('#ativar').on('show.bs.modal', function (event) {
    console.log("Modal aberta");
    var button = $(event.relatedTarget) 
    var id = button.data('myid') 
    var modal = $(this)
   // modal.find('.modal-body #crasId').val(id);
    modal.find('.modal-body #idmatricula').val(id);
    
});

</script>


</body>

@stop