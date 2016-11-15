<?php $this->load->view('default/template/nav');?>
<div class="position-content">
	<ul class="nav nav-tabs cus-nav-tabs">
	  <li role="presentation" class="active"><a href="#feature-tab" class="feature">Feature</a></li>
	  <li role="presentation"><a href="#popular-tab" class="popular">Popular</a></li>
	</ul>
	<div class="container">
		<div id="feature-tab" class="tab-content">
		<?php 
			if($results!=FALSE){
				foreach ($results as $rows) {
					?>
					<div class="content-part">
						<div class="profile">
							<div class="profile-photo">
								<?php
									if($rows->avatar!= ""){
										?>
										<img src="<?php echo base_url($rows->avatar)?>" class="img-responsive">
										<?php
									}
									else{
										?>
										<i class="fa fa-user fa-3x"></i>
										<?php
									}
								?>
							</div>
							<div class="profile-name">
								<p class="name"><?php echo $rows->full_name;?></p>
								<p class="date"><?php echo $rows->date_news;?></p>
							</div>
							<div class="profile-action">
								<a href="<?php echo base_url('member/chat/'.$rows->id_user); ?>" type="button" class="btn btn-green">MESSAGES</a>
								<a href="<?php echo base_url('member/view-profile/'.$rows->id_user); ?>" type="button" class="btn btn-gray">VIEW PROFILE</a>
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
									<?php
										echo substr($rows->news, 0,150).'..';
									?>
								</p>
							</a>
						</div>
						<div class="consultant">
						<?php
							$bookmark = $this->mnews->checkBookmark($rows->id_news,$this->session->userdata('userId'));
							if($bookmark == FALSE){
						?>
						<a href="<?php echo base_url($this->uri->segment(1).'/set-bookmark/'.$rows->id_news)?>">
							<p>
								<i class="fa fa-bookmark-o fa-fw"></i> Bookmark
							</p>
						</a>
						<?php
							}
							else{
								?>
								<a href="<?php echo base_url($this->uri->segment(1).'/unset-bookmark/'.$bookmark['id_bookmark'])?>">
									<p>
										<i class="fa fa-bookmark fa-fw"></i> Bookmarked
									</p>
								</a>
								<?php
							}
						?>
						<a href="<?php echo base_url($this->uri->segment(1).'/read-news/'.$rows->id_news)?>">
							<p><span class="icon-consult"></span><?php
								$total_comment = $this->mod->countWhereData('comment','id_news',$rows->id_news);
								echo $total_comment;
							?> Comment</p>
						</a>
						</div>
					</div>
					<?php
				}
			}
			else{
				?>
				<h1>No News Found</h1>
				<?php
			}
		?>
		</div>
		<div id="popular-tab" class="tab-content">
		
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