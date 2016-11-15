<?php $this->load->view('default/template/nav');?>
<div class="position-content">
	<div id="myCarousel" class="carousel slide" data-ride="carousel">
	  <!-- Indicators -->
	  <ol class="carousel-indicators">
	    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
	    <li data-target="#myCarousel" data-slide-to="1"></li>
	    <li data-target="#myCarousel" data-slide-to="2"></li>
	  </ol>

	  <!-- Wrapper for slides -->
	  <div class="carousel-inner" role="listbox">
	    <div class="item active">
	      <img src="<?php echo base_url('assets/images/banner/banner01.png') ?>" alt="Chania" height="200px">
	    </div>

	    <div class="item">
	      <img src="<?php echo base_url('assets/images/banner/banner02.jpg') ?>" alt="Chania" height="200px">
	    </div>

	    <div class="item">
	      <img src="<?php echo base_url('assets/images/banner/banner03.jpg') ?>" alt="Flower" height="200px">
	    </div>
	  </div>

	  <!-- Left and right controls -->
	  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
	    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
	    <span class="sr-only">Previous</span>
	  </a>
	  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
	    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
	    <span class="sr-only">Next</span>
	  </a>
	</div>
	<div class="container">
		<a href="<?php echo base_url('member/news')?>" style="color:#333">
		<div class="row" style="margin-top:50px">
			<div class="col-xs-4">
				<img src="<?php echo base_url('assets/asset_default/image/news.png')?>" class="img-responsive">
			</div>
				<div class="col-xs-6">
					<h3>Article</h3>
					<p>Get article from doctors within 24 hrs</p>
				</div>
				<div class="col-xs-1" style="padding-top:30px">
					<i class="fa fa-angle-right fa-2x"></i>
				</div>
				<div class="clearfix"></div>
				<div>
					<hr style="border-bottom:2px solid #777">
				</div>
		</div>
		</a>
		<a href="<?php echo base_url('member/find-doctor')?>" style="color:#333">
		<div class="row">
			<div class="col-xs-4">
				<img src="<?php echo base_url('assets/asset_default/image/icon-find.png')?>" class="img-responsive">
			</div>
				<div class="col-xs-6">
					<h3>Find Doctor</h3>
					<p>Consult Online or Book Appointment</p>
				</div>
				<div class="col-xs-1" style="padding-top:30px">
					<i class="fa fa-angle-right fa-2x"></i>
				</div>
				<div class="clearfix"></div>
				<div>
					<hr style="border-bottom:2px solid #777">
				</div>
		</div>
		</a>
		<a href="<?php echo base_url('member/treatment-enquiry')?>" style="color:#333">
		<div class="row">
			<div class="col-xs-4">
				<img src="<?php echo base_url('assets/asset_default/image/herbal.png')?>" class="img-responsive">
			</div>
				<div class="col-xs-6">
					<h3>Treatment Enquiry</h3>
					<p>Get Treatment Costs and Other Details</p>
				</div>
				<div class="col-xs-1" style="padding-top:30px">
					<i class="fa fa-angle-right fa-2x"></i>
				</div>
				<div class="clearfix"></div>
				<div>
					<hr style="border-bottom:2px solid #777">
				</div>
		</div>
		</a>
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