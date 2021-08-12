<!-- https://www.studentstutorial.com/codeigniter/multicheck_insert# -->
<!DOCTYPE html>
<html>
<head>
	<title>User Registration and Login</title>
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" />
	<!-- <link rel="stylesheet" href="<?php //echo base_url();?>assets/css/fontawesome.min.css" /> -->
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/all.css" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
	<!--<script src="<?php //echo base_url();?>assets/js/fontawesome.min.js"></script>-->
	<script src="<?php echo base_url();?>assets/js/all.js"></script>
<style type="text/css">
.logout_button {
    border: 2px solid #428bca;
    width: 90px;
    background-color: #428bca;
    float: right;
    margin-bottom: 5px;
    margin-right: 18px;
}
.logout_button a{
	color: #ffffff;
}
.user_img {
    margin-bottom: 8px;
}
svg.svg-inline--fa.fa-times-circle.fa-w-16 {
    position: absolute;
    top: -5px;
    right: -2px;
    color: #a00;
    background: #fff;
    border-radius: 50%;
}
</style>
</head>
<body>
	<?php //echo "<pre>"; print_r($user); echo "</pre>"; ?>
	<?php //echo "<pre>"; print_r($img); echo "</pre>";?>
	<div class="container">
		<div class="row">
			<h3 align="center">Dashboard</h3>
		</div>
		<div class="row">
			<div class="logout_button btn" align="right"><!-- <p align="right"> --><a href="<?php echo base_url();?>private_area/logout">Logout</a><!-- </p> --></div>	
		</div>
		<div class="panel panel-default">
			<div class="panel-heading">My Profile</div>
			<div class="panel-body">
				<?php
				if ($this->session->flashdata('message'))
				{
					echo '<div class="alert alert-success">'.$this->session->flashdata('message').'</div>';
				}
				?>
				<form method="post" action="<?php echo base_url();?>private_area/updateData" name="user_dash" enctype="multipart/form-data">
					<div class="row">
						<div class="form-group user_photo">
							<div class="col-md-4">
								<!-- <label>Upload Your Profile picture</label> -->
							<?php if($user['user_photo']){
									echo '<img src="'.base_url().'uploads/'.$user["user_photo"].'"  style="height:100px; width:100px;" class="user_img">';	
								}else{
									echo '<img src="'.base_url().'uploads/User_Circle.png" style="height:100px; width:100px;" class="user_img">';
								}
							?>
								<input type="file" name="user_photo" class="">
								<!-- <input type="file" name="user_photo" class="" value="<?php //if($user['user_photo'] != ''){ echo $user['user_photo'];}else{ echo '';}?>"> -->
								<span class="text-danger"><?php echo form_error('user_photo');?></span>
							</div>
							<div class="col-md-4">
								<!-- <label>Upload Your Profile picture</label> -->
								<?php if($user['user_photo1']){
									echo '<img src="'.base_url().'uploads/'.$user["user_photo1"].'"  style="height:100px; width:100px;" class="user_img">';	
								}else{
									echo '<img src="'.base_url().'uploads/User_Circle.png" style="height:100px; width:100px;" class="user_img">';
								}
								?>
								<input type="file" name="user_photo1" class="user_img">
								<!-- <input type="file" name="user_photo" class="" value="<?php //if($user['user_photo'] != ''){ echo $user['user_photo'];}else{ echo '';}?>"> -->
								<span class="text-danger"><?php echo form_error('user_photo1');?></span>
							</div>
							
						</div>
					</div>
					<div class="form-group">
						<input type="hidden" name="user_id" class="form-control" value="<?php echo $user['user_id'];?>">
						<label>Your Name</label>
						<input type="text" name="user_name" class="form-control" value="<?php if (isset($user['user_name'])) echo $user['user_name'];?>" readonly>
						<span class="text-danger"><?php //echo form_error('user_name');?></span>
					</div>
					<div class="form-group">
						<label>Your Email</label>
						<input type="text" name="user_email" class="form-control" value="<?php if (isset($user['user_email'])) echo $user['user_email'];?>" readonly>
						<span class="text-danger"><?php //echo form_error('user_email');?></span>
					</div>
					<div class="form-group">
						<label>Contact Number</label>
						<input type="text" name="user_phone" class="form-control" value="<?php if (isset($user['user_phone'])) echo $user['user_phone'];?>">
						<span class="text-danger"><?php //echo form_error('user_phone');?></span>
					</div>
					<div class="form-group">
						<label>Address</label>
						<input type="text" name="user_address" class="form-control" value="<?php if (isset($user['user_address'])) echo $user['user_address'];?>">
						<span class="text-danger"><?php //echo form_error('user_address');?></span>
					</div>
					<div class="form-group">
						<label>Gender</label>
						<div class="radio">
      						<label><input type="radio" name="user_gender" class="" value="Male" <?php if($user['user_gender'] == 'Male'){ echo 'checked'; } ?>>Male</label>
    					</div>
    					<div class="radio">
      						<label><input type="radio" name="user_gender" class="" value="Female" <?php if($user['user_gender'] == 'Female'){ echo 'checked'; } ?>>Female</label>
    					</div>
						
						<span class="text-danger"><?php //echo form_error('user_gender');?></span>
					</div>
					<div class="form-group">
						<label>Hobbies</label>
						<?php $user_hobbies = explode(",",$user['user_hobbies']); ?>
						<div class="checkbox">
							<label><input type="checkbox" name="user_hobbies[]" value="swimming" <?php if (in_array("swimming", $user_hobbies)) { echo ' checked="checked"'; } ?>>Swimming</label>	
						</div>
						<div class="checkbox">
							<label><input type="checkbox" name="user_hobbies[]" value="football" <?php if (in_array("football", $user_hobbies)) { echo 'checked="checked"'; } ?>>Football</label>
						</div>
						<div class="checkbox">
							<label><input type="checkbox" name="user_hobbies[]" value="cricket" <?php if (in_array("cricket", $user_hobbies)) { echo 'checked="checked"'; } ?>>Cricket</label>
						</div>
						<div class="checkbox">
							<label><input type="checkbox" name="user_hobbies[]" value="wrestling" <?php if (in_array("wrestling", $user_hobbies)) { echo 'checked="checked"'; } ?>>Wrestling</label>
						</div>
						<span class="text-danger"><?php //echo form_error('user_hobbies');?></span>
					</div>
					<div class="form-group">
						<label>State</label>
						<select name="user_state" class="form-control" id="state_sel">
							<option value="">Please Select State</option>
							<?php foreach ($statall as $key => $value) { ?>
								<option value="<?php echo $value->ID;?>" <?php if($user['user_state'] == $value->state_name){ echo 'selected="selected"'; } ?> oval="<?php echo $value->state_name; ?>"><?php echo $value->state_name; ?></option>
							<?php } ?>
						</select>
						<span class="text-danger"><?php //echo form_error('user_state');?></span>
					</div>
					<div class="form-group">
						<label>City</label>
						<select name="user_city" class="form-control" id="city_sel">
						<?php if ($user['user_city']) { 
								echo '<option value="'.$user["user_city"].'">'.$user["user_city"].'</option>';
							}else{
								echo '<option value="">Select City</option>';
							}
						?>
						</select>
						<span class="text-danger"><?php //echo form_error('user_city');?></span>
					</div>
					<div class="row">
						<div class="form-group">
							<div class="col-md-12"><label>Upload Gallery Images (Max 8 Images)</label></div>
							<?php 
								$usr_gl = explode(',', $user['user_gallery']);
								if($usr_gl){
									
									foreach($usr_gl as $usr_gls){ 
										echo '<div class="col-md-1 item">';
							        	echo '<img src="'.base_url().'uploads/gallery/'.$usr_gls.'" style="height:75px; width:75px;" class="user_img" ><i class="fa fa-times-circle"></i>';
							        	echo '</div>';
									} 
								} ?>
							<div class="col-md-12"><input type="file" name="user_gal[]"  multiple="multiple" class="user_img"></div>
							<span class="text-danger"><?php echo form_error('user_gal');?></span>
						</div>
					</div>
					<div class="form-group">
						<input type="submit" name="update" class="btn btn-info" value="Update">
					</div>
				</form>
			</div>
		</div>
	</div>


<script type="text/javascript">
	 $(document).ready(function() {
        $('#state_sel').on('change', function() {
            var stateID = $(this).val();
            if(stateID != '')
            {
                $.ajax({
                    url:"<?php echo base_url(); ?>private_area/fetch_city",
                    method:"POST",
                    data:{stateID:stateID},
                    success:function(data)
                    {
                        $('#city_sel').html(data);
                    }
                });
            }
            else
            {
                $('#city_sel').html('<option value="">Select City</option>');
            }
        });
    });
</script>
</body>
</html>