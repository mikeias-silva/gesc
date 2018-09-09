<html>
<!--<td colspan="4"><h1>TESTE</h1></td>-->
<table class="table table-bordered table-dark">
<tr>
  <td colspan="27">FUNDAÇÃO DE ASSISTENCIA SOCIAL DE PONTA GROSSA - FASPG</td>
</tr>
<tr>
  <td colspan="27">DEPARTAMENTO DE GESTÃO DO SUAS - DIVISÃO DE MONITORAMENTO</td>
</tr>
<tr>
  <td colspan="27">FREQUÊNCIA REFERENTE AO MÊS DE: {{$mesdesc}}/2018</td>
</tr>
<tr>
  <td colspan="27">BLOCO 1- IDENTIFICAÇÃO DA ENTIDADE:</td>
</tr>
<tr>
  <td colspan="10">ENTIDADE MANTEDORA: {{$instituicao[0]->entidademantenedora}}</td>
  <td colspan="8">ENTIDADE EXECUTORA: {{ $instituicao[0]->entidadeexecutora }}</td>
  <td colspan="9"></td>
</tr>
<tr>
  <td colspan="10">ENDEREÇO DE EXECUÇÃO DO SERVIÇO: {{ $instituicao[0]->logradouro }}</td>
  <td colspan="8"></td>
  <td colspan="9">E-MAIL: {{ $instituicao[0]->email }}</td>
</tr>
<tr>
  <td colspan="10">NÚMERO DO PLANO DE TRABALHO: {{ $instituicao[0]->numplanotrabalho }}</td>
  <td colspan="8">Nº DO TERMO DE COLABORAÇÃO/FOMENTO: {{ $instituicao[0]->numtermocolaboradorformento }}</td>
  <td colspan="9">Nº DE METAS MENSAIS PACTUADAS: {{ $instituicao[0]->nummetasmensais }}</td>
</tr>
<tr>
<td colspan="27" >BLOCO 2 – ATENDIMENTO NO SERVIÇO CONTRATADO:</td>
</tr>
<tr>
  <td colspan="3" rowspan="2">Nº DE PESSOAS ATENDIDAS NO MÊS ANTERIOR: {{$atendidos_mes_passado}}</td>
  <td colspan="6">Nº DE DIAS ÚTEIS COM ATENDIMENTO NO MÊS ATUAL: {{$dias_funcionamento}}</td>
  <td colspan="6">Nº DE PESSOAS EM LISTA DE ESPERA: {{$espera}}</td>
  <td colspan="12">Nº DE PESSOAS ATENDIDAS POR DIA (MÉDIA DIÁRIA): {{$media_atendimento_diario}}</td>
</tr>
<tr>
  <td colspan="6">Nº DE PESSOAS ATENDIDAS NO MÊS: {{$atendidos_mes}}</td>
  <td colspan="6">Nº DE VAGAS DISPONÍVEIS NO MÊS: {{$vagas_disponiveis}}</td>
  <td colspan="4">N º DE DESLIGAMENTOS OCORRIDOS NO MÊS: {{$desligados_mes}}</td>
  <td colspan="8">Nº DE USUÁRIOS NOVOS NO MÊS: {{$novos_mes}}</td>
</tr>
<tr>
  <td colspan="9">Nº DE USUÁRIOS ATENDIDOS QUE ESTÃO INSCRITOS NO CADÚNICO: {{$beneficiarios_cadunico}}</td>
  <td colspan="8">Nº DE USUÁRIOS ATENDIDOS PERTENCENTES À FAMÍLIAS BENEFICIÁRIAS DO PROGRAMA BOLSA FAMÍLIA: {{$beneficiarios_bolsafamilia}}</td>
  <td colspan="10">Nº DE USUÁRIOS ATENDIDOS QUE SÃO BENEFICIÁRIOS DO BPC - BENEFICIO DE PRESTAÇAO CONTINUADA: {{$beneficiarios_pc}}</td>
</tr>
<tr>
  <td colspan="27" >BLOCO 3 – IDENTIFICAÇÃO DOS USUÁRIOS:</td>
</tr>
<tr>
  <td colspan="1" rowspan="2" >Nº</td>
  <td colspan="5" rowspan="2">NOME COMPLETO DO USUÁRIO</td>
  <td colspan="3" rowspan="2">Nº DO NIS</td>
  <td colspan="3" rowspan="2">CRAS/CREAS</td>
  <td colspan="3" rowspan="2">VILA/BAIRRO</td>
  <td colspan="4" rowspan="2">PÚBLICO PRIORITÁRIO</td>
  <td colspan="3" rowspan="2">SERVIÇO</td>
  <td colspan="5" >FREQUÊNCIA</td>
</tr>
<tr>
  <td colspan="2" >Nº</td>
  <td colspan="3" >%</td>
</tr>
<?php
  $cont=1;
