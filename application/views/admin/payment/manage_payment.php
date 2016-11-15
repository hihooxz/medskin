<div class="box">
  <div class="box-header">
    <h3 class="box-title">Mange payment</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <div class="row" style="margin-bottom:10px">
      <form method="POST" action="">
      <div class="col-md-3">
      </div>
      <div class="col-md-3">
        <input type="text" name="search" class="form-control" value="<?php echo set_value('search') ?>">
      </div>
      <div class="col-md-3">
        <?php
          $options = array(
                'account_name'=>'Account Name'
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
        <th>Payment Name</th>
        <th>Account Name</th>
        <th>Account Number</th>
        <th>Payment Image</th>
        <th>Action</th>
      </tr>
      </thead>
      <tbody>
        <?php
      		if($results!=FALSE){
      			foreach ($results as $rows) {
      				?>
      				<tr>
                <td><?php echo $rows->name_payment ?></td>
                <td><?php echo $rows->account_name ?></td>
                <td><?php echo $rows->account_number ?></td>
                <td><?php if($rows->image_payment!= "") {
                  ?>
                  <img src="<?php echo base_url($rows->image_payment)?>" height="150px">
                  <?php
                } ?></td>
                 <td>
                  <a href ="<?php echo base_url('adminpanel/payment/edit_payment/'.$rows->id_payment)?>">Edit</a> |
                  <a href ="<?php echo base_url('adminpanel/payment/delete_payment/'.$rows->id_payment)?>" onclick="return confirm('Are you sure ?')">Delete</a>
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
        <th>Payment Name</th>
        <th>Account Name</th>
        <th>Account Number</th>
        <th>Payment Image</th>
        <th>Action</th>
      </tr>
      </tfoot>
    </table>
  </div>
  <!-- /.box-body -->
</div>
