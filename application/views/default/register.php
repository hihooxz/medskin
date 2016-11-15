<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/asset_default/css/cus-register.css')?>">
  	<?php $this->load->view('default/common/header');?>
</head>
<body>
	<header>
		<nav class="navbar navbar-default cus-nav">
			<div class="head">
			  	<div class="back">
			  		<a href="<?php echo base_url('page/login')?>" type="button" class="icon-back"></a>
			  	</div>
			  	<div class="title-page">Sign Up</div>

				<!-- <a href="#" class="btn-save">SAVE</a> -->
		    </div>
		</nav>
	</header>
	<div class="register">
		<div class="container">
			<?php
					if($this->session->flashdata('success_form')==TRUE){
						?>
						<div class="alert alert-success fade in">
						    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						    <strong>Yippie!</strong> You have successfully registered. Please Login to your account
						  </div>
						<?php
					}
			?>
			<form class="form-horizontal form-register" method="POST" action="">
				<div class="form-group list-error">
					<!-- <span class="error">Correct the following error: Username.</span> -->
				</div>
				<div class="form-group">
					<label for="inputFname" class="col-xs-12 control-label">Name</label>
					<div class="col-xs-12">
				      <input type="text" class="form-control input-error" id="inputFname" placeholder="Full Name" name="name">
				      <span class="error"><?php echo form_error('name')?></span>
				    </div>
				</div>
				<div class="form-group">
				  	<label for="inputUsername" class="col-xs-12 control-label">Username</label>
				    <div class="col-xs-12">
				      <input type="text" class="form-control input-error" id="inputUsername" placeholder="Username" name="username">
				      <span class="error"><?php echo form_error('username')?></span>
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
				      <input type="text" class="form-control input-error" id="inputEmail" placeholder="Email" name="email">
				      <span class="error"><?php echo form_error('email')?></span>
				    </div>
				</div>
			  <div class="form-group">
			  	<label for="inputBirth" class="col-xs-12 control-label">Birthday</label>
			    <!-- <div class="col-xs-4">
			    	<select class="form-control">
			    	<?php 
			    		for($iM =1;$iM<=12;$iM++){
							?>
							<option><?php echo date("M", strtotime("$iM/12/10"))?></option>
							<?php
						}
			    	?>
					</select>
			    </div>
			    <div class="col-xs-4">
			    	<input type="text" class="form-control" id="inputDay" placeholder="Day">
			    </div>
			    <div class="col-xs-4">
			    	<input type="text" class="form-control" id="inputYear" placeholder="Year">
			    </div> -->
			    <div class="col-xs-12">
				      <input type="text" class="form-control input-error" id="birthday" placeholder="Birthday" name="birthday">
				      <span class="error"><?php echo form_error('birthday')?></span>
				    </div>
			  </div>
 			<div class="form-group container">
 				<button type="submit" class="btn btn-green">SAVE</button>
 				<a href="<?php echo base_url('page/register-doctor')?>"> Sign Up as Doctor?</a>
 			</div>
			  
			</form>
		</div>
	</div>
	<?php $this->load->view('default/common/script');?>
</body>
</html>