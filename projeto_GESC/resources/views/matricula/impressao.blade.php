<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link rel="stylesheet" href="public/css/style.css">
    <title>Impressão Matrícula</title>
</head>
<body>
    <div >
            <h4 class="text-center content text-uppercase">ASSOCIAÇÃO DE PROMOÇÃO À MENINA - APAM</h4>
    </div>
    <br>
    <div>
        <h6>IDENTIFICAÇÃO</h6>
        <label>NOME: <span>  {{ $dadoscrianca->nomecrianca }} </span> </label>
        &nbsp;&nbsp;&nbsp;&nbsp;
        <label>DATA DE NASCIMENTO: <span>{{ $dadoscrianca->nascimentocrianca }}</span> </label> 
        <br>
        <label>CPF: {{ $dadoscrianca->cpfcrianca }}</label>
        &nbsp;&nbsp;&nbsp;&nbsp;
        <label>RG: {{ $dadoscrianca->rgcrianca }}</label>
        &nbsp;&nbsp;&nbsp;&nbsp;
        <label>SEXO: {{ $dadoscrianca->sexocrianca }}</label>
        <br>
        <label>ENDEREÇO: <span>{{ $dadoscrianca->logradouro }}.</span> </label>
        <label>Nº: {{ $dadoscrianca->ncasa }}</label>
        &nbsp;&nbsp;&nbsp;&nbsp;
        <label>BAIRRO: {{ $dadoscrianca->bairro }}</label>
       <br>
        <label>CEP: {{ $dadoscrianca->cep }}</label>
        &nbsp;&nbsp;&nbsp;&nbsp;
        <label>COMPLEMENTO: {{ $dadoscrianca->complementoendereco }} </label>
        <br>
        <label>OBSERVAÇÕES: {{ $dadoscrianca->obssaude }} </label>
        <br>
        <label>ESCOLA EM QUE ESTUDA: {{ $dadoscrianca->nomeescola }}</label>
    </div>
    <br>
    <div>
        <h6>IDENTIFICAÇÃO FAMILIAR</h6>
        <h6 class="text-upercase">Dados do(s) Responsável(veis)</h6>
        @foreach($responsaveis as $responsavel)
            <label>NOME: {{ $responsavel->nomeresponsavel }}</label>
            &nbsp;&nbsp;&nbsp;&nbsp;
            <label>DATA DE NASCIMENTO: {{ $responsavel->nascimentoresponsavel }}</label>
            <br>
            <label>CPF: {{ $responsavel->cpfresponsavel }}</label>
            &nbsp;&nbsp;&nbsp;&nbsp;
            <label>RG: {{ $responsavel->rgresponsavel }}</label>
            &nbsp;&nbsp;&nbsp;&nbsp;
            <label>SEXO: {{ $responsavel->sexoresponsavel }}</label>
            &nbsp;&nbsp;&nbsp;&nbsp;
            <label>ESCOLARIDADE: {{ $responsavel->escolaridade }}</label>
            <br>
            <label>ESTADO CIVIL: {{ $responsavel->estadocivil }}</label>
            <br>
            <label>PROFISSÃO: {{ $responsavel->profissao }}</label>
            &nbsp;&nbsp;&nbsp;&nbsp;
            <label>LOCAL DE TRABALHO: {{ $responsavel->localtrabalho }}</label>
            <br>
            <label>OBSERVAÇÕES: {{ $responsavel->outrasobs }}</label>
            <br>
            <label>TELEFONE: {{ $responsavel->telefone }} / {{ $responsavel->telefone2 }}</label>
            <br>
        @endforeach
    </div>

    <div>
        <br>
        <h6>DADOS FAMILIARES</h6>
        <label>PROGRAMAS SOCIAIS</label>
        <br>
        @foreach ($dadosfamilia as $dadofamilia)
        
            @if( $dadofamilia->bolsafamilia == 1)
                <label>BOLSA FAMILIA: SIM</label>
            @endif
            @if( $dadofamilia->bolsafamilia == 0)
                <label>BOLSA FAMILIA: NÃO</label>
            @endif
            &nbsp;&nbsp;&nbsp;&nbsp;
            @if ($dadofamilia->beneficiopc == 1)
                <label>BENEFÍCIO PC: SIM</label>
            @endif
            @if ($dadofamilia->beneficiopc == 0)
                <label>BENEFÍCIO PC: NÃO</label>
            @endif
            @if ($dadofamilia->arearisco == 1)
                <label>AREA DE RISCO: SIM</label>
            @endif
            @if ($dadofamilia->arearisco == 0)
                <label>AREA DE RISCO: NÃO</label>
            @endif
            <br>
            <label>MORADIA: {{ $dadofamilia->moradia }}</label>
            &nbsp;&nbsp;&nbsp;&nbsp;
            <label>TIPO HABITAÇÃO: {{ $dadofamilia->tipohabitacao }}</label>
            <br>
            <label>{{ $dadofamilia->nomecras }}</label>
            <label>- NUMERO DO NIS: {{ $dadofamilia->numnis }}</label>

        @endforeach
       

    </div>
        

</body>
</html>
    

    
