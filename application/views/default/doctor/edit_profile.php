<!DOCTYPE html>
<html>
<head>
	<?php $this->load->view('default/common/header');?>
</head>

<body>
	<!-- <header>
		<nav class="navbar navbar-default cus-nav">
		  <div class="head">
		  	<div class="back">
		  		<a onclick="goBack()" href="" type="button" class="icon-back"></a>
		  	</div>
		  	<div class="title-page">Edit Profile</div>
		  </div>
		</nav>
	</header> -->
	<?php $this->load->view('default/template/nav_doctor');?>
	<div class="profile-content">
		<img src="<?php echo base_url('assets/asset_default/image/a.png')?>" class="img-responsive">

		<div class="profile-top">
			<div class="profile-img">
				
				
			</div>
			<div class="profile-edit">
				<a href="<?php echo base_url($this->uri->segment(1).'/view-profile/'.$this->session->userdata('userId'))?>" type="button" class="btn-edit"><i class="fa fa-arrow-left"></i> Profile</a>
			</div>
			<div class="row">
				<!-- <div style="color:#fff;font-weight:bold;padding-top:5%;font-size:12px;">
					<?php echo $result['full_name']?>
				</div> -->
			</div>
			<div class="content-part">
				<div class="container">
				<?php
				echo validation_errors();
					if($this->session->flashdata('form_success') == TRUE){
						?>
						<!-- Start Appointment -->
			<div class="ms-appointment-no-border">
				<div class="alert alert-success fade in">
						    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						    <strong>Yippie</strong>, You Just Success Edited Your Profile.<br />
						  </div>
			</div>
		<!-- End of Appointment -->
						<?php
					}
					if(isset($error)){
						?>
						<!-- Start Appointment -->
			<div class="ms-appointment-no-border">
				<div class="alert alert-warning fade in">
						    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						    <strong>Ouch</strong>, <?php echo $error;?><br />
						  </div>
			</div>
		<!-- End of Appointment -->
						<?php
					}
				?>
					<form class="form-horizontal form-register" method="POST" action="">
				<div class="form-group text-center" style="margin-top:50px">
					<?php
					if($result['avatar']!=""){
						?>
						<div class="col-xs-4 col-xs-offset-4">
						<img src="<?php echo base_url($result['avatar'])?>" class="img-responsive" data-toggle="modal" data-target="#avatarModal" style="cursor:pointer;"><i class="fa fa-upload fa-fw" data-toggle="modal" data-target="#avatarModal" style="cursor:pointer;"></i>
						</div>
						<?php
					}
					else{
						?>
						<i class="fa fa-user fa-5x" data-toggle="modal" data-target="#avatarModal" style="cursor:pointer;"></i>
						<i class="fa fa-upload fa-fw" data-toggle="modal" data-target="#avatarModal" style="cursor:pointer;"></i>
						<?php
					}
					?>
				</div>
				<div class="form-group">
					<label for="inputFname" class="col-xs-12 control-label">Name</label>
					<div class="col-xs-12">
						<input type="text" class="form-control input-error" id="inputFname" placeholder="Full Name" name="name" value="<?php echo $result['full_name']?>">
				      <span class="error"><?php echo form_error('name')?></span>
				    </div>
				</div>
			  <div class="form-group">
			  	<label for="inputPassword" class="col-xs-12 control-label">Password</label>
			    <div class="col-xs-12">
			      <input type="password" class="form-control" id="inputPassword" placeholder="Password" name="password">
			      <span class="error"><?php echo form_error('password')?></span>
			    </div>
			  </div>
			  <div class="form-group">
			  	<label for="inputConPassword" class="col-xs-12 control-label">Confirm Password</label>
			    <div class="col-xs-12">
			      <input type="password" class="form-control" id="inputConPassword" placeholder="Confirm Password" name="confirm">
			      <span class="error"><?php echo form_error('confirm')?></span>
			    </div>
			  </div>
			  <div class="form-group">
				  	<label for="inputUsername" class="col-xs-12 control-label">Email</label>
				    <div class="col-xs-12">
				      <input type="text" class="form-control input-error" id="inputEmail" placeholder="Email" name="email" value="<?php echo $result['email']?>">
				      <span class="error"><?php echo form_error('email')?></span>
				    </div>
				</div>
			  <div class="form-group">
				  	<label for="inputUsername" class="col-xs-12 control-label">Phone Number</label>
				    <div class="col-xs-12">
				      <input type="text" class="form-control input-error" id="inputEmail" placeholder="Phone Number" name="phone_number" value="<?php echo $result['phone_number']?>">
				      <span class="error"><?php echo form_error('phone_number')?></span>
				    </div>
				</div>
			  <div class="form-group">
			  	<label for="inputBirth" class="col-xs-12 control-label">Birthday</label>
			    <div class="col-xs-12">
				      <input type="text" class="form-control input-error" id="birthday" placeholder="Birthday" name="birthday" value="<?php if($result['birthday'] != "0000-00-00") echo date('d M Y',strtotime($result['birthday']))?>">
				      <span class="error"><?php echo form_error('birthday')?></span>
				    </div>
			  </div>
			  <div class="form-group">
				  	<label for="inputUsername" class="col-xs-12 control-label">Address</label>
				    <div class="col-xs-12">
				      <textarea class="form-control input-error" placeholder="Address" name="address"><?php echo $result['address']?></textarea>
				      <span class="error"><?php echo form_error('address')?></span>
				    </div>
				</div>
				<div class="form-group">
				  	<label for="inputUsername" class="col-xs-12 control-label">City</label>
				    <div class="col-xs-12">
				      <input type="text" class="form-control input-error" id="inputEmail" placeholder="City" name="city" value="<?php echo $result['city']?>">
				      <span class="error"><?php echo form_error('city')?></span>
				    </div>
				</div>
				<div class="form-group">
				  	<label for="inputUsername" class="col-xs-12 control-label">Province</label>
				    <div class="col-xs-12">
				      <input type="text" class="form-control input-error" id="inputEmail" placeholder="Province" name="province" value="<?php echo $result['province']?>">
				      <span class="error"><?php echo form_error('province')?></span>
				    </div>
				</div>
				<div class="form-group">
				  	<label for="inputUsername" class="col-xs-12 control-label">Experience</label>
				    <div class="col-xs-12">
				      <textarea class="form-control input-error" placeholder="Experience" name="experience"><?php echo $result['experience']?></textarea>
				      <span class="error"><?php echo form_error('experience')?></span>
				    </div>
				</div>
				<div class="form-group">
				  	<label for="inputUsername" class="col-xs-12 control-label">Gender</label>
				    <div class="col-xs-12">
				      <label><input type="radio" name="gender" value="1" <?php if($result['gender'] == 1) echo "checked";?>> Male</label>
				      <label><input type="radio" name="gender" value="2" <?php if($result['gender'] == 2) echo "checked";?>> Female</label>
				      <span class="error"><?php echo form_error('gender')?></span>
				    </div>
				</div>
 			<div class="form-group container">
 				<button type="submit" class="btn btn-green">SAVE</button>
 			</div>
			  
			</form>
				</div>
			</div>
		</div>

	</div>

	<!-- Modal -->
<div id="avatarModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
  <?php echo form_open_multipart($this->uri->segment(1).'/upload-avatar/')?>
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Upload New Avatar</h4>
      </div>
      <div class="modal-body">
        <input type="file" name="userfile">
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-default">Upload</button>
      </div>
    </div>
    <?php echo form_close()?>
  </div>
</div>
	<?php $this->load->view('default/common/script');?>
</body>
</html>

