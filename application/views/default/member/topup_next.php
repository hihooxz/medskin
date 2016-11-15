<?php $this->load->view('default/template/nav');?>
<div class="position-content">
	<div class="container">
			<div class="ms-appointment-no-border">
				<?php
					echo "<h2 style='text-align:center;'>IDR ".$result['amount']."</h2>";
				?>
				<form method="POST" action="">
				<label>Topup's Amount</label>
				<div class="input-group margin-bottom-xs">
					<span class="input-group-addon"><i class="fa fa-money fa-fw" aria-hidden="true"></i></span>
					  <?php
					  	$options = array(
					  			'10000' => 'IDR 10.000',
					  			'25000' => 'IDR 25.000',
					  			'50000' => 'IDR 50.000',
					  			'100000' => 'IDR 100.000',
					  			'200000' => 'IDR 200.000',
					  			'500000' => 'IDR 500.000',
					  			'1000000' => 'IDR 1.000.000',
					  		);
					  	echo form_dropdown('amounts',$options,$this->session->userdata('amount'),'class="form-control" required disabled');
					  ?>
					  <input type="hidden" name="nominal" value="<?php echo $this->session->userdata('amount')?>">
				</div>
				<label>Choose Payment Method</label>
				<?php
					if($results){
						foreach ($results as $rows) {
							?>
							<div class="content-part find">
							<div class="profile">
								<div class="profile-photo">
									<?php
										if($rows->image_payment != ""){
											?>
											<img src="<?php echo base_url($rows->image_payment)?>" class="img-responsive">
											<?php
										}
										else{
											?>
											<i class="fa fa-bank fa-3x"></i>
											<?php
										}
									?>
								</div>
								<div class="profile-name">
									<p class="name"><?php echo $rows->name_payment;?></p>
									<?php
										if($rows->account_name!=""){
											?>
											<p class="address"><?php echo $rows->account_name;?></p>
											<?php
										}
										else{
											?>
											<p class="address">Account Name Not Filled</p>
											<?php
										}
									?>
									<?php
										if($rows->account_number!=""){
											 echo $rows->account_number;
										}
										else{
											?>
											<p class="address">Account Number Not Filled</p>
											<?php
										}
									?>
								</div>
								<div class="profile-action">
									<input type="radio" name="payment" value="<?php echo $rows->id_payment?>">
								</div>
							</div>
						</div>
							<?php
						}
					}
				?>
				<div class="form-group">
				<br />
					<button type="submit" class="btn btn-green form-control">Finish Topup <i class="fa fa-check fa-fw"></i></button>
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