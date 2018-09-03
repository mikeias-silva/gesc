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
  <td colspan="8">ENTIDADE MANTEDORA:</td>
  <td colspan="8">ENTIDADE EXECUTORA:</td>
  <td colspan="8">CNPJ:</td>
</tr>
<tr>
  <td colspan="8">{{$instituicao[0]->entidademantenedora}}</td>
  <td colspan="8">{{ $instituicao[0]->entidadeexecutora }}</td>
  <td colspan="8"></td>
</tr>
<tr>
  <td colspan="8">ENDEREÇO DE EXECUÇÃO DO SERVIÇO:</td>
  <td colspan="8">TELEFONE:</td>
  <td colspan="8">E-MAIL:</td>
</tr>
<tr>
  <td colspan="8">{{ $instituicao[0]->logradouro }}</td>
  <td colspan="8"></td>
  <td colspan="8">{{ $instituicao[0]->email }}</td>
</tr>
<tr>
  <td colspan="8">NÚMERO DO PLANO DE TRABALHO:</td>
  <td colspan="8">Nº DO TERMO DE COLABORAÇÃO/FOMENTO:</td>
  <td colspan="8">Nº DE METAS MENSAIS PACTUADAS:</td>
</tr>
<tr>
  <td colspan="8">{{ $instituicao[0]->numplanotrabalho }}</td>
  <td colspan="8">{{ $instituicao[0]->numtermocolaboradorformento }}</td>
  <td colspan="8">{{ $instituicao[0]->nummetasmensais }}</td>
</tr>
<tr>
<td colspan="24" >BLOCO 2 – ATENDIMENTO NO SERVIÇO CONTRATADO:</td>
</tr>
<tr>
  <td colspan="3" rowspan="2"></td>
  <td colspan="5"></td>
  <td colspan="6">Nº DE PESSOAS EM LISTA DE ESPERA:</td>
  <td colspan="10">Nº DE PESSOAS ATENDIDAS POR DIA (MÉDIA DIÁRIA):</td>
</tr>
<tr>
  <td colspan="5">Nº DE PESSOAS ATENDIDAS NO MÊS:</td>
  <td colspan="6">Nº DE VAGAS DISPONÍVEIS NO MÊS:</td>
  <td colspan="4">N º DE DESLIGAMENTOS OCORRIDOS NO MÊS:</td>
  <td colspan="6">Nº DE USUÁRIOS NOVOS NO MÊS:</td>
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
