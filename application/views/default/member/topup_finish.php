<?php $this->load->view('default/template/nav');?>
<div class="position-content">
	<div class="container">
			<div class="ms-appointment-no-border">
				<?php
					echo "<h2 style='text-align:center;'>TOPUP IN PROCESS</h2>";
				?>
				<p style="text-align:justify;">
				Please Make sure to transfer within 24 Hours after topup process. Don't forget to confirm your paymet at
				payment confirmation page.
				</p>
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