<?php $this->load->view('default/template/nav');?>
<div class="position-content">
	<div class="container">
		<!-- Start Appointment -->
		<div class="row">
			<div class="ms-appointment-no-border">
				<div class="col-xs-3">
					<?php
						if($result['avatar'] != ""){
							?>
							<img src="<?php echo base_url($result['avatar'])?>" class="img-responsive">
							<?php
						}
						else{
							?>
							<i class="fa fa-user fa-3x"></i>
							<?php
						}
					?>
				</div>
				<div class="col-xs-6">
					<b><?php echo $result['full_name']?></b>
					<p class="grey">
					<?php 
						echo $result['address']
					?><br />
					</p>
				</div>
				<div class="col-xs-3 text-right">
					<p class="time">
						<i class="fa fa-heart fa-fw"></i> <?php echo $result['love'] ?><br />	
					</p>
				</div>
			</div>
			<div class="clearfix"></div>
			<?php echo form_open();?>
			<div class="ms-appointment-booked">
				<div class="container">
					<div class="row">
						<div class="col-xs-5">
							<div class="form-group">
								<select class="form-control" name="relation" required="">
									<option value="">Relation</option>
									<option value="1">Self</option>
									<option value="2">Other</option>
								</select>
							</div>
						</div>
						<div class="col-xs-7">
							<div class="form-group">
								<input type="text" name="name" class="form-control" placeholder="Your Name" value="<?php echo $profile['full_name']?>" required>
							</div>
						</div>
					</div>
					<div class="clearfix"></div>
					<div class="input-group margin-bottom-xs form-group">
						<input type="text" name="phone_number" class="form-control" placeholder="Your Phone Number" value="<?php echo $result['phone_number']?>" required>
					  	<span class="input-group-addon"><i class="fa fa-mobile fa-fw" aria-hidden="true"></i></span>
					</div>
					<div class="row">
						<div class="col-xs-5">
							<div class="form-group">
								Gender
							</div>
						</div>
						<div class="col-xs-7">
							<label><input type="radio" name="gender" value="1" <?php if($result['gender'] == 1) echo "checked" ?>> Male</label>
							&nbsp;&nbsp;&nbsp;
							<label><input type="radio" name="gender" value="2" <?php if($result['gender'] == 2) echo "checked" ?>> Female</label>
						</div>
					</div>
					<div class="clearfix"></div>
					<div class="form-group">
						<div class="input-group">
						<input type="text" name="birthday" class="form-control" placeholder="Date of Birth" required value="<?php if($result['birthday'] != "0000-00-00") echo date('d M Y',strtotime($result['birthday']))?>" id="birthday" readonly style="background-color:#fff">
						  <span class="input-group-addon"><i class="fa fa-calendar fa-fw" aria-hidden="true"></i></span>
						</div>
					</div>
					<div class="form-group">
						<textarea class="form-control" name="disease" placeholder="Describe Your Disease" required=""></textarea>
					</div>
				</div>
			</div>
			<button type="submit" class="btn form-control btn-green-control">BOOK APPOINTMENT <i class="fa fa-check"></i></button>
			<?php echo form_close();?>
			<?php
				echo validation_errors();
			?>
		</div>
		<!-- End of Appointment -->
	</div>
	<div class="celarfix"></div>	
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
		 $(".ms-appointment-time .time :radio").hide().click(function(e){
		    e.stopPropagation();
		});
		$(".ms-appointment-time div .time").click(function(e){
		    $(this).closest(".ms-appointment-time").find(".time").removeClass("selected");
		    $(this).addClass("selected").find(":radio").click();
		});

		$('.collapse').on('shown.bs.collapse', function(){
		$(this).parent().find("fa-caret-down").removeClass("fa-caret-down").addClass("fa-caret-up");
		}).on('hidden.bs.collapse', function(){
		$(this).parent().find(".fa-caret-up").removeClass("fa-caret-up").addClass("fa-caret-down");
		});	
	</script>
	<?php $this->load->view('default/common/script');?>
</body>
</html>