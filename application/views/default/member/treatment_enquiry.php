<?php $this->load->view('default/template/nav');?>
<div class="position-content">
	<div class="container">
		<div id="feature-tab" class="tab-content">
			<h1>COMING SOON</h1>
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