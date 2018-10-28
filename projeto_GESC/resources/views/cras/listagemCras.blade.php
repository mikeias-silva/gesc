@extends('layout.principal') 
@section('conteudo')

<h1 class="text">CRAS E CREAS </h1>
@if(empty($cras))
    <div class="alert alert-danger">
        Você não tem nenhum CRAS ou CREAS cadastrado.
    </div>

@elseif(!empty($cras))
<div>
<table class="table table-striped text-center border">
    <thead>
        <tr >
            <th class="text-center">Nome</th>
            <th class="text-center">Telefone</th>
            <th class="text-center">Opções</th>

        </tr>
    </thead>
    @foreach ($cras as $c)
    <tr>
        <td class="text-center"> {{ $c->nomecras }} </td>
        <td class="text-center"> {{ $c->telefone }} </td>
        
        <td class="text-center">
                <a href="" class="text text-info" data-mytitle="{{ $c->nomecras }}" data-mytelefone="{{ $c->telefone }}"
                        data-myid="{{ $c->idcras }}" data-mystatuscras="{{ $c->statuscras }}" data-toggle="modal" data-target="#editar">
                        <i class="material-icons" data-toggle="tooltip" data-placement="right" title="Editar">
                                edit
                            </i>
                        </a>
           <!--   <button type="button" class="btn btn-info" data-mytitle="{{ $c->nomecras }}" data-mytelefone="{{ $c->telefone }}"
                 data-myid="{{ $c->idcras }}" data-mystatuscras="{{ $c->statuscras }}" data-toggle="modal" data-target="#editar">Editar</button>
-->
            @if($c->statuscras=='1')     
          <!--  
            <button type="button" class="btn btn-danger" data-mytitle="{{ $c->nomecras }}" 
                data-myid="{{ $c->idcras }}" 
                data-toggle="modal" data-target="#inativar">Inativar
            </button>-->  
            <a href="" class="text text-danger" data-mytitle="{{ $c->nomecras }}" 
                    data-myid="{{ $c->idcras }}" 
                    data-toggle="modal" data-target="#inativar">
           
                <i class="material-icons" data-toggle="tooltip" data-placement="right" title="Inativar">
                    highlight_off
                </i> </a> 
            @else
           <!--   <button type="button" class="btn btn-success" data-mytitle="{{ $c->nomecras }}" 
                data-myid="{{ $c->idcras }}" 
                data-toggle="modal" data-target="#ativar">Ativar
            </button>-->

            <a href="" class="text text-success" data-mytitle="{{ $c->nomecras }}" 
                    data-myid="{{ $c->idcras }}" 
                    data-toggle="modal" data-target="#ativar">
                    <i class="material-icons" data-toggle="tooltip" data-placement="right" title="Ativar">
                            done
                        </i>
            </a>
            @endif
        </td>
    </tr>
    @endforeach
</table>
</div>
@endif
<!-- Button trigger modal -->
<div class="float-right">
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#novoCras">
  Novo
