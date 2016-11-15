<!DOCTYPE html>
<html>
<head>
	<?php $this->load->view('default/common/header');?>
</head>

<body>
	<header>
		<nav class="navbar navbar-default cus-nav">
		  <div class="head">
		  	<div class="back">
		  		<a onclick="goBack()" href="" type="button" class="icon-back"></a>
		  	</div>
		  	<div class="title-page">Profil</div>
		  </div>
		</nav>
	</header>
	<div class="profile-content">
		<img src="<?php echo base_url('assets/asset_default/image/a.png')?>" class="img-responsive">

		<div class="profile-top">
			<div class="profile-img">
				<?php
					if($result['avatar']!=""){
						?>
						<img src="<?php echo $result['avatar']?>" class="img-responsive">
						<?php
					}
					else{
						?>
						<img src="<?php echo base_url('assets/asset_default/image/actor.png')?>" class="img-responsive">
						<?php
					}
				?>
				
			</div>
			<div class="profile-edit">
			<?php
				if($this->session->userdata('userId') == $this->uri->segment(3)){
			?>
				<a href="#" type="button" class="btn-edit">Edit Profile</a>
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
								<div class="row">
									<div class="profile">
										<div class="profile-name">
											<p class="date"><?php echo date('d M Y H:i',strtotime($result['date_news']))?></p>
										</div>
									</div>
									<div class="content-txt">
										<h3><?php echo $result['title'];?></h3>
										<div class="content-img">
										<?php
											if($result['image_news'] != ""){
										?>
										<img src="<?php echo base_url($result['image_news'])?>" class="img-responsive">
										<?php
										}
										else{
											?>
											<i class="fa fa-3x"></i>
											<?php	
										}
										?>
									</div>
										<p>
											<?php echo $result['news'];?>
										</p>
									</div>
									<div class="consultant">
									<a href="<?php echo base_url($this->uri->segment(1).'/read-news/'.$result['id_news'])?>">
									<p><span class="icon-consult"></span><?php
							$total_comment = $this->mod->countWhereData('comment','id_news',$result['id_news']);
							echo $total_comment;
						?> comment</p></a>
									</div>
									<div class="container comment">
										<?php
											if($this->form_validation->run() && isset($_POST['comment'])){
												if(isset($save)){
													?>
													<div class="col-xs-12 text-center">
														<div class="alert alert-success alert-dismissible fade in" role="alert">
														  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
														    <span aria-hidden="true">&times;</span>
														  </button>
														  <strong>Yippie!</strong> Your Comment was added
														</div>
													</div>
													<?php
												}
											}
										?>
										<div class="row">
											<div class="col-xs-2">
												<?php
													$profile = $this->mod->getDataWhere('user','id_user',$this->session->userdata('userId'));
													if($profile['avatar'] !=""){
												?>
												<img src="<?php echo base_url($profile['avatar'])?>" class="img-responsive">
												<?php
													}
													else{
														?>
														<i class="fa fa-user fa-4x"></i>
														<?php
													}
												?>
												<div class="time">
													<p class="date" style="color:#333;font-size:12px;font-weight:bold;"><?php echo $this->session->userdata('username'); ?></p>
												</div>
											</div>
											<form method="POST" action="">
											<div class="col-xs-10">
												<textarea class="form-control" placeholder="Add New Comment" name="comment" required=""></textarea>
											</div>
											<div class="col-xs-2">
												<button type="submit" class="btn btn-green">SEND</button>
											</div>
											</form>
										</div>										
									</div>
									<?php
										if($results!=FALSE){
											foreach ($results as $rows) {
												?>
												<div class="container comment">
													<div class="row">
														<div class="col-xs-2">
															<?php
																if($rows->avatar != ""){
																	?>
																	<img src="<?php echo base_url($rows->avatar)?>" class="img-responsive">
																	<?php
																}
																else{
																	?>
																	<i class="fa fa-user fa-4x"></i>
																	<?php
																}
															?>
															<div class="time">
																<b style="color:#333;font-size:12px;"><?php echo $rows->username?></b><br />
																<p class="date"><?php echo date('d M Y H:i',strtotime($rows->date_comment))?></p>
															</div>
														</div>
														<div class="col-xs-10">
															<?php
																echo $rows->comment;
															?>
														</div>
													</div>										
												</div>
												<?php
											}
										}
										else{
											?>
											<div class="container comment">
													<div class="row">
														<h2>No Comment's data found</h2>
													</div>
											</div>
											<?php
										}
										echo $links;
									?>	
								</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>