<div class="box">
  <div class="box-header">
    <h3 class="box-title">Manage Medical Record</h3>
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
                'username'=>'Pasien',
                'anamnesis'=> 'anamnesis',
                'date_medicalrecord' => 'Date MedicalRecord',
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
        <th>Pasien</th>
        <th>anamnesis</th>
        <th>Check Result</th>
        <th>Plan To Do</th>
        <th>Medical Act</th>
        <th>Other</th>
        <th>Date MedicalRecord</th>
        <th>Date Insert</th>
        <th>Action</th>
      </tr>
      </thead>
      <tbody>
        <?php
      		if($results!=FALSE){
      			foreach ($results as $rows) {
      				?>
      				<tr>
                <td><?php echo $rows->full_name ?></td>
                <td><?php echo $rows->anamesis ?></td>
                <td><?php echo $rows->check_result ?></td>
                <td><?php echo $rows->plan_to_do ?></td>
                  <td><?php echo $rows->act_medical ?></td>
                  <td><?php echo $rows->other_medical ?></td>
                  <td><?php echo $rows->date_medicalrecord ?></td>
                  <td><?php echo $rows->date_insert ?></td>
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
        <th>Pasien</th>
        <th>anamnesis</th>
        <th>Check Result</th>
        <th>Plan To Do</th>
        <th>Medical Act</th>
        <th>Other</th>
        <th>Date MedicalRecord</th>
        <th>Date Insert</th>
        <th>Action</th>
      </tr>
      </tfoot>
    </table>
  </div>
  <!-- /.box-body -->
</div>
