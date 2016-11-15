<div class="box">
  <div class="box-header">
    <h3 class="box-title">Manage Confirm Payment</h3>
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
                'account_name'=>'Name Account',
                'account_number'=>'Number Account'
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
        <th>Bank Name</th>
        <th>Name Account</th>
        <th>Number Account</th>
        <th>Nominal</th>
        <th>Date Transfer</th>
        <th>Date Confirm Payment</th>

      </tr>
      </thead>
      <tbody>
        <?php
      		if($results!=FALSE){
      			foreach ($results as $rows) {
      				?>
      				<tr>
                <td><?php echo $rows->name_bank?></td>
                  <td><?php echo $rows->account_name?></td>
                  <td><?php echo $rows->account_number?></td>
                  <td><?php echo $rows->nominal?></td>
                  <td><?php echo date('D, d M Y ',strtotime($rows->date_transfer)) ?></td>
                  <td><?php echo date('D, d M Y H:i',strtotime($rows->date_confirm_payment)) ?></td>

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
        <th>Bank Name</th>
        <th>Name Account</th>
        <th>Number Account</th>
        <th>Nominal</th>
        <th>Date Transfer</th>
        <th>Date Confirm Payment</th>

      </tr>
      </tfoot>
    </table>
  </div>
  <!-- /.box-body -->
</div>
