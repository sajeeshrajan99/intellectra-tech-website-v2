<?php
session_start();
if ( isset( $_SESSION[ 'SESS_ADMINID' ] ) && ( trim( $_SESSION[ 'SESS_ADMINID' ] ) != '' ) ) {
	?> <script> window.location.href = window.location.origin + '/manage/dashboard'; </script> <?php
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>ADMIN LOGIN | INTELLECTRA TECH</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="dist/img/favicon.png" sizes="32x32" />
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="plugins/toastr/toastr.min.css">
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
<script src="plugins/jquery/jquery.min.js"></script>
<style>
  body{
    /*background: url("dist/img/slide4.jpg") !important;*/
    background-image: url("dist/img/why-choose.png") !important;
    background-size: cover !important;
    background-position: center !important;
    background-repeat: no-repeat !important;
    position: relative !important; 
  }
</style>
</head>
<body class="hold-transition login-page">
<div class="login-box" style="border-radius: 2rem !important; overflow:hidden;">
  <div class="card shadow-lg" style="border-radius: 2rem !important; overflow:hidden;">
    <div class="card-body login-card-body" style="border-radius: 2rem !important; overflow:hidden;">
    <div class="login-logo">
      <a href="../"><img src="dist/img/logo.png" class="w-50"></a>
    </div>
    <h4 class="text-center">ADMIN PANEL</h4>
      <p class="login-box-msg font-weight-bolder">Sign in to start your session</p>
      <form action="javascript:void(0)" method="post" id="getinForm">
        <div class="input-group mb-3">
          <input type="email" name="username" class="form-control form-control-lg" style="border-radius:1rem 0 0 1rem !important" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control form-control-lg" style="border-radius:1rem 0 0 1rem !important" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-dark btn-lg btn-block py-2" style="border-radius: 1rem;">Sign In</button>
          </div>
        </div>
      </form>
      <p class="text-center mb-1 mt-3 mb-2">
        <a href="javascript:void(0)" onclick="forgotPassword();" class="small text-dark">I forgot my password.</a>
      </p>
    </div>
  </div>
</div>
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="plugins/toastr/toastr.min.js"></script>
<script src="dist/js/adminlte.min.js"></script>
<script src="actions/getin.js"></script>
</body>
</html>
