@extends('layout.principal') 

@section('conteudo')
    <div id="tituloimpressao">
        <h3 class="text-center content text-uppercase">ASSOCIAÇÃO DE PROMOÇÃO À MENINA - APAM</h3>
    </div>
    <div >
        <div>
            <span>1- IDENTIFICAÇÃO</span>
        </div>
        <div >
            @foreach ($nome as $n)
            
                <label>NOME: {{$n->nomepessoa }}</label>
                &nbsp;&nbsp;&nbsp;&nbsp;
                <label>DATA DE NASCIMENTO:{{ $datanasc }}</label>
            
            @endforeach
        
        </div>
        <div>
            <label>ENDEREÇO:{{ $logradouro }}</label>
        </div>
    </div>
    

    
@stop