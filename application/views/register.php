<!DOCTYPE html>
<html>
<head>
	<title>User Registration and Login</title>
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" />
</head>
<body>
	<div class="container">
		<h3 align="center">User Registration and Login</h3>
		<div class="panel panel-default">
			<div class="panel-heading">Register</div>
			<div class="panel-body">
				<?php
				if ($this->session->flashdata('message'))
				{
					echo '<div class="alert alert-success">'.$this->session->flashdata('message').'</div>';
				}
				?>
				<form method="post" action="<?php echo base_url();?>register/validation">
					<div class="form-group">
						<label>Enter Name</label>
						<input type="text" name="user_name" class="form-control" value="<?php echo set_value('user_name');?>">
						<span class="text-danger"><?php echo form_error('user_name');?></span>
					</div>
					<div class="form-group">
						<label>Enter Email</label>
						<input type="text" name="user_email" class="form-control" value="<?php echo set_value('user_email');?>">
						<span class="text-danger"><?php echo form_error('user_email');?></span>
					</div>
					<div class="form-group">
						<label>Enter Password</label>
						<input type="password" name="user_password" class="form-control" value="<?php echo set_value('user_password');?>">
						<span class="text-danger"><?php echo form_error('user_password');?></span>
					</div>
					<div class="form-group">
						<input type="submit" name="register" value="Register" class="btn btn-info" /> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<p> Already have account! <a href="<?php echo base_url();?>login">Login Here</a></p>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>
