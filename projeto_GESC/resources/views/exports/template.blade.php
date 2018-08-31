<html>
<!--<td colspan="4"><h1>TESTE</h1></td>-->
<table class="table table-bordered table-dark">
<tr>
<td colspan="7">FUNDAÇÃO DE ASSISTENCIA SOCIAL DE PONTA GROSSA - FASPG</td>
</tr>
<tr>
<td colspan="7">DEPARTAMENTO DE GESTÃO DO SUAS - DIVISÃO DE MONITORAMENTO</td>
</tr>
<tr>
<td colspan="7">FREQUÊNCIA REFERENTE AO MÊS DE {{$mes}}/2018</td>
</tr>
<tr>
<td colspan="7">BLOCO 1- IDENTIFICAÇÃO DA ENTIDADE:</td>
</tr>
<tr>
<td colspan="3">ENTIDADE MANTEDORA: {{ $instituicao[0]->entidademantenedora }}</td>
<td colspan="2">ENTIDADE EXECUTORA: {{ $instituicao[0]->entidadeexecutora }}</td>
<td colspan="2">CNPJ: {{ $instituicao[0]->cnpj }}</td>
</tr>
<tr>
<td colspan="3">ENDEREÇO DE EXECUÇÃO DO SERVIÇO: {{ $instituicao[0]->logradouro }}</td>
<td colspan="2">TELEFONE: {{ $instituicao[0]->telefone }}</td>
<td colspan="2">E-MAIL: {{ $instituicao[0]->email }}</td>
</tr>
<tr>
<td colspan="3">NÚMERO DO PLANO DE TRABALHO: {{ $instituicao[0]->numplanotrabalho }}</td>
<td colspan="2">Nº DO TERMO DE COLABORAÇÃO/FOMENTO: {{ $instituicao[0]->numtermocolaboradorformento }}</td>
<td colspan="2">Nº DE METAS MENSAIS PACTUADAS: {{ $instituicao[0]->nummetasmensais }}</td>
</tr>
<tr>
<td colspan="7" >BLOCO 2 – ATENDIMENTO NO SERVIÇO CONTRATADO:</td>
</tr>
<tr>
  <td colspan="1" rowspan="2">Nº DE PESSOAS ATENDIDAS NO MÊS ANTERIOR:</td>
  <td colspan="1">Nº DE DIAS ÚTEIS COM ATENDIMENTO NO MÊS ATUAL:</td>
  <td colspan="1">Nº DE PESSOAS EM LISTA DE ESPERA:</td>
  <td colspan="4">Nº DE PESSOAS ATENDIDAS POR DIA (MÉDIA DIÁRIA):</td>
</tr>
<tr>
  <td colspan="1">Nº DE PESSOAS ATENDIDAS NO MÊS:</td>
  <td colspan="1">Nº DE VAGAS DISPONÍVEIS NO MÊS:</td>
  <td colspan="2">N º DE DESLIGAMENTOS OCORRIDOS NO MÊS:</td>
  <td colspan="2">Nº DE USUÁRIOS NOVOS NO MÊS:</td>
</tr>
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Handle</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td >Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td colspan="2">Larry the Bird</td>
      <td>@twitter</td>
    </tr>
  </tbody>
</table>
</html>