</button>
</div>
<!-- Modal -->
<div class="modal fade" id="novoCras" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
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

                    <label>Nome*</label>
                    <input  name="nomecras" class="form-control" type="text" value="" maxlength="255" autocomplete="off" autofocus />
                    <label id="msgcras"></label>
                    <br>
                    <label>Telefone*</label>
                    <input name="telefone" id="telefone" class="form-control" maxlength="11" autocomplete="off" onkeyup="mascara( this, mtel );"/>
                    <label id="msgtelefone"></label>
                    <br>
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
            
            <form action="cras/inativar" method="post">
                <div class="modal-body">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <input type="hidden" name="idcras" id="idcras" type="text" value="">

                    <h5>Você tem certeza que deseja realmente inativar a unidade <label id="nomecras" value=""></label>?</h5>
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

                    <input type="hidden" name="idcras" id="idcras" type="text" value="">

                    <h5>Você tem certeza que deseja realmente ativar a unidade <label id="nomecras" value=""></label>?</h5>

                    <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-success">Ativar</button>
            
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
                <h5 class="modal-title" id="exampleModalLabel">Alterar CRAS ou CREAS</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <form class="form" action="/cras/edita" method="POST" name="editarCras"
                onsubmit="return validarEdicao(editarCras.nomecras, editarCras.telefone);">
                <div class="modal-body">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="idcras" id="idcras" type="text" value="">
                    <input type="hidden" name="statuscras" id="statuscras" type="text" value="">
                    
                    <label>Nome*</label>
                    <input name="nomecras" value="" class="form-control" id="nomecras" value="" maxlength="255" autocomplete="off">
                    <label id="msgcras_edit"></label>
                    <br>
                    <label>Telefone*</label>
                    <input name="telefone" value="" class="form-control" id="telefone" onkeyup="mascara( this, mtel );" maxlength="11" autocomplete="off">
                    <label id="msgtelefone_edit"></label>
                    <br>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Salvar Mudanças</button>
                    </div>

                </div>
            </form>

        </div>
    </div>
</div>

<!-- Modal de help -->
<div class="modal fade" id="help" tabindex="-1" role="dialog" aria-labelledby="help" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="font-weight-bold">Ajuda</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="col-md-12">
                </br>
                <p class="text-justify">Nesta tela é feita o gerenciamento de CRAS e CREAS, onde as mesmas serão disponibilizadas para seleção ao cadastrar uma família, onde só serão disponibilizadas para seleção  CRAS ou CREAS com o status ativo. </p>
                <p class="text-justify">Ao informar um número de telefone de um CRAS ou CREAS, deverá ser informado somente os dígitos do mesmo.</p>
                <p class="text-justify">CRAS - Centro de Referências de Assistência Social</p>
                <p class="text-justify">CREAS - Centro de Referências Especializada em Assistência Social</p>            
            </div>
        </div>
    </div>
</div>

<script src="js/listagemCras.js"></script>

<script>


    $('#novoCras').on('hidden.bs.modal', function (event) {
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
        //v=v.replace(/^(\d{2})(\d)/g,"($1) $2"); //Coloca parênteses em volta dos dois primeiros dígitos
        //v=v.replace(/(\d)(\d{4})$/,"$1-$2");    //Coloca hífen entre o quarto e o quinto dígitos
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

    /*function validarInclusao(nomeCras, telefone) {
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
    
    }*/

    function validarEdicao(nomeCras, telefone) {
    var permissao = true;
    var formulario = document.register;
    var tesNome = nomeCras.value;
    var tesTelefone = telefone.value;

    if (tesNome == "") {
        document.getElementById("msgcras_edit").innerHTML="<font color='red'>Campo obrigatório</font>";
        permissao = false;
    } else {
        document.getElementById("msgcras_edit").innerHTML="";
    }

    if (tesTelefone == "") {
        document.getElementById("msgtelefone_edit").innerHTML="<font color='red'>Campo obrigatório</font>";
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
    var id = button.data('myid');
    var nome = button.data('mytitle');
    var modal = $(this)
   // modal.find('.modal-body #crasId').val(id);
    modal.find('.modal-body #idcras').val(id);
    //modal.find('.modal-body #nomecras').val(nome);
    modal.find('.modal-body #nomecras').text(nome);
    
    console.log(id);
});

    $('#ativar').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) 
    var id = button.data('myid');
    var nome = button.data('mytitle'); 
    var modal = $(this)
   // modal.find('.modal-body #crasId').val(id);
    modal.find('.modal-body #idcras').val(id);
    modal.find('.modal-body #nomecras').text(nome);
    console.log(id);
});

    $('#editar').on('show.bs.modal', function (event) {
        $(this).find('input:text').val('');
        document.getElementById("msgcras_edit").innerHTML="";
        document.getElementById("msgtelefone_edit").innerHTML="";
    });
        
</script>

@stop