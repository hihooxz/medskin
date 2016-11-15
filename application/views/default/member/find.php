<?php $this->load->view('default/template/nav'); ?>
	<div class="position-content">
		<form method="POST" action="">
			<div class="ms-find-doctor">
				<div class="input-group margin-bottom-sm">
				  <span class="input-group-addon"><i class="fa fa-search fa-fw"></i></span>
				  <input class="form-control" type="text" placeholder="Search Here" name="search" value="<?php echo set_value('search') ?>">
				</div>
				<div class="input-group margin-bottom-sm">
				  <span class="input-group-addon"><i class="fa fa-map-marker fa-fw"></i></span>
				  <input class="form-control" type="text" placeholder="City" name="city" value="<?php echo set_value('city') ?>">
				</div>
				<div class="input-group margin-bottom-sm">
				  <span class="input-group-addon"><i class="fa fa-list-ul"></i></span>
					<?php
	          $options = array(
	                'DESC'=>'The Most Love',
									'ASC' => 'The Lest Love'
	              );
	          echo form_dropdown('by',$options,set_value('by'),"class='form-control'");
	        ?>
				</div>
				<div class="form-group" style="margin-top:5px">
					<button type="submit" class="btn-green form-control">Search</button>
				</div>
			</div>
			<input type="hidden" name="id_search" value="1">
		</form>

	<?php
		$medskin = $this->mod->getDataWhere('setting','id_setting',1);
		if($results != FALSE){
			foreach ($results as $rows) {
	?>
		<div class="content-part find">
			<div class="profile">
				<div class="profile-photo">
					<?php
						if($rows->avatar != ""){
							?>
						<a href "<?php echo base_url($this->uri->segment(1).'/view-profile/'.$rows->id_user)?>"><img src="<?php echo base_url($rows->avatar)?>" class="img-responsive"></a>
							<?php
						}
						else{
							?>
							<a href "<?php echo base_url($this->uri->segment(1).'/view-profile/'.$rows->id_user)?>"><i class="fa fa-user fa-3x"></i></a>
							<?php
						}
					?>
					<p>Online</p>
				</div>
				<div class="profile-name">
					<a href "<?php echo base_url($this->uri->segment(1).'/view-profile/'.$rows->id_user)?>"><p class="name"><?php echo $rows->full_name;?></p></a>
					<?php
						if($rows->address!=""){
							?>
							<p class="address"><?php echo $rows->address;?></p>
							<?php
						}
						else{
							?>
							<p class="address">Address Not Filled</p>
							<?php
						}
					?>
					<?php
						if($rows->city!=""){
							?>
							<p class="location"><span class="icon-location"></span><?php echo $rows->city;?></p>
							<?php
						}
						else{
							?>
							<p class="address">City Not Filled</p>
							<?php
						}
					?>
				</div>
				<div class="profile-action">
					<a href="<?php echo base_url('member/chat/'.$rows->id_user)?>" class="icon-chat"></a><br />
					IDR <?php echo number_format($rows->consultation_fare+$medskin['price_consultation'])?>
				</div>
			</div>
			<div class="find-content">
				<div class="desc-doc">
					<p><span class="icon-love"></span> <?php echo $rows->love;?> People loved</p>
					<p><span class="icon-baggage"></span> <?php echo $this->muser->countExperience($rows->id_user);?> Experiences</p>
				</div>
				<div class="find-action">
					IDR <?php echo number_format($rows->appointment_fare+$medskin['price_appointment'])?>
					<a href="<?php echo base_url('member/book-appointment/'.$rows->id_user)?>" type="button" class="btn btn-message">BOOK</a>
				</div>
			</div>
		</div>
	<?php }
	}
	?>
	</div>
</body>
</html>
