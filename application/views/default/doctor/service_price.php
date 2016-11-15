<?php $this->load->view('default/template/nav_doctor');?>
<div class="position-content">
	<div class="container">
			<div class="ms-appointment-no-border">
				<?php
					if($this->session->flashdata('success_form')==TRUE){
						?>
						<div class="alert alert-success fade in">
						    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						    <strong>Yippie!</strong> You have successfully changed price.
						  </div>
						<?php
					}
					if(!$this->form_validation->run() && isset($_POST['appointment_fare'])){
						?>
						<div class="alert alert-warning fade in">
						    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						    <strong>Hey!</strong> <?php echo validation_errors();?>
						  </div>
						<?php
					}
				?>
				<form method="POST" action="">
				<label>Appointment Price (per visit)</label>
				<div class="input-group margin-bottom-xs">
					<span class="input-group-addon"><i class="fa fa-map-marker fa-fw" aria-hidden="true"></i></span>
					 <input type="text" name="appointment_fare" class="form-control" placeholder="" value="<?php 
					 if($result!=FALSE) echo $result['appointment_fare']; else echo 0;?>">
				</div>
				<label>Consultation Price (per chat)</label>
				<div class="input-group margin-bottom-xs">
					<span class="input-group-addon"><i class="fa fa-comment fa-fw" aria-hidden="true"></i></span>
					 <input type="text" name="consultation_fare" class="form-control" placeholder="" value="<?php 
					 if($result!=FALSE) echo $result['consultation_fare']; else echo 0;?>">
				</div>
				<div class="form-group">
				<br />
					<button type="submit" class="btn btn-green form-control">Save <i class="fa fa-check fa-fw"></i></button>
				</div>
				<form>
			</div>
	</div>
</div>
	<script type="text/javascript">
		 $(".cus-nav-tabs a").click(function(event) {
	        event.preventDefault();
	        $(this).parent().addClass("active");
	        $(this).parent().siblings().removeClass("active");
	        var tab = $(this).attr("href");
	        $(".tab-content").not(tab).css("display", "none");
	        $(tab).fadeIn();
	    });
	</script>
</body>
</html>