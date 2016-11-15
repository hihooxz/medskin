<?php $this->load->view('default/template/nav');?>
<div class="position-content">
	<div class="container">
		<!-- Start Appointment -->
			<div class="ms-appointment-no-border">
				<div class="alert alert-warning fade in">
						    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						    <strong>How dear</strong>, Your amount is not enough to make this appointment.<br />
						    <i class="fa fa-arrow-left fa-fw"></i> <a href="<?php echo base_url($this->uri->segment(1).'/find-doctor')?>">Back to Find Doctor</a>
						  </div>
			</div>
		<!-- End of Appointment -->
	</div>
	<div class="celarfix"></div>	
</div>
	<?php $this->load->view('default/common/script');?>
</body>
</html>	