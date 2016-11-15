<div class="box">
  <div class="box-header">
    <h3 class="box-title">Manage User</h3>
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
                'username'=>'Username',
                'full_name'=> 'Full Name',
                'email' => 'Email',
                'address' => 'Address',
                'phone_number'=> 'Phone Number',
                'city' => 'City',
                'province' => 'Province'
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
        <th>Username</th>
        <th>Avatar</th>
        <th>Full Name</th>
        <th>Email</th>
        <th>address</th>
        <th>province</th>
        <th>city</th>
        <th>Action</th>
      </tr>
      </thead>
      <tbody>
        <?php
      		if($results!=FALSE){
      			foreach ($results as $rows) {
      				?>
      				<tr>
                <td><?php echo $rows->username ?></td>
                <td><?php if($rows->avatar!= "") {
                  ?>
                  <img src="<?php echo base_url($rows->avatar)?>" height="150px;" >
                  <?php
                } ?></td>
                <td><?php echo $rows->full_name ?></td>
                <td><?php echo $rows->email ?></td>
                <td><?php echo $rows->address ?></td>
                  <td><?php echo $rows->province ?></td>
                  <td><?php echo $rows->city ?></td>
                <td>
                  <a href ="<?php echo base_url('adminpanel/user/edit_user/'.$rows->id_user)?>">Edit</a> |
                  <a href ="<?php echo base_url('adminpanel/user/delete_user/'.$rows->id_user)?>" onclick="return confirm('Are You Sure want to delete?')">Delete</a>
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
        <th>Username</th>
        <th>Avatar</th>
        <th>Full Name</th>
        <th>Email</th>
        <th>address</th>
        <th>province</th>
        <th>city</th>
        <th>Action</th>
      </tr>
      </tfoot>
    </table>
  </div>
  <!-- /.box-body -->
</div>
