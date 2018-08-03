@extends('layout.principal') 
@section('conteudo')
<h1 class="text">Dados da Instituição </h1>
<div class="container" id="meio"> </div>
    <form class="form" action="/instituicao/edita" method="POST">
    
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="idinstituicao" id="idinstituicao" value="{{ $instituicao[0]->idinstituicao }}">
        
        <h3 >Nome Instituição</h3>
        <input name="nomeinstituicao" class="form-control" type="text" value="{{ $instituicao[0]->nomeinstituicao }}" maxlength="255" autocomplete="off" >
        <h3 >CNPJ</h3>
        <input name="cnpj" class="form-control" type="text" value="{{ $instituicao[0]->cnpj }}" maxlength="255" autocomplete="off" >
        <h3 >Endereço</h3>
        <input name="logradouro" class="form-control" type="text" value="{{ $instituicao[0]->logradouro }}" maxlength="255" autocomplete="off" >
        <h3 >Cep</h3>
        <input name="cep" class="form-control" type="text" value="{{ $instituicao[0]->cep }}" maxlength="255" autocomplete="off" >
        <h3 >E-mail</h3>
        <input name="email" class="form-control" type="text" value="{{ $instituicao[0]->email }}" maxlength="255" autocomplete="off" >
        <h3 >Telefone</h3>
        <input name="telefone" class="form-control" type="text" value="{{ $instituicao[0]->telefone }}" maxlength="255" autocomplete="off" >
        <h3 >N. de metas mensais</h3>
        <input name="nummetasmensais" class="form-control" type="text" value="{{ $instituicao[0]->nummetasmensais }}" maxlength="255" autocomplete="off" >
        <h3 >N. do termo de colaboração\formento</h3>
        <input name="numtermocolaboradorformento" class="form-control" type="text" value="{{ $instituicao[0]->numtermocolaboradorformento }}" maxlength="255" autocomplete="off" >
        <h3 >N. do plano de trabalho</h3>
        <input name="numplanotrabalho" class="form-control" type="text" value="{{ $instituicao[0]->numplanotrabalho }}" maxlength="255" autocomplete="off" >
        <h3 >Entidade Mantedora</h3>
        <input name="entidademantenedora" class="form-control" type="text" value="{{ $instituicao[0]->entidademantenedora }}" maxlength="255" autocomplete="off" >
        <h3 >Entidade Executora</h3>
        <input name="entidadeexecutora" class="form-control" type="text" value="{{ $instituicao[0]->entidadeexecutora }}" maxlength="255" autocomplete="off" >


        

        <!--<h3>Cidade/UF</h3>
        {{ $cidadeins[0]->nomecidade }}
        {{ $cidadeins[0]->siglaestado }}-->
        <button type="submit" class="btn btn-primary" id="btn_instituicao">Salvar</button>
    </form>
    

    <div class="container" id="meio"></div>
    <select name="" id="" class="form-control col-md-1">
        <option value="">2017</option>
        <option value="">2018</option>
    </select>

    <table class="table table-striped container col-md-6" align="center">
        <thead>
            <tr align="center">
                <th>Mês</th>
                <th>Numero de dias de funcionamento</th>
            </tr>
        </thead>
    
            <tr>
                <td align="center">Janeiro</td>
                <td align="center"><input type="combo-box col-2"></td>
            </tr>
            <tr>
                <td align="center">Fevereiro</td>
                <td align="center"><input type="combo-box col-2"></td>
            </tr>
            <tr>
                <td align="center">Março</td>
                <td align="center"><input type="combo-box col-2"></td>
            </tr>
            <tr>
                <td align="center">Abril</td>
                <td align="center"><input type="combo-box col-2"></td>
            </tr>
            <tr>
                <td align="center">Maio</td>
                <td align="center"><input type="combo-box col-2"></td>
            </tr>
            <tr>
                <td align="center">Junho</td>
                <td align="center"><input type="combo-box col-2"></td>
            </tr>
            <tr>
                <td align="center">Julho</td>
                <td align="center"><input type="combo-box col-2"></td>
            </tr>
            <tr>
                <td align="center">Agosto</td>
                <td align="center"><input type="combo-box col-2"></td>
            </tr>
            <tr>
                <td align="center">Setembro</td>
                <td align="center"><input type="combo-box col-2"></td>
            </tr>
            <tr>
                <td align="center">Outubro</td>
                <td align="center"><input type="combo-box col-2"></td>
            </tr>
            <tr>
                <td align="center">Novembro</td>
                <td align="center"><input type="combo-box col-2"></td>
            </tr>
            <tr>
                <td align="center">Dezembro</td>
                <td align="center"><input type="combo-box col-2"></td>
            </tr>
        
            
    </table>
    <div class="container">
        <button class="btn btn-primary"  id="btn_instituicao">Salvar</button>
    </div>
@stop