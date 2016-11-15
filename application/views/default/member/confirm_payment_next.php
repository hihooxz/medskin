<?php $this->load->view('default/template/nav');?>
<div class="position-content">
	<div class="container">
		<h2>Confirm Payment</h2>
<form method="POST" action="">
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
					<button type="submit" class="btn btn-green form-control">Finish Confirmation <i class="fa fa-check fa-fw"></i></button>
				</div>
				</form>
	</div>
</div>
