<div class="box">
  <div class="box-header">
    <h3 class="box-title">Manage Chat</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <div class="row" style="margin-bottom:10px">
      <form method="POST" action="">
      <div class="col-md-3">
      </div>
      <div class="col-md-3">
        <input type="text" name="search" class="form-control">
      </div>
      <div class="col-md-3">
        <?php
          $options = array(
                'chat'=>'Chat',
                'status_chat'=>'Status'
              );
          echo form_dropdown('by',$options,set_value('by'),"class='form-control'");
        ?>
      </div>
      <div class="col-md-3">
        <button type="submit"class="btn btn-default">Search</button>
      </div>
    </form>
    </div>
    <table id="example1" class="table table-bordered table-striped">
      <thead>
      <tr>
        <th>Chat</th>
        <th>Image Chat</th>
        <th>Status</th>
        <th>Date Chat</th>
        <th>Action</th>
      </tr>
      </thead>
      <tbody>
        <?php
      		if($results!=FALSE){
      			foreach ($results as $rows) {
      				?>
      				<tr>
                <td><?php echo $rows->chat?></td>
                <td><?php if($rows->image_chat!= "") {
                  ?>
                  <img src="<?php echo base_url($rows->image_chat)?>" height="150px;" >
                  <?php
                } ?></td>
                <td><?php if($rows->status_chat==1) echo "Unread"; else echo "Read"; ?></td>
                  <td><?php echo date('D, d M Y H:i',strtotime($rows->date_chat)) ?></td>
                  <td>
                  <a href ="<?php echo base_url('adminpanel/chat/edit_chat/'.$rows->id_chat)?>">Edit</a> |
                  <a href ="<?php echo base_url('adminpanel/chat/delete_chat/'.$rows->id_chat)?>" onclick="return confirm('Are you sure bro, think again if you want delete this item ?')">Delete</a>
                </td>
              </tr>
      				<?php
      			}
      		}
      	?>
      	<?php
      		echo $links;
      	?>
      </tbody>
      <tfoot>
      <tr>
        <th>Chat</th>
        <th>Image Chat</th>
        <th>Status</th>
        <th>Date Chat</th>
        <th>Action</th>
      </tr>
      </tfoot>
    </table>
  </div>
  <!-- /.box-body -->
</div>
