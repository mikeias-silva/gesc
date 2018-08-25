
<div class="container py-5">
  <div class="row">
      <div class="col-md-12">
          <h2 class="text-center text-white mb-4">Bootstrap 4 Login Form</h2>
          <div class="row">
              <div class="col-md-6 mx-auto">

                  <!-- form card login -->
                  <div class="card rounded-0">
                      <div class="card-header">
                          <h3 class="mb-0">Login</h3>
                      </div>
                      <div class="card-body">
                          <form class="form" action="/login/autenticar"  role="form" autocomplete="off" id="formLogin" novalidate="" method="POST">
                          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                          <input type="hidden" name="statususuario" value="1">
                              <div class="form-group">
                                  <label for="uname1">Username</label>
                                  <input type="text" class="form-control form-control-lg rounded-0" name="nomeusuario" id="nomeusuario" required="">
                                  <div class="invalid-feedback">Oops, you missed this one.</div>
                              </div>
                              <div class="form-group">
                                  <label>Password</label>
                                  <input type="password" class="form-control form-control-lg rounded-0" id="password" name="password" required="" autocomplete="new-password">
                                  <div class="invalid-feedback">Enter your password too!</div>
                              </div>
                              <div>
                                  <label class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" name="remember">
                                    <span class="custom-control-indicator"></span>
                                    <span class="custom-control-description small text-dark">Remember me on this computer</span>
                                  </label>
                              </div>
                              <button type="submit" class="btn btn-success btn-lg float-right" id="btnLogin">Login</button>
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
<!--/container-->
