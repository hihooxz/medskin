<?php $this->load->view('default/template/nav');?>
<div class="position-content">
	<div class="container">
		<div id="feature-tab" class="tab-content">
		<!-- <?php for($article=0; $article<2; $article++){?>
			<div class="content-part">
				<div class="profile">
					<div class="profile-photo">
						<img src="<?php echo base_url('assets/asset_default/image/profile1.png')?>" class="img-responsive">
					</div>
					<div class="profile-name">
						<p class="name">Dr Jason Boty</p>
						<p class="date">3 Jam yang lalu</p>
					</div>
					<div class="profile-action">
						<a href="#" type="button" class="btn btn-green">MESSAGES</a>
						<a href="#" type="button" class="btn btn-gray">VIEW PROFILE</a>
					</div>
				</div>
				<div class="content-img">
					<img src="<?php echo base_url('assets/asset_default/image/a.png')?>" class="img-responsive">
				</div>
				<div class="content-txt">
					<h3>Anti Wrinkle Treatsment</h3>
					<p>Lorem ipsum Lorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsum</p>
				</div>
				<div class="consultant">
				<p><span class="icon-consult"></span>2 consultantion</p>
				</div>
			</div>
		<?php } ?> -->
		<h2>Coming SOON</h2>
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