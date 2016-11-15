<?php $this->load->view('default/template/nav');?>
<div class="position-content">
	<div class="container">
		<h2>Confirm Payment</h2>
		<?php
			if($this->session->flashdata('confirmPayment') == TRUE){
				?>
				<div class="alert alert-success fade in">
						    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						    <strong>Yippie</strong>, You have succesfully confirm your payment. Please Wait until we process your transaction. Thank you<br />
						  </div>
				<?php
			}
		?>
		<!-- Start Appointment -->
		<div class="row">
			<div class="ms-appointment-booked">
				<?php echo form_open();?>
				<div class="container">
					<div class="form-group">
						<label>Transfer Date</label>
						    <div class="input-group">
						      <input type="text" class="form-control" name="date_transfer" id="birthday" readonly style="background-color:#fff;"><span class="input-group-addon"><i class="fa fa-calendar"></i></span>
						    </div>
					</div>
					<div class="form-group">
						<label>Bank's Name</label>
						<div class="input-group margin-bottom-xs">
							<input type="text" name="name_bank" class="form-control" placeholder="Bank's Name" required>
						  <span class="input-group-addon"><i class="fa fa-font fa-fw" aria-hidden="true"></i></span>
						</div>
					</div>
					<div class="form-group">
						<label>Account's Name</label>
						<div class="input-group margin-bottom-xs">
							<input type="text" name="account_name" class="form-control" placeholder="Account's Name" required>
						  <span class="input-group-addon"><i class="fa fa-user fa-fw" aria-hidden="true"></i></span>
						</div>
					</div>
					<div class="form-group">
					<label>Account's Number</label>
						<div class="input-group margin-bottom-xs">
							<input type="text" name="account_number" class="form-control" placeholder="Account's Number" required>
						  <span class="input-group-addon"><i class="fa fa-pencil fa-fw" aria-hidden="true"></i></span>
						</div>
					</div>
					<div class="form-group">
					<label>Nominal</label>
						<div class="input-group margin-bottom-xs">
							<input type="text" name="nominal" class="form-control" placeholder="Nominal" required>
						  <span class="input-group-addon"><i class="fa fa-money fa-fw" aria-hidden="true"></i></span>
						</div>
					</div>
				</div>
			</div>
			<button type="submit" class="btn form-control btn-green-control">CONFIRM PAYMENT <i class="fa fa-arrow-right"></i></button>
			<?php echo form_close();?>
		</div>
		<!-- End of Appointment -->
	</div>
	<div class="celarfix"></div>	
</div>
	<?php $this->load->view('default/common/script');?>
</body>
</html>	