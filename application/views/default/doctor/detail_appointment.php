<?php $this->load->view('default/template/nav_doctor');?>
<div class="position-content">
	<div class="container">
		<!-- Start Appointment -->
		<div class="row">
			<div class="ms-appointment-no-border">
				<div class="container">
					<div class="col-xs-2">
						<?php
							if($result['avatar']!=""){
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
						<?php echo $result['address']?>					
						</p>
					</div>
					<div class="col-xs-2">
						<button type="button" class="btn btn-green">
							<?php
								if($result['status_appointment'] == 0)
									echo "Pending";
								else if($result['status_appointment'] == 1)
									echo "Approved";
								else if($result['status_appointment'] == 2)
									echo "Canceled";
								if($result['status_appointment'] == 3)
									echo "Done";
							?>
						</button>
					</div>
				</div>
			</div>
			<div class="clearfix"></div>
			<div class="ms-appointment-booked">
				<div class="container">
					<div class="form-group">
						<div class="input-group margin-bottom-xs">
							<input type="text" name="booked" class="form-control" placeholder="Select Date" readonly="" value="<?php echo date('d M Y',strtotime($result['date_appointment']))?>">
						  <span class="input-group-addon"><i class="fa fa-calendar fa-fw" aria-hidden="true"></i></span>
						</div>
					</div>
					<div class="form-group">
						<div class="input-group margin-bottom-xs">
							<input type="text" name="booked" class="form-control" placeholder="Select Date" readonly="" value="<?php echo date('H:i',strtotime($result['hour_appointment']))?>">
							<span class="input-group-addon"><i class="fa fa-clock-o fa-fw" aria-hidden="true"></i></span>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-5">
							<div class="form-group">
								<?php
									$options = array(
											'' => 'Relation',
											1 => 'Self',
											2 => 'Other'
										);
									echo form_dropdown('relation',$options,$result['relation'],'readonly class="form-control"');
								?>
							</div>
						</div>
						<div class="col-xs-7">
							<div class="form-group">
								<input type="text" name="name" class="form-control" placeholder="Your Name" readonly value="<?php echo $result['name']?>">
							</div>
						</div>
					</div>
					<div class="clearfix"></div>
					<div class="input-group margin-bottom-xs form-group">
						<input type="text" name="booked" class="form-control" placeholder="Your Phone Number" readonly value="<?php echo $result['phone_number']?>">
					  	<span class="input-group-addon"><i class="fa fa-mobile fa-fw" aria-hidden="true"></i></span>
					</div>
					<div class="row">
						<div class="col-xs-5">
							<div class="form-group">
								Gender
							</div>
						</div>
						<div class="col-xs-7 text-right">
							<label>
								<?php
									if($result['gender'] == 1)
										echo "<i class='fa fa-male'></i> Male";
									if($result['gender'] == 2)
										echo "<i class='fa fa-female'></i> Female";
								?>
							</label>
						</div>
					</div>
					<div class="clearfix"></div>
					<div class="input-group margin-bottom-xs form-group">
						<input type="text" name="booked" class="form-control" placeholder="Date of Birth"  readonly="" value="<?php echo date('d M Y',strtotime($result['date_born']))?>">
					  	<span class="input-group-addon"><i class="fa fa-calendar fa-fw" aria-hidden="true"></i></span>
					</div>
					<div class="form-group">
						<textarea class="form-control" name="disease" placeholder="Describe Your Disease" readonly><?php echo $result['description_disease']?></textarea>
					</div>
				</div>
			</div>
			<a href="<?php echo base_url($this->uri->segment(1).'/appointment')?>">
			<button type="button" class="btn form-control btn-green-control"><i class="fa fa-arrow-left"></i> BACK TO APPOINTMENT</button>
			</a>
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
</body>
</html>