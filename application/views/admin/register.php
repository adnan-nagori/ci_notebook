<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin - Register</title>

  <!-- Custom fonts for this template-->
  <link href="<?php echo base_url();?>/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="<?php echo base_url();?>/assets/css/sb-admin.css" rel="stylesheet">

</head>

<body class="bg-dark">

  <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Register an Account</div>
      <div class="card-body">
        <?php
        if ($this->session->flashdata('message'))
        {
          echo '<div class="alert alert-success">'.$this->session->flashdata('message').'</div>';
        }
        ?>
        <form method="post" action="<?php echo base_url();?>admin/register/validation">
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" id="firstName" name="firstname" class="form-control" placeholder="First name" value="<?php echo set_value('firstname');?>" autofocus="autofocus">
                  <label for="firstName">First name</label>
                  <span class="text-danger"><?php echo form_error('firstname');?></span>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" id="lastName" name="lastname" class="form-control" placeholder="Last name" value="<?php echo set_value('lastname');?>">
                  <label for="lastName">Last name</label>
                  <span class="text-danger"><?php echo form_error('lastname');?></span>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="text" id="inputEmail" name="admin_email" class="form-control" placeholder="Email address" value="<?php echo set_value('admin_email');?>">
              <label for="inputEmail">Email address</label>
              <span class="text-danger"><?php echo form_error('admin_email');?></span>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="password" id="inputPassword" name="admin_password" class="form-control" placeholder="Password">
                  <label for="inputPassword">Password</label>
                  <span class="text-danger"><?php echo form_error('admin_password');?></span>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="password" id="confirmPassword" name="confirm_pass" class="form-control" placeholder="Confirm password" >
                  <label for="confirmPassword">Confirm password</label>
                  <span class="text-danger"><?php echo form_error('confirm_pass');?></span>
                </div>
              </div>
            </div>
          </div>
          <input type="submit" name="register" class="btn btn-primary btn-block" value="Register">
          <!-- <a class="btn btn-primary btn-block" href="login.html">Register</a> -->
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="<?php echo base_url();?>admin/login">Login Page</a>
          <a class="d-block small" href="forgot-password.html">Forgot Password?</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="<?php echo base_url();?>/assets/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url();?>/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url();?>/assets/vendor/jquery-easing/jquery.easing.min.js"></script>

</body>

</html>
