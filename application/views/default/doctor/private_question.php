<?php $this->load->view('default/template/nav_doctor'); ?>
	<div class="position-content">
	<?php 
		if($results != FALSE){
			foreach ($results as $rows) {
				?>
				<div class="content-part find">
					<div class="profile">
						<div class="profile-photo">
							<?php
				    			if($rows->avatar!= ""){
				    				?>
				    				<img src="<?php echo base_url($rows->avatar)?>" class="img-responsive img-circle">
				    				<?php
				    			}
				    			else{
				    				?>
				    				<div>
										<span class="fa-stack fa-lg">
										  <i class="fa fa-circle fa-stack-2x"></i>
										  <i class="fa fa-user fa-stack-1x fa-inverse"></i>
										</span>
				    				</div>
				    				<?php
				    			}
				    		?>
						</div>
						<div class="profile-name">
							<p class="name"><?php echo $rows->full_name; ?></p>
							<p class="address">
								<?php if($rows->address!= "") echo $rows->full_name; else echo "Address Not Filled" ?>
							</p>
							<p class="location"><span class="icon-location"></span><?php echo $rows->city; ?></p>
						</div>
						<div class="profile-action">
							<?php echo date('H:i',strtotime($rows->date_chatroom)); ?>
						</div>
					</div>
					<div class="find-content">
						<div class="find-action">
							<a href="<?php echo base_url($this->uri->segment(1).'/chatroom/'.$rows->id_chatroom)?>" type="button" class="btn btn-message">MESSAGES</a>
						</div>
					</div>
				</div>
				<?php
			}
		}
	/*for($article=0; $article<4; $article++){?>
		<div class="content-part find">
			<div class="profile">
				<div class="profile-photo">
					<img src="<?php echo base_url('assets/asset_default/image/actor.png')?>" class="img-responsive">
				</div>
				<div class="profile-name">
					<p class="name">Rani Putri Merliasari</p>
					<p class="address">Lorem Ipsum dolor sil amet Lorem Ipsum dolor sil amet Lorem Ipsum dolor sil amet Lorem Ipsum dolor sil amet</p>
					<p class="location"><span class="icon-location"></span>Jakarta</p>
				</div>
				<div class="profile-action">
					12:28 PM
				</div>
			</div>
			<div class="find-content">
				<div class="find-action">
					<a href="<?php echo base_url('member/chat')?>" type="button" class="btn btn-message">MESSAGES</a>
				</div>
			</div>
		</div>
	<?php } */?>
	</div>
</body>
</html>