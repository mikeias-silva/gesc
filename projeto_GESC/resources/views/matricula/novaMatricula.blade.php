@extends('layout.principal') 
@extends('matricula.identificacao')
@section('conteudo')

<h2>Nova Matrícula</h2>

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
    
        
    <div >
    </br>

    <form  action="/novaMatricula/adiciona" method="POST" 
    onsubmit="return validarMatricula(matriculaNova.nomecrianca, matriculaNova.datanascimentocrianca, matriculaNova.rgcrianca,
    matriculaNova.cpfcrianca, matriculaNova.cep, matriculaNova.logradouro, matriculaNova.bairro, matriculaNova.nomeresp1,
    matriculaNova.datanascimentoresp1, matriculaNova.rgresp1, matriculaNova.cpfresp1, matriculaNova.salarioresp1, matriculaNova.tel1resp1, 
    matriculaNova.tel2resp1, matriculaNova.nomeresp2, matriculaNova.datanascimentoresp2, matriculaNova.rgresp2, matriculaNova.cpfresp2, 
    matriculaNova.salarioresp2, matriculaNova.tel1resp2, matriculaNova.tel2resp2, matriculaNova.numnis);" name="matriculaNova">
            <div class="form-group ">
            {{ csrf_field() }}
            <div class="form-group ">
                <div class="row">
                    <div class="col-sm-8" >
                        <label>Nome</label>
                        <input type="text" class="form-control" name="nomecrianca" maxlength="255" autocomplete="off">
                        <spam id="msgNomeCrianca"></spam>
                    </div>
                        
                    <div class="col-sm-2">
                        <label>Nascimento</label>
                        <input type="date" class="form-control" name="datanascimentocrianca">
                        <spam id="msgDataNascimento"></spam>
                    </div>

                    <div class="col-sm-2">
                        <label>Sexo</label>
                        <select name="sexocrianca" id="" class="custom-select" value="">
                            <option value="M">Masculino</option>
                            <option value="F">Feminino</option>
                        </select>
                    </div>
                </div>
            </div>
            
            <div class="form-group ">
                <div class="row" >
                    <div class="col-sm-4">
                        <label>RG</label>
                        <input type="text" class="form-control" id="rgcrianca" name="rgcrianca" onkeyup="mascara(this, Rg);" maxlength="9" autocomplete="off">
                        <spam id="msgRg"></spam>
                    </div>

                    <div class="col-sm-4">
                        <label>CPF</label>
                        <input type="text" class="form-control" name="cpfcrianca" id="cpfcrianca" maxlength="11" autocomplete="off" onkeyup="mascara(this, Cpf);">
                        <spam id="msgCpf"></spam>
                    </div>

                    <div class="col-sm-4">
                        <label>CEP</label>
                        <input type="text" class="form-control" name="cep" id="cep" maxlength="8" autocomplete="off" onkeyup="mascara(this, Cep);">
                        <spam id="msgCep"></spam>
                    </div>
                </div>
            </div>

            <div class="form-group ">
                <div class="row" >
                    <div class="col-sm-8">
                        <label>Endereço</label>
                        <input type="text" class="form-control" name="logradouro" maxlength="255" autocomplete="off">
                        <spam id="msgEndereco"></spam>
                    </div>

                    <div class="col-sm-4">
                        <label>Bairro</label>
                        <input type="text" class="form-control" name="bairro" maxlength="255" autocomplete="off">
                        <spam id="msgBairro"></spam>
                    </div>
                </div>
            </div>

            <div class="form-group ">
                <div class="row" >
                    <div class="col-sm-6">
                        <label>Complemento</label>
                        <input type="text" class="form-control" name="complemento" maxlength="255" autocomplete="off">
                    </div>

                    <div class="col-sm-6">
                        <label>CRAS/CREAS</label>
                        <select name="cras" id="" class="custom-select" name="cras">
                            <option value="">Selecione um Cras</option>
                            @foreach($cras as $c)
                                <option value="{{ $c->idcras}}">{{ $c->nomecras }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="form-group " >
                <div class="row" >
                    <div class="col-sm-6">
                        <label>Público priritario</label>
                        <select name="pprioritario" id="" class="custom-select">
                            @foreach($pprioritario as $p)
                                <option value="{{ $p->idpublicoprioritario }}">{{ $p->publicoprioritario }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            

            <div class="form-group">
                <div class="row">
                    <div class="col-sm-6">
                        <label>Escola</label>
                        <select name="escola" id="" class="custom-select" >
                            @foreach($escola as $e)
                                <option value="{{ $e->idescola }}">{{ $e->nomeescola }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-sm-3">
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
                </div>
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
        </br>
        <h2>Responsável 01</h2>

        <div class="form-group">
            <div class="row">
                <div class="col-sm-8">
                    <label>Nome</label>
                    <input class="form-control" type="text" name="nomeresp1" maxlength="255" autocomplete="off">
                    <spam id="msgNomeResp1"></spam>
                </div>
                
                <div class="col-sm-2">
                    <label>Data de Nascimento</label>
                    <input type="date" class="form-control" name="datanascimentoresp1">
                    <spam id="msgDataResp1"></spam>
                </div>

                <div class="col-sm-2">
                    <label>Sexo</label>
                    <select class="form-control" name="sexoresp1" id="">
                        <option value="M">Masculino</option>
                        <option value="F">Feminino</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                    <div class="col-sm-4">
                    <label>RG</label>
                    <input type="text" class="form-control" name="rgresp1" autocomplete="off" onkeyup="mascara(this, Rg);" maxlength="9"> 
                    <spam id="msgRgResp1"></spam>
                </div>

                <div class="col-sm-4">
                    <label>CPF</label>
                    <input type="text" class="form-control" name="cpfresp1" maxlength="11" autocomplete="off" onkeyup="mascara(this, Cpf);">
                    <spam id="msgCpfResp1"></spam>
                </div>

                <div class="col-sm-4">
                    <label>Estado Civil</label>
                    <select class="form-control" name="estadocivilresp1" id="">
                        <option value="1">Solteiro</option>
                        <option value="2">Casado</option>
                        <option value="3">Divorciado</option>
                        <option value="4">Viúvo</option>
                        <option value="5">Separado</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col-sm-8">
                    <label>Profissão</label>
                    <input type="text" class="form-control" name="profissaoresp1">
                </div>
                <div class="col-sm-4">
                    <label>Salário</label>
                    <input type="text" class="form-control" name="salarioresp1" id="salarioresp1" onkeyup="mascara(this, Moeda);">
                    <spam id="msgSalarioResp1"></spam>
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col-sm-8">
                    <label>Local de Trabalho</label>
                    <input type="text" class="form-control" name="trabalhoresp1">
                </div>

                <div class="col-sm-4">
                    <label>Escolaridade</label>
                    <select class="form-control" name="escolaridaderesp1" id="">
                        <option value="1">Ensino Fundamental Incompleto</option>
                        <option value="2">Ensino Fundamental Completo</option>
                        <option value="3">Ensino Médio Incompleto</option>
                        <option value="4">Ensino Médio Completo</option>
                        <option value="5">Ensino Superior Incompleto</option>
                        <option value="6">Ensino Superior Completo</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col-sm-4">
                    <label>Telefone</label>
                    <input type="text" class="form-control" name="tel1resp1" id="tel1resp1"  onkeyup="mascara(this, Telefone);" maxlength="11">
                    <spam id="msgTel1Resp1"></spam>
                </div>
                <div class="col-sm-4">
                    <label>Telefone 2</label>
                    <input type="text" class="form-control" name="tel2resp1" id="tel2resp1" onkeyup="mascara(this, Telefone);" maxlength="11">
                    <spam id="msgTel2Resp1"></spam>
                </div>
            </div>
        </div>

        <label>Observações</label>
        <textarea name="obsresp1" id="" cols="10" rows="2" class="form-control"></textarea>

        <div class="container" id="meio">

        </div>
            
        <h2>Responsável 02</h2>
        <div class="form-group">
            <div class="row">
                <div class="col-sm-8">
                    <label>Nome:</label>
                    <input class="form-control" type="text" name="nomeresp2" id="nomeresp2" maxlength="255" autocomplete="off">
                    <spam id="msgNomeResp2"></spam>
                </div>

                <div class="col-sm-2">
                    <label>Data de Nascimento</label>
                    <input type="date" class="form-control" name="datanascimentoresp2">
                    <spam id="msgDataResp2"></spam>
                </div>

                <div class="col-sm-2">
                        <label>Sexo</label>
                        <select class="form-control" name="sexoresp2" id="">
                            <option value="M">Masculino</option>
                            <option value="F">Feminino</option>
                        </select>
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col-sm-4">
                    <label>RG</label>
                    <input type="text" class="form-control" name="rgresp2" id="rgresp2" autocomplete="off" onkeyup="mascara(this, Rg);" maxlength="9">
                    <spam id="msgRgResp2"></spam>
                </div>

                <div class="col-sm-4">
                    <label>CPF</label>
                    <input type="text" class="form-control" name="cpfresp2" id="cpfresp2" maxlength="11" autocomplete="off" onkeyup="mascara(this, Cpf);">
                    <spam id="msgCpfResp2"></spam>
                </div>
                
                <div class="col-sm-4">
                    <label>Estado Civil</label>
                    <select class="form-control" id="" name="estadocivilresp2">
                        <option value="1">Solteiro</option>
                        <option value="2">Casado</option>
                        <option value="3">Divorciado</option>
                        <option value="4">Viúvo</option>
                        <option value="5">Separado</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col-sm-8">
                    <label>Profissão</label>
                    <input type="text" class="form-control" name="profissaoresp2">
                </div>
                <div class="col-sm-4">
                        <script>
                                function linha(){
                                    var linha = 1;
                                    return linha;
                                }
                                
                            </script><label>Salário</label>
                    <input type="text" class="form-control" name="salarioresp2" id="salarioresp2" onkeyup="mascara(this, Moeda);">
                    <spam id="msgSalarioResp2"></spam>
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col-sm-8">
                    <label>Local de Trabalho</label>
                    <input type="text" class="form-control" name="trabalhoresp2">
                </div>
                <div class="col-sm-4">
                    <label>Escolaridade</label>
                    <select class="form-control" id="" name="escolaridaderesp2">
                            <option value="1">Ensino Fundamental Incompleto</option>
                            <option value="2">Ensino Fundamental Completo</option>
                            <option value="3">Ensino Médio Incompleto</option>
                            <option value="4">Ensino Médio Completo</option>
                            <option value="5">Ensino Superior Incompleto</option>
                            <option value="6">Ensino Superior Completo</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col-sm-4">
                    <label>Telefone 1</label>
                    <input type="tel" class="form-control" name="tel1resp2" id="tel1resp2" onkeyup="mascara(this, Telefone);" maxlength="11">
                    <spam id="msgTel1Resp2"></spam>
                </div>
                <div class="col-sm-4">
                    <label>Telefone 2</label>
                    <input type="tel" class="form-control" name="tel2resp2" id="tel2resp2" onkeyup="mascara(this, Telefone);" maxlength="11">
                    <spam id="msgTel2Resp2"></spam>
                </div>
            </div>
        </div>

        <label>Observações</label>
        <textarea name="obsresp2" id="" cols="10" rows="2" class="form-control"></textarea>
    
        </div>
    </div>

    <!-- ABA FAMILIA -->
    <div class="tab-pane fade" id="familia" role="tabpanel" aria-labelledby="familia-tab">
        <div>
        </br>
        <div class="form-group">
            <div class="row">
                <div class="col-sm-8">
                    <label>Número do NIS</label>
                    <input type="text" class="form-control" name="numnis">
                    <spam id="msgNumNis"></spam>
                </div>
                <div class="col-sm-4">
                    <label>Moradia</label>
                    <select class="form-control" name="moradia" id="">
                        <option value="1">Alugada</option>
                        <option value="2">Cedida</option>
                        <option value="3">Prórpia</option>
                    </select>
                </div>
            </div>
        </dvi>
        </br>

        
        <!-- radio buttons -->
        <div class="form-group">
            <span>Tipo Habitação</span>
            <div class="row">
                <div class="col-sm-1">
                    <div class="form-check">
                        <label class="form-check-label" for="rd-alvenaria">
                            <input type="radio" class="form-check-input" id="rd-alvenaria" name="tipohabitacao" value="alvenaria" checked>Alvenaria
                        </label>
                    </div>
                </div>
                <div class="col-sm-1">
                    <div class="form-check">
                        <label class="form-check-label" for="rd-madeira">
                            <input type="radio" class="form-check-input" id="rd-madeira" name="tipohabitacao" value="madeira">Madeira
                        </label>
                    </div>
                </div>
                <div class="col-sm-1">
                    <div class="form-check">
                        <label class="form-check-label" for="rd-mista">
                            <input type="radio" class="form-check-input" id="rd-mista" name="tipohabitacao" value="Mista">Mista
                        </label>
                    </div>
                </div>
            </div>
        </div>
                    
            <!-- checkboxes -->
            <!--<span>Programas Sociais</span>-->
            <div class="form-check">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" name="arearisco" value="1">Mora em área de risco
                </label>
            </div>

            <div class="form-check">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" name="bolsafamilia" value="1">Beneficiário do Bolsa Familia
                </label>
            </div>

            <div class="form-check">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" name="beneficiopc" value="1">Benefício Pessoa Continuada
                </label>
            </div>

            <!--GRID MEMBRO FAMILIA-->
            <!--<h5 class="text-center font-weight-bold text-uppercase py-5">Membros Familia</h5>-->
            <div class="">
                <div id="table" class="table-editable">
                    <span class="table-add float-right mb-3 mr-2">
                        <a href="#!" class="text-success">
                            <i class="fa fa-plus fa-2x"></i>
                        </a>
                    </span>
                       
                    <table class="table table-bordered table-responsive-md text-center">
                        <h5 class="text-center font-weight-bold text-uppercase py-6">Membros Familia</h5>
                        <!-- <h5 class="text-center text-uppercase font-weight-bold">Membros Familia</h5>-->
                        <tr>
                            <th class="text-center">Nome</th>
                            <th class="text-center">Data Nascimento</th>
                            <th class="text-center">Local Trabalha</th>
                            <th class="text-center">Salário</th>
                            <th class="text-center">Escola</th>
                        </tr>
                        
                        <!-- This is our clonable table line -->
                        
                        @php($linha = 0)
                        
                        <tr class="hide">
                           @php($linha == $linha++)
                            <td class="pt-3-half"><input id="tdedit" type="text" name="nomemembro"/></td>
                            <td class="pt-3-half"><input id="tdedit" type="date" name="nascimentomembro{{ $linha }}"/></td>
                            <td class="pt-3-half"><input id="tdedit" type="text" name="trabmembro{{ $linha }}"/></td>
                            <td class="pt-3-half"><input id="tdedit" type="number" name="salariomembro{{ $linha }}"/></td>
                            <td class="pt-3-half"><input id="tdedit" type="text" name="escolamembro{{ $linha }}"/></td>
                            <td>
                                <span class="table-remove">
                                    <button type="button" class="btn btn-danger btn-rounded btn-sm my-0">-</button>
                                </span>
                            </td>
                            
                        </tr>

                    </table>
                    
                </div>
        </div>
        <!-- Editable table -->
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
    

<script src="js/nova_matricula.js"></script>
@stop