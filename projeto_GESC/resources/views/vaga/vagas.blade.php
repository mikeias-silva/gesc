@extends('layout.principal') 
@section('conteudo')
<h1 class="text">Gerenciamento de vagas</h1>
@if(count($vaga)==0)
    <div class="alert alert-danger">
        Você não tem nenhuma faixa etária cadastrada.
    </div>

@elseif(!empty($vaga))
<table class="table table-striped">
    <thead>
        <tr>
            <th>Idade Mínima</th>
            <th>Idade Máxima</th>
            <th>Númaro de Vagas</th>
            <th>Ano</th>
            <th>Opções</th>

        </tr>
    </thead>
    @foreach ($vaga as $v)
    <tr>
        <td> {{ $v->idademin }} </td>
        <td> {{ $v->idademax }} </td>
        <td> {{ $v->numvaga }} </td>
        <td> {{ $v->anovaga }} </td>
        
        <td>
            <button type="button" class="btn btn-info" data-myid="{{ $v->idvaga }}" data-myidademin="{{ $v->idademin }}"
            data-myidademax="{{ $v->idademax }}" data-mynumvaga="{{ $v->numvaga }}" data-myano="{{ $v->anovaga }}" data-toggle="modal" data-target="#editarVagas">Editar</button>    
            <button type="button" class="btn btn-danger" data-myid="{{ $v->idvaga }}" data-toggle="modal" data-target="#excluirVaga">Excluir</button>
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
                <h5 class="modal-title" id="exampleModalLabel">Novo faixa etária de vagas</h5>
                
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            
            </div>
            <div class ="row">
            <spam id="msgiadadessobre" class="col-sm-12"></br></spam>
            <spam id="msgintervaloinvalido" class="col-sm-12"></br></spam>
            </div>
            <div class="modal-body">

                <form class="form" action="/vagas/adiciona" method="post" name="incluirVagas"
                onsubmit="return incluirVaga(incluirVagas.idademin, incluirVagas.idademax, incluirVagas.numvaga, 
                incluirVagas.listaAno, incluirVagas.listaIdadeMin, incluirVagas.listaIdadeMax, incluirVagas.anovaga);">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="listaAno" value="{{ $listaAno }}">
                    <input type="hidden" name="listaIdadeMax" value="{{ $listaIdadeMax }}">
                    <input type="hidden" name="listaIdadeMin" value="{{ $listaIdadeMin }}">
                    <div class="row">
                        <div class="col-sm-6">
                            <label>Idade Mínima</label>
                            <input name="idademin" id="idademin" class="form-control" type="text" value="" maxlength="2" autocomplete="off" onkeyup="mascara(this, retiraLetra);">
                            <label id="msgidademin"></label>
                            </br>
                        </div>
                        <div class="col-sm-6">
                            <label>Idade Máxima</label>
                            <input name="idademax" id="idademax"  type="text" class="form-control" maxlength="2" autocomplete="off" onkeyup="mascara(this, retiraLetra);">
                            <label id="msgidademax"></label>
                            </br>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <label>Número de Vagas</label>
                            <input name="numvaga" id="numvaga" type="text" class="form-control" maxlength="4" autocomplete="off" onkeyup="mascara(this, retiraLetra);">
                            <label id="msgnumvagas"></label>
                            </div>
                        <div class="col-sm-6">
                            <label>Ano</label>
                            <select class="form-control" name="anovaga" id="anovaga">
                                <option value="{{$ano}}">{{$ano}}</option>
                                <option value="{{$a = $ano+1}}">{{$a = $ano+1}}</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Confirmar</button>
                    </div>
                </form>

            </div>

        </div>
    </div>
</div>


