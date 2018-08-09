@extends('layout.principal') 

@section('conteudo')

    <h1 class="text-center content text-uppercase">MATRICULA {{ $ano }}</h1>
    
    <a id="btn-imprimir" href="/pdfmatricula">imprimir</a>
    
@stop