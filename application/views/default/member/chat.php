<?php $this->load->view('default/template/nav');?>
<script type="text/javascript">
 function showMyImage(fileInput) {
        var files = fileInput.files;
        for (var i = 0; i < files.length; i++) {
            var file = files[i];
            var imageType = /image.*/;
            if (!file.type.match(imageType)) {
                continue;
            }
            var img=document.getElementById("thumbnil");
            img.file = file;
            var reader = new FileReader();
            reader.onload = (function(aImg) {
                return function(e) {
                    aImg.src = e.target.result;
                };
            })(img);
            reader.readAsDataURL(file);
        }
        $("#thumbnail").show();
		$("#media").toggle();
		var $loading = $('#loadingDiv').hide();
		$loading.show();
		$(function(){
		    $('html, body').animate({scrollTop: $(document).height()-$(window).height()}, 300);
		});
		function scrollDown(){
			$(function(){
		    	$('html, body').animate({scrollTop: $(document).height()-$(window).height()}, 300);
			});
		}
		var image_chat = $("input[name=userfile]").val();
        var id_chatroom = $("input[name=id_chatroom]").val();
		$.ajax({
                url: "<?php echo base_url($this->uri->segment(1).'/send-chat-image/'); ?>",
                dataType: 'json',
                method: "POST",
                data: {image_chat: image_chat,id_chatroom: id_chatroom},
                success: function(res) {
                   $("#message").append(res.data_chat);
                   $("span#amount").html(200000);
                   document.getElementById('chats').value = "";
                },
                error: function() {
                    alert("error");
                }
            });	
		$loading.hide();
		/*document.getElementById('file-input').submit(function(e) {
			e.preventDefault();
            //var chats = $("#chats").val();
            //var image_chat = $("input[name=userfile]").val();
            var image_chat = $("input[name=id_chatroom]").val();
            var id_chatroom = $("input[name=id_chatroom]").val();
            $.ajax({
                url: "<?php echo base_url($this->uri->segment(1).'/send-chat-image/'); ?>",
                dataType: 'json',
                method: "POST",
                data: {image_chat: image_chat,id_chatroom: id_chatroom},
                success: function(res) {
                   //$("#message").append(res.data_chat);
                   $("span#amount").html(200000);
                   document.getElementById('chats').value = "test";
                   alert(res.data_chat);
                },
                error: function() {
                    alert("error");
                }
            });	
		});*/
		
    }
</script>
<?php
	$user = $this->mod->getDataWhere('user','id_user',$this->session->userdata('userId'));
	$fare = $this->mod->getDataWhere('fare','id_user',$result['id_doctor']);
	if($fare == false){
		$payment = 0;
	}
	else{
		$payment = $fare['consultation_fare'];
	}
	if($user['amount'] < $payment)
		$send = 'data-target="#chat" data-toggle="modal"';
	else{
		$send = "";
	}
?>	
	<div class="chat">
		<!-- popup -->
		<?php 
		$attributes = array('id' => 'form-image');
		echo form_open_multipart('',$attributes)?>
			<div class="popup-media" id="media">
				<div class="image-upload">
				 <label for="file-input" style="cursor:pointer;">
					        <span class="icon-choose"></span><p>Choose Photo</p>
					    </label>
					    <input id="file-input" type="file" name="userfile" accept="image/png,image/gif,image/jpg,image/jpeg"onchange="showMyImage(this)"/>
				</div>
				<!-- <span class="icon-camera"></span><p>Take Photo</p> -->
				<!-- <span class="icon-voice"></span><p>Voice Note</p> -->
			</div>
		<?php
			echo form_close();
		?>
		<!-- end popup -->
		<div class="container" id="message">
		<?php
			if($results != FALSE){
				$date = "";
				foreach ($results as $rows) {
					if($date == ""){
						$date = date('D, d M',strtotime($rows->date_chat));
						?>
						<p class="date"><?php echo $date;?></p>					
						<?php
					}
					else if($date != date('D, d M',strtotime($rows->date_chat))){
						$date = date('D, d M',strtotime($rows->date_chat));
						?>
						<p class="date"><?php echo $date;?></p>					
						<?php	
					}
					if($rows->id_user == $rows->id_member) // sender si pasien
						$status = "sender";
					else if($rows->id_user ==  $rows->id_doctor) // sender si dokter
						$status = "receive";
					?>
					<div class="<?php echo $status; ?>">
						<div class="actor">
							<?php
								if($rows->avatar == ""){
									?>
										  <i class="fa fa-user fa-4x"></i>
									<?php
								}
								else{
									?>
									<img src="<?php echo base_url($rows->avatar)?>" class="img-responsive img-circle">
									<?php
								}
							?>
						</div>
						<div class="actor-message">
							<p><?php echo $rows->chat;?></p>
							<p><small><?php echo date('H:i',strtotime($rows->date_chat))?></small></p>
						</div>
					</div>
					<?php
				}
				?>
				<div id="thumbnail" style="display: none;">
						<div class="sender">
							<div class="actor">
								<?php
									if($result['avatar'] == ""){
										?>
											  <i class="fa fa-user fa-4x"></i>
										<?php
									}
									else{
										?>
										<img src="<?php echo base_url($result['avatar'])?>" class="img-responsive img-circle">
										<?php
									}
								?>
							</div>
							<div class="actor-message">
								<img id="thumbnil"  src="" alt="Image" class="img-responsive"/>
							</div>
						</div>
					</div>
				<?php
			}
		?>
		</div>
		<div class="action-test">
			<div class="action-media">
				<span class="icon-media"></span>
			</div>
			<input type="hidden" class="form-control" id="id_chatroom" placeholder="" name="id_chatroom" value="<?php echo $this->uri->segment(3)?>">
			<div class="action-input">
				<input type="text" class="form-control" id="chats" placeholder="" name="chats">
			</div>
			<div class="action-send">
				<button class="icon-send" <?php echo $send; ?> style="border-style:none;" id="submit"></button>
			</div>
		</div>
	</div>

<!-- Modal -->
<div id="chat" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Sorry</h4>
      </div>
      <div class="modal-body text-center">
      	How Dear, You don't have enough money to consult with the doctor
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<script type="text/javascript">
        $("#submit").click(function(e) {
            e.preventDefault();
            /*var chats = $("#chats").val();*/
            var chats = $("input[name=chats]").val();
            var id_chatroom = $("input[name=id_chatroom]").val();
            $.ajax({
                url: "<?php echo base_url($this->uri->segment(1).'/send-chat/'); ?>",
                dataType: 'json',
                method: "POST",
                data: {chat: chats,id_chatroom: id_chatroom},
                success: function(res) {
                   $("#message").append(res.result_chat);
                   $("span#amount").html(res.amount);
                   document.getElementById('chats').value = "";
                },
                error: function() {
                    alert("error!");
                }
            });
        });
        </script>
	<script type="text/javascript">
		$(".icon-media").click(function(){
		    $("#media").toggle();
		});
	</script>
	<script type="text/javascript">
		$(function(){
		    $('html, body').animate({scrollTop: $(document).height()-$(window).height()}, 300);
		});
		function scrollDown(){
			$(function(){
		    	$('html, body').animate({scrollTop: $(document).height()-$(window).height()}, 300);
			});
		}
	</script>
	<?php $this->load->view('default/common/script');?>
</body>
</html>