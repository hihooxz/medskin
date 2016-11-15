<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/asset_default/css/cus-login.css')?>">
	<?php $this->load->view('default/common/header');?>
</head>

<script type="text/javascript">
	$('.btn-login').submit(function(e){
		e.preventDefault();
		$('#overlay').css('display', 'block');http://localhost/medskin/assets/asset_default/image/a.png
		return true;
	});
</script>

<body>
<div class="container">
	<div class="bg-login">
		<img src="<?php echo base_url('assets/asset_default/image/logo-login.png')?>" class="img-responsive" width="200px" height="94px">
		<?php
			echo "<span style=\"color:#fff\"><center>".validation_errors()."</center></span>";
		?>
		<form class="form-horizontal form-login" id="form1" method="POST" action="">
			<div class="form-group">
				<div class="col-xs-12">
			  		<span class="icon-user"></span><input type="text" class="form-control" id="inputUsername" placeholder="Username" required="" name="username">
			  	</div>
			</div>
			<div class="form-group">
			    <div class="col-xs-12">
			      <span class="icon-pass"></span><input type="password" class="form-control" id="inputPassword" placeholder="Password" required="" name="password">
			    </div>
			</div>
		  	<button type="submit" class="btn btn-login" id="submit">LOGIN</button>
		</form>
		<a href="<?php echo base_url('page/register')?>" class="signup">Sign up to MedSkin</a>
		<a href="<?php echo base_url('page/forgot-password')?>" class="forgot">Forgot you password ?</a>
		<div id="overlay">
		     <img src="<?php echo base_url('assets/asset_default/image/feedback_loading.gif')?>" alt="Loading" class="img-responsive" />
		     Wait a moment
		</div>
	</div>
</div>
<script type="text/javascript">

function LoadData(){
    $("#overlay").show();
    $.ajax({
          url: <?php echo base_url('member/home')?>,
          cache: false,
          success: function(html){
            console.log('success');
            window.location = "<?php echo base_url('member/home')?>";
          },
          complete: function(){
            $("#overlay").hide();
          }
        });
}
	// $(document).ready(function(){

	// 	$(document).ajaxStart(function(){
	// 		$('#overlay').show(200);
	// 	})
	// 	.ajaxStop(function(){
	// 		$('#overlay').hide(200);
	// 	})
	// 	.ajaxComplete(function(){
	// 		$('#overlay').hide(200);
	// 	})
	// 	.ajaxError(function(){
	// 		$('#overlay').hide(200);
	// 	})
	// 	.ajaxSuccess(function(){
	// 		$('#overlay').hide(200);
	// 	});
	// });
 
</script>
</body>
</html>