?>
@foreach ($lista_ativos as $aluno)
  <tr>
    <td colspan="1">{{$cont}}</td>
    <td colspan="5">{{$aluno->nomepessoa}}</td>
    <td colspan="3">{{$aluno->numnis}}</td>
    <td colspan="3">{{$aluno->nomecras}}</td>
    <td colspan="3">{{$aluno->bairro}}</td>
    <td colspan="4">{{$aluno->publicoprioritario}}</td>
    <td colspan="3">SCFV {{$aluno->idademin}} a {{$aluno->idademax}} anos</td>
    <td colspan="2">{{$aluno->totalfaltas}}</td>
    <?php
      $media= ($aluno->totalfaltas*100)/$dias_funcionamento;
    ?>
    <td colspan="3">{{round($media, 2)}}</td>
  </tr>
  <?php
    $cont++;
  ?>
@endforeach
<tr>
  <td colspan="27" >USUÁRIOS DESLIGADOS NO MÊS:</td>
</tr>
<tr>
  <td colspan="1" >Nº</td>
  <td colspan="5">NOME COMPLETO DO USUÁRIO</td>
  <td colspan="4" >Nº DO NIS</td>
  <td colspan="3">CRAS/CREAS</td>
  <td colspan="3" >DATA DO DESLIGAMENTO:</td>
  <td colspan="11">MOTIVO</td>
</tr>
<?php
  $cont=1;
?>
@foreach ($lista_desligamentos as $desligamento)
  <tr>
    <td colspan="1">{{$cont}}</td>
    <td colspan="5">{{$desligamento->nomepessoa}}</td>
    <td colspan="4">{{$desligamento->numnis}}</td>
    <td colspan="3">{{$desligamento->nomecras}}</td>
    <td colspan="3">{{$desligamento->datainativacao}}</td>
    <td colspan="11">{{$desligamento->motivoinativacao}}</td>
  </tr>
  <?php
    $cont++;
  ?>
@endforeach
<tr>
  <td colspan="27" >USUÁRIOS NOVOS NO MÊS:</td>
</tr>
<tr>
  <td colspan="1">Nº</td>
  <td colspan="5">NOME COMPLETO DO USUÁRIO</td>
  <td colspan="4">Nº DO NIS</td>
  <td colspan="4">FONE DE CONTATO</td>
  <td colspan="3">VILA/BAIRRO</td>
  <td colspan="3">DATA DO ENTRADA</td>
  <td colspan="7">FORMA DE ACESSO</td>
</tr>
<?php
  $cont=1;
?>
@foreach ($lista_novos as $novo)
  <tr>
    <td colspan="1">{{$cont}}</td>
    <td colspan="5">{{$novo->nomepessoa}}</td>
    <td colspan="4">{{$novo->numnis}}</td>
    <td colspan="4">{{$novo->telefone}}</td>
    <td colspan="3">{{$novo->bairro}}</td>
    <td colspan="3">{{$novo->dataativacao}}</td>
    <td colspan="7">Demanda Espontânea</td>
  </tr>
  <?php
    $cont++;
  ?>
@endforeach
<tr>
  <td colspan="27" >BLOCO 4 – AÇÕES EXECUTADAS:</td>
</tr>
<tr>
  <td colspan="27">DESCRIÇÃO DAS ATIVIDADES EXECUTADAS DURANTE O MÊS NO SERVIÇO CONTRATADO:</td>
</tr>

<tr>
  <td colspan="27">{{$descricaoatividade}}</td>

<tr>
  <td colspan="27">ATENDIMENTOS DA EQUIPE TÉCNICA DE NÍVEL SUPERIOR:</td>
</tr>
<tr>
  <td colspan="7">Nº DE VISITAS DOMICILIARES [ {{$visitasdomiciliares}} ]</td>
  <td colspan="9">Nº DE REUNIÕES DE ACOLHIDA E/OU AVALIAÇÃO [ {{$reuniaoacolhimento}} ]</td>
  <td colspan="11">Nº DE ATENDIMENTOS INDIVIDUAIS [ {{$atendimentosindividuais}} ]</td>
</tr>
<tr>
  <td colspan="7">Nº DE ATENDIMENTOS EM GRUPO [ {{$atendimentosgrupo}} ]</td>
  <td colspan="9">Nº DE ENCAMINHAMENTOS PARA CRAS E CREAS [ {{$encaminhamentos}} ]</td>
  <td colspan="11">Nº DE ENCAMINHAMENTOS PARA REDE PRIVADA [ {{$encaminhamentoprivada}} ]</td>
</tr>
<tr>
  <td colspan="27">Nº DE PLANOS INDIVIDUAL E OU/FAMILIAR DE ATENDIMENTO (PIA, PAF, PDU E SIMILARES) ELABORADOS [ {{$planoelaborado}} ]</td>
</tr>
<tr>
  <td colspan="27">OBSERVAÇÕES: {{$obs}}</td>
</tr>
<tr>
  <td colspan="27">BLOCO 5 – IDENTIFICAÇAO DO RESPONSÁVEL:</td>
</tr>
<tr>
  <td colspan="10" rowspan="2">NOME DO RESPONSÁVEL TÉCNICO DO SERVIÇO: {{$nomeresponsaveltec}}</td>
  <td colspan="8" rowspan="2">PROFISSÃO E Nº DE REGISTRO DE CLASSE: {{$profissao}}</td>
  <td colspan="9" rowspan="2">CPF: {{$cpfresponsavel}}</td>
</tr>
</table>
</html>
