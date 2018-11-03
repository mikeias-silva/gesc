@extends('layout.header')
@section('content')
<h1 class="h2 text-light">GESC </h1>
<h1 class="h2 mb-3 font-weight-normal text-light">Gerenciamento de Serviço de Convivência</h1>
        
<body class="container text-center" id="gesc" >
        
<div class="card-body ">
    <form class="form" action="	login/autenticar"  role="form" autocomplete="off" name="login" id="formLogin" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="statususuario" value="1">
            @if((old('nomeusuario'))=="")

            @else
             <label class="alert alert-danger" role="alert">As credenciais informadas não estão corretas, ou seu usuário está inativo, por favor verifique ou entre em contato com a administração</label>
            @endif
       
         <label for="inputEmail" class="sr-only col-md-3">Email address</label>
        <input name="nomeusuario" id="nomeusuario" required value="{{ old('nomeusuario')}}" type="" id="inputEmail" class="form-control col-md-3 centered
        " placeholder="Usuário" autofocus/>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" class="form-control col-md-3 centered" placeholder="Senha" required id="password" name="password" autocomplete="new-password">
       <div id="btn-login">
            <button class="btn btn-lg btn-primary btn-block col-md-3 centered" type="submit">Entrar</button>
        
        </div>
    <p class="mt-5 mb-3 text-muted">&copy; GESC-2018</p>
    </form>
</div>
</body>
@stop
