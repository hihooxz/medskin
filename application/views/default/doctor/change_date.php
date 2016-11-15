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
						
					</p>
				</div>
			</div>
			<div class="clearfix"></div>
			<div class="ms-appointment-booked">
				<?php echo form_open();?>
				<div class="container">
					<div class="form-group">
						<div class="input-group date">
						<input type="text" name="booked_date" class="form-control" placeholder="Select Date" value="<?php echo date('d M Y',strtotime($result['date_appointment']));?>" required readonly style="background-color:#fff">
					  	<span class="input-group-addon"><i class="fa fa-calendar fa-fw" aria-hidden="true"></i></span>
						</div>
					</div>
					<div class="ms-appointment-time">
						<div class="panel-group" id="accordion">
						  <div class="panel panel-default">
						    <div class="panel-heading">
						      <h4 class="panel-title">
						        	<div class="col-xs-2">
						        		<img src="<?php echo base_url('assets/asset_default/image/misty-day.png');?>" width="25px">
						        	</div>
						        	<div class="col-xs-8" style="margin-top:5px">
						        		Morning
						        	</div>
						        	<a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
						        	<div class="col-xs-2">
						        		<i class="fa fa-caret-down fa-2x"></i>
						        	</div>
						        	</a>
						        	<div class="clearfix"></div>
						      </h4>
						    </div>
						    <div id="collapse1" class="panel-collapse collapse in">
						      <div class="panel-body">
									    <div class="time <?php if(substr($result['hour_appointment'], 0,5) == "10:00") echo "selected"?>"><input type="radio" name="date" value="10:00" selected/>10:00</div>
									    <div class="time <?php if(substr($result['hour_appointment'], 0,5) == "10:10") echo "selected"?>"><input type="radio" name="date" value="10:10" />10:10</div>
									    <div class="time <?php if(substr($result['hour_appointment'], 0,5) == "10:20") echo "selected"?>"><input type="radio" name="date" value="10:20" />10:20</div>
									    <div class="time <?php if(substr($result['hour_appointment'], 0,5) == "10:30") echo "selected"?>"><input type="radio" name="date" value="10:30" />10:30</div>
									    <div class="time <?php if(substr($result['hour_appointment'], 0,5) == "10:40") echo "selected"?>"><input type="radio" name="date" value="10:40" />10:40</div>
									    <div class="time <?php if(substr($result['hour_appointment'], 0,5) == "10:50") echo "selected"?>"><input type="radio" name="date" value="10:50" />10:50</div>
									    <div class="time <?php if(substr($result['hour_appointment'], 0,5) == "11:00") echo "selected"?>"><input type="radio" name="date" value="11:00" />11:00</div>
									    <div class="time <?php if(substr($result['hour_appointment'], 0,5) == "11:10") echo "selected"?>"><input type="radio" name="date" value="11:10" />11:10</div>
									    <div class="time <?php if(substr($result['hour_appointment'], 0,5) == "11:20") echo "selected"?>"><input type="radio" name="date" value="11:20" />11:20</div>
									    <div class="time <?php if(substr($result['hour_appointment'], 0,5) == "11:30") echo "selected"?>"><input type="radio" name="date" value="11:30" />11:30</div>
									    <div class="time <?php if(substr($result['hour_appointment'], 0,5) == "11:40") echo "selected"?>"><input type="radio" name="date" value="11:40" />11:40</div>
									    <div class="time <?php if(substr($result['hour_appointment'], 0,5) == "11:50") echo "selected"?>"><input type="radio" name="date" value="11:50" />11:50</div>
						      </div>
						    </div>
						  </div>
						  <div class="panel panel-default">
						    <div class="panel-heading">
						      <h4 class="panel-title">
						        	<div class="col-xs-2">
						        		<img src="<?php echo base_url('assets/asset_default/image/sun.png');?>" width="25px">
						        	</div>
						        	<div class="col-xs-8" style="margin-top:5px">
						        		Afternoon
						        	</div>
						        	<a data-toggle="collapse" data-parent="#accordion" href="#collapse2">
						        	<div class="col-xs-2">
						        		<i class="fa fa-caret-down fa-2x"></i>
						        	</div>
						        	</a>
						        	<div class="clearfix"></div>
						      </h4>
						    </div>
						    <div id="collapse2" class="panel-collapse collapse">
						      <div class="panel-body">
									    <div class="time"><input type="radio" name="date" value="13:00" />13:00</div>
									    <div class="time"><input type="radio" name="date" value="13:10" />13:10</div>
									    <div class="time"><input type="radio" name="date" value="13:20" />13:20</div>
									    <div class="time"><input type="radio" name="date" value="13:30" />13:30</div>
									    <div class="time"><input type="radio" name="date" value="13:40" />13:40</div>
									    <div class="time"><input type="radio" name="date" value="13:50" />13:50</div>
									    <div class="time"><input type="radio" name="date" value="14:00" />14:00</div>
									    <div class="time"><input type="radio" name="date" value="14:10" />14:10</div>
									    <div class="time"><input type="radio" name="date" value="14:20" />14:20</div>
									    <div class="time"><input type="radio" name="date" value="14:30" />14:30</div>
									    <div class="time"><input type="radio" name="date" value="14:40" />14:40</div>
									    <div class="time"><input type="radio" name="date" value="14:50" />14:50</div>
						      </div>
						    </div>
						  </div>
						  <div class="panel panel-default">
						    <div class="panel-heading">
						      <h4 class="panel-title">
						        	<div class="col-xs-2">
						        		<img src="<?php echo base_url('assets/asset_default/image/moon.png');?>" width="25px">
						        	</div>
						        	<div class="col-xs-8" style="margin-top:5px">
						        		Evening
						        	</div>
						        	<a data-toggle="collapse" data-parent="#accordion" href="#collapse3">
						        	<div class="col-xs-2">
						        		<i class="fa fa-caret-down fa-2x"></i>
						        	</div>
						        	</a>
						        	<div class="clearfix"></div>
						      </h4>
						    </div>
						    <div id="collapse3" class="panel-collapse collapse">
						      <div class="panel-body">
						      			<div class="time"><input type="radio" name="date" value="18:00" />18:00</div>
									    <div class="time"><input type="radio" name="date" value="18:10" />18:10</div>
									    <div class="time"><input type="radio" name="date" value="18:20" />18:20</div>
									    <div class="time"><input type="radio" name="date" value="18:30" />18:30</div>
									    <div class="time"><input type="radio" name="date" value="18:40" />18:40</div>
									    <div class="time"><input type="radio" name="date" value="18:50" />18:50</div>
									    <div class="time"><input type="radio" name="date" value="19:00" />19:00</div>
									    <div class="time"><input type="radio" name="date" value="19:10" />19:10</div>
									    <div class="time"><input type="radio" name="date" value="19:20" />19:20</div>
									    <div class="time"><input type="radio" name="date" value="19:30" />19:30</div>
									    <div class="time"><input type="radio" name="date" value="19:40" />19:40</div>
									    <div class="time"><input type="radio" name="date" value="19:50" />19:50</div>
									    <div class="time"><input type="radio" name="date" value="20:00" />20:00</div>
									    <div class="time"><input type="radio" name="date" value="20:10" />20:10</div>
									    <div class="time"><input type="radio" name="date" value="20:20" />20:20</div>
									    <div class="time"><input type="radio" name="date" value="20:30" />20:30</div>
									    <div class="time"><input type="radio" name="date" value="20:40" />20:40</div>
									    <div class="time"><input type="radio" name="date" value="20:50" />20:50</div>
						      </div>
						    </div>
						  </div>
						</div>
					</div>
				</div>
			</div>
			<button type="submit" class="btn form-control btn-green-control">APPROVED & CHANGE DATE <i class="fa fa-check"></i></button>
			<?php echo form_close();?>
		</div>
		<!-- End of Appointment -->
	</div>
	<div class="celarfix"></div>	
</div>
	<?php $this->load->view('default/common/script');?>
</body>
</html>	