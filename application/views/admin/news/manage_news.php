<div class="box">
  <div class="box-header">
    <h3 class="box-title">Manage News</h3>
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
                'news'=>'Content News'
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
        <th>Admin</th>
        <th>News Image</th>
        <th>News Content</th>
        <th>Date Upload</th>
        <th>Action</th>
      </tr>
      </thead>
      <tbody>
        <?php
      		if($results!=FALSE){
      			foreach ($results as $rows) {
      				?>
      				<tr>
                <td><?php echo $rows->username?></td>
                <td><?php if($rows->image_news!= "") {
                  ?>
                  <img src="<?php echo base_url($rows->image_news)?>" height="30px;" >
                  <?php
                } ?></td>
                  <td><?php echo substr($rows->news,0,100)?>..</td>
                  <td><?php echo date('D, d M Y H:i',strtotime($rows->date_news)) ?></td>
                  <td>
                  <a href ="<?php echo base_url('adminpanel/news/edit_news/'.$rows->id_news)?>">Edit</a> |
                  <a href ="<?php echo base_url('adminpanel/news/delete_news/'.$rows->id_news)?>" onclick="return confirm('Are you sure bro, think again if you want delete this item ?')">Delete</a>
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
        <th>Admin</th>
        <th>News Image</th>
        <th>News Content</th>
        <th>Date Upload</th>
        <th>Action</th>
      </tr>
      </tfoot>
    </table>
  </div>
  <!-- /.box-body -->
</div>