<!-- Editar Vagas -->
<div class="modal fade" id="editarVagas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar faixa etária de vagas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class ="row">
            <spam id="msgiadadessobre_edit" class="col-sm-12"></br></spam>
            <spam id="msgintervaloinvalido_edit" class="col-sm-12"></br></spam>
            </div>
            <div class="modal-body">

                <form class="form" action="/vagas/editar" method="post" name="editarVagas"
                onsubmit="return editarVaga(editarVagas.idademin, editarVagas.idademax, editarVagas.numvaga,
                editarVagas.listaAno, editarVagas.listaIdadeMin, editarVagas.listaIdadeMax, editarVagas.anovaga);">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="listaAno" value="{{ $listaAno }}">
                    <input type="hidden" name="listaIdadeMax" value="{{ $listaIdadeMax }}">
                    <input type="hidden" name="listaIdadeMin" value="{{ $listaIdadeMin }}">
                    <input type="hidden" name="idvaga" id="idvaga" type="text" value="">
                    <div class="row">
                        <div class="col-sm-6">
                            <label>Idade Mínima</label>
                            <input name="idademin" id="idademin" class="form-control" type="text" value="" maxlength="2" autocomplete="off" onkeyup="mascara(this, retiraLetra);">
                            <label id="msgidademin_edit"></label>
                            </br>
                        </div>
                        <div class="col-sm-6">
                            <label>Idade Máxima</label>
                            <input name="idademax" id="idademax"  type="text" class="form-control" maxlength="2" autocomplete="off" onkeyup="mascara(this, retiraLetra);">
                            <label id="msgidademax_edit"></label>
                            </br>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <label>Número de Vagas</label>
                            <input name="numvaga" id="numvaga" type="text" class="form-control" maxlength="4" autocomplete="off" onkeyup="mascara(this, retiraLetra);">
                            <label id="msgnumvagas_edit"></label>
                            </div>
                        <div class="col-sm-6">
                            <label>Ano</label>
                            <select class="form-control" name="anovaga" id="anovaga">
                                <option value="{{$ano}}">{{$ano}}</option>
                                <option value="{{$a = $ano+1}}">{{$a = $ano+1}}</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Confirmar</button>
                    </div>
                </form>

            </div>

        </div>
    </div>
</div>

<!-- Modal Excluir vaga-->
<div class="modal fade" id="excluirVaga" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title text-center" id="exampleModalCenterTitle">Atenção!!!</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>
            
            <form action="/vagas/excluir" method="post">
                <div class="modal-body">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <input type="hidden" name="idvaga" id="idvaga" type="text" value="">

                    <h5>Você tem certeza que deseja excluir esta faixa etária e suas vagas?</h5>

                    <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-danger">Excluir</button>
            
                    </div>
                </div>
            </form>
            
            
        </div>
    </div>
</div>


