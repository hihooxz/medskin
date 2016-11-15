<!DOCTYPE html>
<html>
<head>
	<?php $this->load->view('default/common/header');?>
</head>
<script type="text/javascript">
	function openNav() {
		$('#navslide').show();
	    // document.getElementById("bs-example-navbar-collapse-1").style.width = "250px";
	}
	function closeNav() {
		$('#navslide').hide();
	    // document.getElementById("bs-example-navbar-collapse-1").style.width = "0";
	}
</script>
<body>
	<header>
		<nav class="navbar navbar-default cus-nav">
		  <div class="container-fluid">
		    <!-- Brand and toggle get grouped for better mobile display -->
		    <div class="navbar-header">
		      <button type="button" onclick="openNav()" class="navbar-toggle cus-navbar-header collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar cus-icon-bar"></span>
		        <span class="icon-bar cus-icon-bar"></span>
		        <span class="icon-bar cus-icon-bar"></span>
		      </button>
		      	<ol class="breadcrumb">
				  <li class="active"><a href="<?php echo base_url('doctor/home')?>">Home</a></li>
				</ol>
				<div class="right">
					<a href="<?php echo base_url('doctor/notification')?>">
					<i class="icon-notif"></i>
					<span class="fa-stack fa-sm" style="color:#ff0000;margin-left:-15px;font-size:10px">
					  <i class="fa fa-circle fa-stack-2x fa-fw"></i>
					  <i class="fa-stack-1x" style="color:#fff"><?php echo $this->mod->countNotification($this->session->userdata('userId'));?></i>
					</span>
					</a>
					<a href="<?php echo base_url('doctor/amount')?>">
						<!-- <i class="icon-wallet"></i>  -->
					<span style="margin-top:-5px;">
					IDR
					<?php 
		    			$profile = $this->mod->getDataWhere('user','id_user',$this->session->userdata('userId'));
						echo number_format($profile['amount']);
					?>
					</span> 
					</a>
				</div>
		    </div>

		    <!-- Collect the nav links, forms, and other content for toggling -->
		    <div class="collapse navbar-collapse" id="navslide">
		    	<div class="top-menu">
		    		<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
		    		<?php
		    			$profile = $this->mod->getDataWhere('user','id_user',$this->session->userdata('userId'));
		    			if($profile['avatar']!= ""){
		    				?>
		    				<img src="<?php echo base_url($profile['avatar'])?>" class="img-responsive img-circle">
		    				<?php
		    			}
		    			else{
		    				?>
		    				<div style="margin:50px 0 0 10px;">
								<span class="fa-stack fa-lg">
								  <i class="fa fa-circle fa-stack-2x"></i>
								  <i class="fa fa-user fa-stack-1x fa-inverse"></i>
								</span>
		    				</div>
		    				<?php
		    			}
		    		?>
		    		<h3><?php echo $this->session->userdata('username');?></h3>
		    	</div>
		    
		      <ul class="nav navbar-nav cus-navbar-nav">
		        <li class="active"><a href="<?php echo base_url('doctor/home')?>"><span class="icon-home"></span>Home<span class="sr-only">(current)</span></a></li>
		        <li><a href="<?php echo base_url('doctor/view-profile/'.$this->session->userdata('userId'))?>"><span class="icon-profile"></span>Profile</a></li>
		        <li><a href="<?php echo base_url('doctor/private-question')?>"><span class="icon-question"></span>Private Question</a></li>
		        <li><a href="<?php echo base_url('doctor/appointment')?>"><span class="icon-calendar"></span>Appointment</a></li>
		        <li><a href="<?php echo base_url('doctor/service-price')?>"><i class="fa fa-cog" style="color:#74be1f;margin-right:25px"></i> Set Service Price</a></li>
		        <li><a href="<?php echo base_url('doctor/logout')?>"><span class="icon-logout"></span>Logout</a></li>
		      </ul>
		    </div><!-- /.navbar-collapse -->
		  </div><!-- /.container-fluid -->
		</nav>
	</header>