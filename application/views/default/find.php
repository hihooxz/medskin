<?php $this->load->view('default/template/nav'); ?>
	<div class="position-content">
	<?php for($article=0; $article<4; $article++){?>
		<div class="content-part find">
			<div class="profile">
				<div class="profile-photo">
					<img src="<?php echo base_url('assets/asset_default/image/profile1.png')?>" class="img-responsive">
					<p>Online</p>
				</div>
				<div class="profile-name">
					<p class="name">Dr Jason Boty</p>
					<p class="address">MD - MD - Skin & VD, MBBS Myskin Laser Clinic, jakarta</p>
					<p class="location"><span class="icon-location"></span>Jakarta</p>
				</div>
				<div class="profile-action">
					<a href="#" class="icon-video"></a>
					<a href="#" class="icon-phone"></a>
					<a href="#" class="icon-chat"></a>
				</div>
			</div>
			<div class="find-content">
				<div class="desc-doc">
					<p><span class="icon-love"></span> 236 People helped</p>
					<p><span class="icon-baggage"></span> 6 Experiences</p>
				</div>
				<div class="find-action">
					<a href="<?php echo base_url('member/chat')?>" type="button" class="btn btn-message">MESSAGES</a>
				</div>
			</div>
		</div>
	<?php } ?>
	</div>
</body>
</html>