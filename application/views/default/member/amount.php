<?php $this->load->view('default/template/nav');?>
<div class="position-content">
	<div class="container">
		<div id="feature-tab" class="tab-content">
			<h2></h2>
		</div>
		<div id="popular-tab" class="tab-content">
			<?php
				echo "<h2 style='text-align:center;'>IDR ".number_format($result['amount'])."</h2>";
			?>
			<div class="container">
			<div class="xs-col-12">
				<div class="col-xs-4">
					<strong>History of Amount</strong>
				</div>
				<div class="col-xs-8 text-right">
					<a href="<?php echo base_url($this->uri->segment(1).'/topup/')?>">
						<button class="btn btn-green"><i class="fa fa-plus-circle fa-fw"></i> Topup Amount</button>
					</a>
				</div>
			</div>
			</div>
			<table class="table table-stripped">
				<thead>
					<tr>
						<th>ID</th>
						<th>Details</th>
						<th>Amount</th>
					</tr>
				</thead>
				<tbody>
					<?php
						if($results!=FALSE){
							foreach ($results as $rows) {
								?>
								<tr>
									<td><?php echo $rows->id_transaction; ?></td>
									<td><?php 
										if($rows->transaction_type == 0){
											?>
											<i class="fa fa-plus-circle fa-fw"></i>
											<?php
										}
										else if($rows->transaction_type == 1){
											?>
											<i class="fa fa-comments fa-fw"></i>
											<?php
										}
										else if($rows->transaction_type == 2){
											?>
											<i class="fa fa-coffee fa-fw"></i>
											<?php
										}
										echo $rows->description;
										if($rows->status_transaction == 0){
											?>
											<i class="fa fa-clock-o fa-fw"></i>
											<?php
										}
										else if($rows->status_transaction == 1){
											?>
											<i class="fa fa-check-circle fa-fw"></i>
											<?php
										}
										else if($rows->status_transaction == 2){
											?>
											<i class="fa fa-times-circle fa-fw"></i>
											<?php
										}
									?>
									</td>
									<td>
										<?php
											if($rows->debit_credit == 0){
												?>
													<i class="fa fa-plus fa-fw"></i>
												<?php
											}
											else if($rows->debit_credit == 1){
												?>
													<i class="fa fa-minus fa-fw"></i>
												<?php
											}
											echo number_format($rows->nominal);
										?>
									</td>
								</tr>
								<?php
							}
						}
						else{
							?>
							<tr>
								<td colspan="3"><b>No History was found</b></td>
							</tr>
							<?php
						}
					?>
				</tbody>
			</table>
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