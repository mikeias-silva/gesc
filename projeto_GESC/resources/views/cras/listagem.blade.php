@extends('layout.principal') 
@section('conteudo')

<h1 class="text">CRAS E CREAS </h1>
@if(empty($cras))
    <div class="alert alert-danger">
        Você não tem nenhum CRAS ou CREAS cadastrado.
    </div>

@elseif(!empty($cras))
<table class="table table-striped">
    <thead>
        <tr>
            <th>Nome</th>
            <th>Telefone</th>
            <th>Opções</th>

        </tr>
    </thead>
    @foreach ($cras as $c)
    <tr>
        <td> {{ $c->nomecras }} </td>
        <td> {{ $c->telefone }} </td>
        <td>
            <button type="button" class="btn btn-info" data-mytitle="{{ $c->nomecras }}" data-mytelefone="{{ $c->telefone }}"
                 data-myid="{{ $c->id }}" data-mystatuscras="{{ $c->statuscras }}" data-toggle="modal" data-target="#editar">Editar</button>

            @if($c->statuscras=='1')     
            <button type="button" class="btn btn-danger" data-mytitle="{{ $c->nomecras }}" 
                data-myid="{{ $c->id }}" 
                data-toggle="modal" data-target="#inativar">Inativar</button>
            @else
            <button type="button" class="btn btn-danger" data-mytitle="{{ $c->nomecras }}" 
                data-myid="{{ $c->id }}" 
                data-toggle="modal" data-target="#ativar">Ativar</button>
            @endif
       

        </td>
    </tr>
    @endforeach
</table>
@endif
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Novo
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Novo CRAS ou CREAS</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">

                <form class="form" action="/cras/adiciona" method="post" name="incluirCras"
                onsubmit="return validarInclusao(incluirCras.nomecras, incluirCras.telefone);">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="statuscras" value="1">

                    <label>Nome</label>
                    <input name="nomecras" class="form-control" type="text" value="" maxlength="255" autocomplete="off" >
                    <label id="msgcras"></label>
                    </br>
                    <label>Telefone</label>
                    <input name="telefone" id="telefone" class="form-control" maxlength="15" autocomplete="off" onkeyup="mascara( this, mtel );">
                    <label id="msgtelefone"></label>
                    </br>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Confirmar</button>
                    </div>
                </form>

            </div>

        </div>
    </div>
</div>

<!-- Modal Center modal de inativacao-->
<div class="modal fade" id="inativar" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title text-center" id="exampleModalCenterTitle">Atenção!!!</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>
            
            <form action="cras/remove" method="post">
                <div class="modal-body">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <input type="hidden" name="id" id="id" type="text" value="">

                    <h5>Você tem certeza que deseja realmente inativar este CRAS/CREAS?</h5>
                    <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-danger">Inativar</button>
            
                    </div>
                </div>
            </form>
            
            
        </div>
    </div>
</div>

<!-- Modal Center modal de ativacao-->
<div class="modal fade" id="ativar" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title text-center" id="exampleModalCenterTitle">Atenção!!!</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>
            
            <form action="/cras/ativar" method="post">
                <div class="modal-body">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <input type="hidden" name="id" id="id" type="text" value="">

                    <h5>Você tem certeza que deseja realmente ativar este CRAS/CREAS?</h5>
                    <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-danger">Ativar</button>
            
                    </div>
                </div>
            </form>
            
            
        </div>
    </div>
</div>

<!-- Modal para edição -->
<div class="modal fade" id="editar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Alterar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <form class="form" action="/cras/inativar" method="POST" name="editarCras"
                onsubmit="return validarEdicao(editarCras.nomeCras, editarCras.telefone);">
                <div class="modal-body">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <input type="hidden" name="id" id="id" type="text" value="">
                    <input type="hidden" name="statuscras" id="statuscras" type="text" value="">
                    
                    <label>Nome</label>
                    <input name="nomecras" value="" class="form-control" id="nomeCras" value="" maxlength="255" autocomplete="off">
                    <label id="msgcras_edit"></label>
                    </br>
                    <label>Telefone</label>
                    <input name="telefone" value="" class="form-control" id="telefone" onkeyup="mascara( this, mtel );" maxlength="15" autocomplete="off">
                    <label id="msgtelefone_edit"></label>
                    </br>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Salvar Mudanças</button>
                    </div>

                </div>
            </form>

        </div>
    </div>
</div>

<script>


    $('#exampleModal').on('hidden.bs.modal', function (event) {
        $(this).find('input:text').val('');
        //document.getElementById("adm").checked = true;
        document.getElementById("msgcras").innerHTML="";
        document.getElementById("msgtelefone").innerHTML="";
        //document.getElementById("msgsenha").innerHTML="";
        //document.getElementById("msgnome").innerHTML="";
    });

    function mascara(o,f){
        v_obj=o
        v_fun=f
        setTimeout("execmascara()",1)
    }
    function execmascara(){
        v_obj.value=v_fun(v_obj.value)
    }
    function mtel(v){
        v=v.replace(/\D/g,"");             //Remove tudo o que não é dígito
        v=v.replace(/^(\d{2})(\d)/g,"($1) $2"); //Coloca parênteses em volta dos dois primeiros dígitos
        v=v.replace(/(\d)(\d{4})$/,"$1-$2");    //Coloca hífen entre o quarto e o quinto dígitos
        return v;
    }
    function id( el ){
        return document.getElementById( el );
    }
    window.onload = function(){
        id('telefone').onkeyup = function(){
            mascara( this, mtel );
        }
    }

    function validarInclusao(nomeCras, telefone) {
    var permissao = true;
    var formulario = document.register;
    var tesNome = nomeCras.value;
    var tesTelefone = telefone.value;

    if (tesNome == "") {
        document.getElementById("msgcras").innerHTML="<font color='red'>Este campo é de preenchimento obrigatório</font>";
        permissao = false;
    } else {
        document.getElementById("msgcras").innerHTML="";
    }

    if (tesTelefone == "") {
        document.getElementById("msgtelefone").innerHTML="<font color='red'>Este campo é de preenchimento obrigatório</font>";
        permissao = false;
    } else if(tesTelefone.length<14){
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
        document.getElementById("msgcras_edit").innerHTML="<font color='red'>Este campo é de preenchimento obrigatório</font>";
        permissao = false;
    } else {
        document.getElementById("msgcras_edit").innerHTML="";
    }

    if (tesTelefone == "") {
        document.getElementById("msgtelefone_edit").innerHTML="<font color='red'>Este campo é de preenchimento obrigatório</font>";
        permissao = false;
    } else if(tesTelefone.length<14){
        document.getElementById("msgtelefone_edit").innerHTML="<font color='red'>O telefone informado não é válido, por favor verifique</font>";
        permissao = false;
    }
    else {
        document.getElementById("msgtelefone_edit").innerHTML="";
    }

    return permissao;
    
    }

        
</script>

@stop