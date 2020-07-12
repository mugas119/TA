<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | Registration Page</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE/fontawesome-free/css/all.min.css')?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE/icheck-bootstrap/icheck-bootstrap.min.css')?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE/css/adminlte.min.css')?>">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="#"><b>Admin</b>LTE</a>
  </div>

  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Register a new membership</p>

      <?php echo form_open('register');?>
        <div class="input-group mb-3">
         
          <input type="text" class="form-control" name="nama"  placeholder="nama"/>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-microchip"></span>
            </div>
            <div class="input-group-text"><p><?php echo form_error('nama'); ?></p></div>
          </div>
        </div>

        <div class="input-group mb-3">
         
          <input type="text" class="form-control" name="username"  placeholder="Username"/>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-microchip"></span>
            </div>
            <div class="input-group-text"><p><?php echo form_error('username'); ?></p></div>
          </div>
        </div>

        <div class="input-group mb-3">
          <input type="email" class="form-control" name="email" placeholder="Email"/>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
            <div class="input-group-text"><p><?php echo form_error('email'); ?></p></div>
          </div>
        </div>
        
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password" placeholder="Password"/>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
            <div class="input-group-text"><p><?php echo form_error('password'); ?></p></div>
          </div>
        </div>
        
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password_conf" placeholder="Retype password"/>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
            <div class="input-group-text"><p> <?php echo form_error('password_conf'); ?> </p></div>
          </div>
        </div>
        
        <div class="row">
          <div class="col-12">
            <input type="submit" name="btnSubmit" class="btn btn-primary btn-block" value="Register"/>
          </div>
          <!-- /.col -->
        </div>
        <?php echo form_close();?>
        <span class="col-12"></span>
        <p class="text-center"><?php echo anchor(site_url().'login','I already have an account'); ?></p>
        <br>
        <p class="text-center text-danger"><?php echo anchor(site_url().'','Home'); ?></p>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="<?php echo base_url('assets/AdminLTE/jquery/jquery.min.js')?>"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url('assets/AdminLTE/bootstrap/js/bootstrap.bundle.min.js')?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/AdminLTE/js/adminlte.min.js')?>"></script>
</body>
</html>
