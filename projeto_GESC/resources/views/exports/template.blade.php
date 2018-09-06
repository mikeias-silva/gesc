<html>
<!--<td colspan="4"><h1>TESTE</h1></td>-->
<table class="table table-bordered table-dark">
<tr>
  <td colspan="24">FUNDAÇÃO DE ASSISTENCIA SOCIAL DE PONTA GROSSA - FASPG</td>
</tr>
<tr>
  <td colspan="24">DEPARTAMENTO DE GESTÃO DO SUAS - DIVISÃO DE MONITORAMENTO</td>
</tr>
<tr>
  <td colspan="24">FREQUÊNCIA REFERENTE AO MÊS DE: {{$mes}}/2018</td>
</tr>
<tr>
  <td colspan="24">BLOCO 1- IDENTIFICAÇÃO DA ENTIDADE:</td>
</tr>
<tr>
  <td colspan="8">ENTIDADE MANTEDORA: {{$instituicao[0]->entidademantenedora}}</td>
  <td colspan="8">ENTIDADE EXECUTORA: {{ $instituicao[0]->entidadeexecutora }}</td>
  <td colspan="8"></td>
</tr>
<tr>
  <td colspan="8">ENDEREÇO DE EXECUÇÃO DO SERVIÇO: {{ $instituicao[0]->logradouro }}</td>
  <td colspan="8"></td>
  <td colspan="8">E-MAIL: {{ $instituicao[0]->email }}</td>
</tr>
<tr>
  <td colspan="8">NÚMERO DO PLANO DE TRABALHO: {{ $instituicao[0]->numplanotrabalho }}</td>
  <td colspan="8">Nº DO TERMO DE COLABORAÇÃO/FOMENTO: {{ $instituicao[0]->numtermocolaboradorformento }}</td>
  <td colspan="8">Nº DE METAS MENSAIS PACTUADAS: {{ $instituicao[0]->nummetasmensais }}</td>
</tr>
<tr>
<td colspan="24" >BLOCO 2 – ATENDIMENTO NO SERVIÇO CONTRATADO:</td>
</tr>
<tr>
  <td colspan="3" rowspan="2">Nº DE PESSOAS ATENDIDAS NO MÊS ANTERIOR: {{$atendidos_mes_passado}}</td>
  <td colspan="5">Nº DE DIAS ÚTEIS COM ATENDIMENTO NO MÊS ATUAL: {{$dias_funcionamento}}</td>
  <td colspan="6">Nº DE PESSOAS EM LISTA DE ESPERA: {{$espera}}</td>
  <td colspan="10">Nº DE PESSOAS ATENDIDAS POR DIA (MÉDIA DIÁRIA): {{$media_atendimento_diario}}</td>
</tr>
<tr>
  <td colspan="5">Nº DE PESSOAS ATENDIDAS NO MÊS: {{$atendidos_mes}}</td>
  <td colspan="6">Nº DE VAGAS DISPONÍVEIS NO MÊS: {{$vagas_disponiveis}}</td>
  <td colspan="4">N º DE DESLIGAMENTOS OCORRIDOS NO MÊS: {{$desligados_mes}}</td>
  <td colspan="6">Nº DE USUÁRIOS NOVOS NO MÊS: {{$novos_mes}}</td>
</tr>
<tr>
  <td colspan="8">Nº DE USUÁRIOS ATENDIDOS QUE ESTÃO INSCRITOS NO CADÚNICO: {{$beneficiarios_cadunico}}</td>
  <td colspan="8">Nº DE USUÁRIOS ATENDIDOS PERTENCENTES À FAMÍLIAS BENEFICIÁRIAS DO PROGRAMA BOLSA FAMÍLIA: {{$beneficiarios_bolsafamilia}}</td>
  <td colspan="8">Nº DE USUÁRIOS ATENDIDOS QUE SÃO BENEFICIÁRIOS DO BPC - BENEFICIO DE PRESTAÇAO CONTINUADA: {{$beneficiarios_pc}}</td>
</tr>
<tr>
  <td colspan="24" >BLOCO 3 – IDENTIFICAÇÃO DOS USUÁRIOS:</td>
</tr>
</table>
</html>
