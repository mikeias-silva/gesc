@extends('layout.principal')
@section('conteudo')
<div class="container">
    <!--ABA IDENTIFICAÇÃO -->
    <h2>Cadastro Criança</h2>

    <form action="/adicionaCrianca" method="POST" 
    onsubmit="return validarCrianca(novaCrianca.nomecrianca, novaCrianca.datanascimentocrianca, novaCrianca.rgcrianca, novaCrianca.cpfcrianca);" name="novaCrianca">
            {{ csrf_field() }}
            <div class="form-group">
                
                    <input name="idresponsavel1" type="hidden" value="{{ $idresponsavel1 }}"/>
               
                
                @if (!empty($idresponsavel2 ))
                    <input name="idresponsavel2" type="hidden" value="{{ $idresponsavel2 }}"/> 
                @endif 
                @if (!empty($responsaveis[0]))
                    
                    <input name="idresponsavel1" type="hidden" value="{{ $responsaveis[0] }}"/> 
                
                    
                @endif 
                @if (!empty($responsaveis[1] ))
                    <input name="idresponsavel2" type="hidden" value="{{ $responsaveis[1] }}"/>
                @endif
                
            <div class="form-group ">
                <div class="row">
                    <div class="col-sm-6" >
                        <label>Nome</label>
                        <input type="text" class="form-control" name="nomecrianca" maxlength="255" autocomplete="off">
                        <span id="msgNomeCrianca"></span>
                    </div>
                         
                    <div class="col-sm-4">
                        <label>Nascimento</label>
                        <input type="date" class="form-control" name="datanascimentocrianca">
                        <span id="msgDataNascimento"></span>
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
                        <span id="msgRg"></span>
                    </div>

                    <div class="col-sm-4">
                        <label>CPF</label>
                        <input type="text" class="form-control" name="cpfcrianca" id="cpfcrianca" maxlength="11" autocomplete="off" onkeyup="mascara(this, Cpf);">
                        <span id="msgCpf"></span>
                    </div>

                   
                </div>
            </div>

            <div class="form-group " >
                <div class="row" >
                    <div class="col-sm-6">
                        <label>Público Prioritário</label>
                        <select name="pprioritario" id="" class="custom-select">
                            @foreach($pprioritario as $p)
                                <option value="{{ $p->idpublicoprioritario }}">{{ $p->publicoprioritario }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-6">
                        <label>Escola</label>
                        <select name="escola" id="" class="custom-select" >
                            @foreach($escolas as $e)
                                <option value="{{ $e->idescola }}">{{ $e->nomeescola }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            

            <div class="form-group">
                <div class="row">
                    
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
            <div class="float-right">
                <button type="submit" class="btn btn-success">Avançar
                   
                </button>
            </div>
        </form>
</div>

<script src="js/validaCrianca.js"></script>

@stop