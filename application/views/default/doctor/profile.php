	<?php $this->load->view('default/template/nav_doctor'); ?>
	<div class="profile-content">
		<img src="<?php echo base_url('assets/asset_default/image/a.png')?>" class="img-responsive">

		<div class="profile-top">
			<div class="profile-img">
				<?php
					if($result['avatar']!=""){
						?>
						<img src="<?php echo base_url($result['avatar'])?>" class="img-responsive">
						<?php
					}
					else{
						?>
						<div >
								<span class="fa-stack fa-lg">
								  <i class="fa fa-circle fa-stack-2x"></i>
								  <i class="fa fa-user fa-stack-1x fa-inverse"></i>
								</span>
		    				</div>
						<?php
					}
				?>
			</div>
			<div class="profile-edit">
			<?php
				if($this->session->userdata('userId') == $this->uri->segment(3)){
			?>
				<a href="<?php echo base_url($this->uri->segment(1).'/edit-profile')?>" type="button" class="btn-edit">Edit Profile</a>
			<?php
				}
			?>
			</div>
			<div class="row">
				<div style="color:#fff;font-weight:bold;padding-top:5%;font-size:12px;">
					<?php echo $result['full_name']?>
				</div>
			</div>
			<div class="content-part">
				<div class="container">
					<?php
						if($results!=FALSE){
							foreach ($results as $rows) {
								?>
								<div class="row">
									<div class="profile">
										<div class="profile-name">
											<p class="date"><?php echo date('d M Y H:i',strtotime($rows->date_news))?></p>
										</div>
									</div>
									<div class="content-img">
										<?php
											if($rows->image_news != ""){
										?>
										<img src="<?php echo base_url($rows->image_news)?>" class="img-responsive">
										<?php
										}
										else{
											?>
											<img src="<?php echo base_url('assets/asset_default/image/a.png')?>" class="img-responsive">
											<?php	
										}
										?>
									</div>
									<div class="content-txt">
									<a href="<?php echo base_url($this->uri->segment(1).'/read-news/'.$rows->id_news)?>">
										<h3><?php echo $rows->title;?></h3>
										<p>
											<?php echo substr($rows->news,0,100);?>
										</p>
									</a>
									</div>
									<div class="consultant">
									<a href="<?php echo base_url($this->uri->segment(1).'/read-news/'.$rows->id_news)?>">
									<p><span class="icon-consult"></span><?php
							$total_comment = $this->mod->countWhereData('comment','id_news',$rows->id_news);
							echo $total_comment;
						?> comment</p></a>
									</div>
								</div>
								<?php
							}
						}
						else{
							?>
							<h2>No News Found</h2>
							<?php
						}
					?>
				</div>
			</div>
		</div>

	</div>
</body>
</html>