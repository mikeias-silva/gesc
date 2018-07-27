@extends('layout.principal') 
@section('conteudo')

    <form action="">
    

        @foreach($instituicao as $i)
        <h3 >Nome Instituição</h3>
        <span>{{ $i->nomeinstituicao }}</span>
        <h3 >CNPJ</h3>
       <span> {{ $i->cnpj }}</span>
       <h3 >Logradouro</h3>
       <span>{{ $i->logradouro }}</span>
      

        @endforeach
        @foreach($cidadeins as $ci)
        <h3>Cidade/UF</h3>
        {{ $ci->nomecidade }}
        {{ $ci->siglaestado }}
        @endforeach
    </form>
    <button class="btn btn-primary" id="btn_instituicao">Salvar</button>
    <div class="container" id="meio">

    </div>
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