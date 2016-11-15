<?php $this->load->view('default/template/nav');?>
<div class="position-content">
	<div class="container">
			<div class="ms-appointment-no-border">
				<?php
					echo "<h2 style='text-align:center;'>IDR ".number_format($result['amount'])."</h2>";
				?>
				<form method="POST" action="">
				<label>Topup's Amount</label>
				<div class="input-group margin-bottom-xs">
					<span class="input-group-addon"><i class="fa fa-money fa-fw" aria-hidden="true"></i></span>
					  <?php
					  	$options = array(
					  			'10000' => 'IDR 10.000',
					  			'25000' => 'IDR 25.000',
					  			'50000' => 'IDR 50.000',
					  			'100000' => 'IDR 100.000',
					  			'200000' => 'IDR 200.000',
					  			'500000' => 'IDR 500.000',
					  			'1000000' => 'IDR 1.000.000',
					  		);
					  	echo form_dropdown('amount',$options,set_value('amount'),'class="form-control" required');
					  ?>
				</div>
				<div class="form-group">
				<br />
					<button type="submit" class="btn btn-green form-control">Choose Payment <i class="fa fa-arrow-right fa-fw"></i></button>
				</div>
				<form>
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