<script>
    $('#editarVagas').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget)  
    var id = button.data('myid');
    var idademin = button.data('myidademin');
    var idademax = button.data('myidademax');
    var numvagas = button.data('mynumvaga');
    var anovaga = button.data('myano');
    var modal = $(this);
    modal.find('.modal-body #idvaga').val(id);
    modal.find('.modal-body #idademin').val(idademin);
    modal.find('.modal-body #idademax').val(idademax);
    modal.find('.modal-body #numvaga').val(numvagas);
    modal.find('.modal-body #anovaga').val(anovaga);
    //var c = document.getElementById("anovaga");
    var data = new Date();
    //console.log(data.getFullYear());
    //console.log(anovaga);
    //document.getElementById("anovaga").options[0].selected = false;
    /*
    if(data.getFullYear()==anovaga){
        c.options[0].selected = true;
        console.log("Atual");
    } else {
        c.options[0].selected = false;
        c.options[1].selected = true;
        console.log("Próximp");
    }
   // console.log("Editar modal");*/
    
});

    $('#excluirVaga').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget)  
    var modal = $(this);
    var id = button.data('myid');
    modal.find('.modal-body #idvaga').val(id);
    console.log("Excluir modal");
    
});

    function incluirVaga(idademin, idademax, numvaga, listaAno, listaIdadeMin, listaIdadeMax, anovaga){
        var permissao = true;
        var cont=0, tes=0;
        var teslistaAno, teslistaIdadeMin, teslistaIdadeMax, i;
        var formulario = document.register;
        var tesIdadeMin = idademin.value;
        var tesIdadeMax = idademax.value;
        var tesNumVgagas = numvaga.value;
        var tesAnoVaga = anovaga.value;
        teslistaAno = listaAno.value.split("|");
        teslistaIdadeMin = listaIdadeMin.value.split("|");
        teslistaIdadeMax = listaIdadeMax.value.split("|");

        if(tesIdadeMin.length==2&&tesIdadeMax.length==1){
            tesIdadeMax='0'+tesIdadeMax;
            //console.log(tesIdadeMax);
        }
        if(tesIdadeMax.length==2&&tesIdadeMin.length==1){
            tesIdadeMin='0'+tesIdadeMin;
            //console.log(tesIdadeMax);
        }
        
        
        if(tesIdadeMin>tesIdadeMax){
            document.getElementById("msgintervaloinvalido").innerHTML="<font color='red'>A idade mínima não pode ser maior que a máxima, por favor verifique</font>";
            permissao = false;
        }else {
            document.getElementById("msgintervaloinvalido").innerHTML="";
        }


        if(tesIdadeMin != "" && tesIdadeMax != ""){
            for (i in teslistaAno, teslistaIdadeMin){
                //tes++;
                if(teslistaAno[i]==tesAnoVaga){
                    //console.log(tesIdadeMin);
                    //console.log(teslistaIdadeMin[i]);
                    //console.log(tesIdadeMax);
                    //console.log(teslistaIdadeMax[i]);
                    if((tesIdadeMin<=teslistaIdadeMin[i]&&tesIdadeMax>=teslistaIdadeMin[i])
                        ||(tesIdadeMin>=teslistaIdadeMin[i]&&tesIdadeMax<=teslistaIdadeMax[i])
                        || (tesIdadeMax>=teslistaIdadeMax[i]&&tesIdadeMin<=teslistaIdadeMax[i])){
                            cont++;
                            //console.log("Entra 1");
                        }/*else if(teslistaIdadeMax[i]<=tesIdadeMax){
                        if(tesIdadeMin<=teslistaIdadeMax[i]){
                            cont++;
                            console.log("Entra 2");
                        }
                    }*/
                }
            }
        }
        
        //console.log(cont);
        if(cont>0){
            //console.log("Entra");
            document.getElementById("msgiadadessobre").innerHTML="<font color='red'>A faixa etária informada sobrepõe a autra cadastrada, por favor verifique</font>";
            permissao = false;
        } else {
            document.getElementById("msgiadadessobre").innerHTML="";
        }


        if (tesIdadeMin == "") {
            document.getElementById("msgidademin").innerHTML="<font color='red'>Este campo é de preenchimento obrigatório</font>";
            permissao = false;
        } else {
            document.getElementById("msgidademin").innerHTML="";
        }

        if (tesIdadeMax == "") {
            document.getElementById("msgidademax").innerHTML="<font color='red'>Este campo é de preenchimento obrigatório</font>";
            permissao = false;
        } else {
            document.getElementById("msgidademax").innerHTML="";
        }

        if (tesNumVgagas == "") {
            document.getElementById("msgnumvagas").innerHTML="<font color='red'>Este campo é de preenchimento obrigatório</font>";
            permissao = false;
        } else {
            document.getElementById("msgnumvagas").innerHTML="";
        }

        return permissao;
    }

     function editarVaga(idademin, idademax, numvaga, listaAno, listaIdadeMin, listaIdadeMax, anovaga){
        var permissao = true;
        var cont=0, tes=0;
        var teslistaAno, teslistaIdadeMin, teslistaIdadeMax, i;
        var formulario = document.register;
        var tesIdadeMin = idademin.value;
        var tesIdadeMax = idademax.value;
        var tesNumVgagas = numvaga.value;
        var tesAnoVaga = anovaga.value;
        teslistaAno = listaAno.value.split("|");
        teslistaIdadeMin = listaIdadeMin.value.split("|");
        teslistaIdadeMax = listaIdadeMax.value.split("|");

        if(tesIdadeMin.length==2&&tesIdadeMax.length==1){
            tesIdadeMax='0'+tesIdadeMax;
            //console.log(tesIdadeMax);
        }
        if(tesIdadeMax.length==2&&tesIdadeMin.length==1){
            tesIdadeMin='0'+tesIdadeMin;
            //console.log(tesIdadeMax);
        }
        
        
        if(tesIdadeMin>tesIdadeMax){
            document.getElementById("msgintervaloinvalido_edit").innerHTML="<font color='red'>A idade mínima não pode ser maior que a máxima, por favor verifique</font>";
            permissao = false;
        }else {
            document.getElementById("msgintervaloinvalido_edit").innerHTML="";
        }


        if(tesIdadeMin != "" && tesIdadeMax != ""){
            for (i in teslistaAno, teslistaIdadeMin){
                if(teslistaAno[i]==tesAnoVaga){
                    if((tesIdadeMin<=teslistaIdadeMin[i]&&tesIdadeMax>=teslistaIdadeMin[i])
                        ||(tesIdadeMin>=teslistaIdadeMin[i]&&tesIdadeMax<=teslistaIdadeMax[i])
                        || (tesIdadeMax>=teslistaIdadeMax[i]&&tesIdadeMin<=teslistaIdadeMax[i])){
                            cont++;
                    }
                }
            }
        }
        
        if(cont>1){
            document.getElementById("msgiadadessobre_edit").innerHTML="<font color='red'>A faixa etária informada sobrepõe a autra cadastrada, por favor verifique</font>";
            permissao = false;
        } else {
            document.getElementById("msgiadadessobre_edit").innerHTML="";
        }

        if (tesIdadeMin == "") {
            document.getElementById("msgidademin_edit").innerHTML="<font color='red'>Este campo é de preenchimento obrigatório</font>";
            permissao = false;
        } else {
            document.getElementById("msgidademin_edit").innerHTML="";
        }

        if (tesIdadeMax == "") {
            document.getElementById("msgidademax_edit").innerHTML="<font color='red'>Este campo é de preenchimento obrigatório</font>";
            permissao = false;
        } else {
            document.getElementById("msgidademax_edit").innerHTML="";
        }

        if (tesNumVgagas == "") {
            document.getElementById("msgnumvagas_edit").innerHTML="<font color='red'>Este campo é de preenchimento obrigatório</font>";
            permissao = false;
        } else {
            document.getElementById("msgnumvagas_edit").innerHTML="";
        }

        return permissao;
    }

    $('#exampleModal').on('hidden.bs.modal', function (event) {
        $(this).find('input:text').val('');
        var modal = $(this);
        //document.getElementById("adm").checked = true;
        modal.find('.modal-body #idademin').val('');
        modal.find('.modal-body #idademax').val('');
        modal.find('.modal-body #numvaga').val('');
        document.getElementById("msgnumvagas").innerHTML="";
        document.getElementById("msgidademax").innerHTML="";
        document.getElementById("msgidademin").innerHTML="";
        document.getElementById("msgiadadessobre").innerHTML="";
        document.getElementById("msgintervaloinvalido").innerHTML="";
    });

    $('#editarVagas').on('hidden.bs.modal', function (event) {
        $(this).find('input:text').val('');
        document.getElementById("msgnumvagas_edit").innerHTML="";
        document.getElementById("msgidademax_edit").innerHTML="";
        document.getElementById("msgidademin_edit").innerHTML="";
        document.getElementById("msgiadadessobre_edit").innerHTML="";
        document.getElementById("msgintervaloinvalido_edit").innerHTML="";
    });

    function mascara(o,f){
        v_obj=o
        v_fun=f
        setTimeout("execmascara()",1)
    }
    function execmascara(){
        v_obj.value=v_fun(v_obj.value)
    }

    function retiraLetra(v){
        v=v.replace(/\D/g,"");
        return v;
    }

    window.onload = function(){
        document.getElementById("msgiadadessobre_edit").innerHTML="";
        document.getElementById("msgintervaloinvalido_edit").innerHTML="";
        document.getElementById("msgiadadessobre").innerHTML="";
        document.getElementById("msgintervaloinvalido").innerHTML="";
    }

</script>
@stop