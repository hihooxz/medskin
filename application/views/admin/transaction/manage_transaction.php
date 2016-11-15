<div class="box">
  <div class="box-header">
    <h3 class="box-title">Manage transaction</h3>
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
                'user'=>'username',
                'status'=>'status_transaction'
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
        <th>User</th>
        <th>Payment</th>
        <th>Debit/Credit</th>
        <th>Nominal</th>
        <th>Description</th>
        <th>Transaction Type</th>
        <th>Status</th>
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
                <td><?php echo $rows->name_payment ?></td>
                <td><?php if($rows->debit_credit==0) echo "Debit"; else echo "Credit"; ?></td>
                  <td><?php echo $rows->nominal?></td>
                  <td><?php echo $rows->description?></td>
                  <td><?php if($rows->status_transaction==0) echo "Pending"; elseif($rows->status_transaction==1) echo "Approved"; else echo "Rejected"; ?></td>
                  <td><?php echo date('D, d M Y H:i',strtotime($rows->date_transaction)) ?></td>
                  <td>
                    <?php
                    if($rows->status_transaction != 0){
                    ?>
                  <a href ="<?php echo base_url($this->uri->segment(1).'/transaction/status-pending/'.$rows->id_transaction)?>" title="Set Status to Pending">
                    <?php
                      }
                    ?>
                    <i class="fa fa-clock-o fa-fw"></i>
                    <?php
                    if($rows->status_transaction != 0){
                    ?>
                    </a>
                    <?php
                      }
                    ?>
                    <?php
                    if($rows->status_transaction !=1){
                    ?>
                  <a href ="<?php echo base_url($this->uri->segment(1).'/transaction/status-done/'.$rows->id_transaction)?>" title="Set Status to done">
                    <?php
                    }
                    ?>
                    <i class="fa fa-check fa-fw"></i>
                    <?php
                    if($rows->status_transaction != 1){
                    ?>
                  </a>
                  <?php
                    }
                    ?>
                    <?php
                      if($rows->status_transaction != 2){
                      ?>
                    <a href ="<?php echo base_url($this->uri->segment(1).'/transaction/status-cancel/'.$rows->id_transaction)?>" title="Set Status to Canceled">
                    <?php
                      }
                      ?>
                      <i class="fa fa-times"></i>
                      <?php
                      if($rows->status_transaction != 2){
                      ?>
                    </a>
                    <?php
                      }
                      ?>
 |
                  <a href ="<?php echo base_url($this->uri->segment(1).'/delete_transaction/'.$rows->id_transaction)?>" onclick="return confirm('Are you sure bro, think again if you want delete this item ?')"><i class="fa fa-trash" aria-hidden="true"></i></a>
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
        <th>User</th>
        <th>Payment</th>
        <th>Debit/Credit</th>
        <th>Nominal</th>
        <th>Description</th>
        <th>Transaction Type</th>
        <th>Status</th>
        <th>Action</th>
      </tr>
      </tfoot>
    </table>
  </div>
  <!-- /.box-body -->
</div>
