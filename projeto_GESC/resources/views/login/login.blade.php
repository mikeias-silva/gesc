@extends('layout.header')
@section('content')
    
<body>
        
   <div class="container py-5">
    <div class="row">
        <div class="col-md-12">
            <h2 class="text-center text-white mb-4">Bootstrap 4 Login Form</h2>
            <div class="row">
                <div class="col-md-6 mx-auto">

                    <!-- form card login -->
                    <div class="card rounded-0">
                        <div class="card-header">
                            <h3 class="mb-0">Entrar</h3>
                        </div>
                        <div class="card-body">
                            <form class="form" action="/login/autenticar"  role="form" autocomplete="off" name="login" id="formLogin" method="POST">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="statususuario" value="1">
                            @if((old('nomeusuario'))=="")

                            @else
                            <label class="alert alert-danger" role="alert">As credenciais informadas não estão corretas, ou seu usuário está inativo, por favor verifique ou entre em contato com a administração</label>
                            @endif
                                <div class="form-group">
                                    <label for="uname1">Usuário</label>
                                    <input type="text" class="form-control form-control-lg rounded-0" name="nomeusuario" id="nomeusuario" required="" autofocus value="{{old('nomeusuario')}}">
                                    <div class="invalid-feedback">Oops, you missed this one.</div>
                                </div>
                                <div class="form-group">
                                    <label>Senha</label>
                                    <input type="password" class="form-control form-control-lg rounded-0" id="password" name="password" required="" autocomplete="new-password">
                                    <div class="invalid-feedback">Enter your password too!</div>
                                </div>
                               <!--   <a href="#">Recuperar Senha</a>-->
                                <div>
                                    <label class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" name="remember">
                                        <span class="custom-control-indicator"></span>
                                    </label>
                                </div>
                                <button type="submit" class="btn btn-success btn-lg float-right" id="btnLogin">Entrar</button>
                            </form>
                        </div>
                        <!--/card-block-->
                    </div>
                    <!-- /form card login -->

                </div>


            </div>
            <!--/row-->

        </div>
        <!--/col-->
    </div>
    <!--/row-->
    </div> 

    </body>

 
@stop