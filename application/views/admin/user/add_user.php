<section class="content">
  <div class="row">
  <div class="col-md-12">
  <div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">Add User</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <?php if(!$this->form_validation->run() && isset($_POST['username'])){ ?>
    <div class="alert alert-warning alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <h4><i class="icon fa fa-warning"></i> Alert!</h4>
      <?php echo validation_errors()?>
    </div>
    <?php } ?>
    <?php
    if(isset($error)){
    echo $error;
  }
    ?>
    <?php echo form_open_multipart('');?>

      <!-- text input -->
      <div class="form-group">
        <label>Username</label>
        <input type="text" class="form-control" placeholder="username" name="username" value="<?php echo set_value('username')?>">
      </div>
      <div class="form-group">
        <label>Password</label>
        <input type="password" class="form-control" placeholder="password" name="password">
      </div>
      <div class="form-group">
        <label>Avatar</label>
        <input type="file" class="form-control"  name="userfile">
      </div>

      <!-- textarea -->
      <div class="form-group">
        <label>Email</label>
        <input type="text" class="form-control" placeholder="medskin@gmail.com" name="email" value="<?php echo set_value('email')?>">
      </div>
      <div class="form-group">
        <label>Birthday:</label>

        <div class="input-group date">
          <div class="input-group-addon">
            <i class="fa fa-calendar"></i>
          </div>
          <input type="date" class="form-control pull-right" id="datepicker" name="birthday">
        </div>
        <!-- /.input group -->
      </div>
      <div class="form-group">
        <label>Full Name</label>
        <input type="text" class="form-control"  placeholder="medskin" name="full_name" value="<?php echo set_value('full_name')?>">
      </div>

      <div class="form-group">
        <label>Address</label>
        <textarea class="form-control" rows="3" placeholder="Address" name="address"><?php echo set_value('username')?></textarea>
      </div>

      <!-- select -->
      <div class="form-group">
        <label>Province</label>
        <?php
          $options = array(
            'Aceh' => 'Aceh',
            'Sumut' => 'Sumatera Utara',
            'Sumbar'=> 'Sumatra Barat',
            'Riau' => 'Riau',
            'Jambi'=> 'Jambi',
            'Sumsel' => 'Sumatra Selatan',
            'Bengkulu' => 'Bengkulu',
            'Lampung' => 'Lampung',
            'Babel' => 'Kep. Bangka Belitung',
            'kepRiau' =>'Kepulauan Riau',
            'Jakarta' =>'Jakarta',
            'Jabar' => 'Jawa Barat',
            'Banten'=> 'Banten',
            'Jateng'=> 'Jateng',
            'Yogyakarta'=> 'Yogyakarta',
            'Jatim'=> 'Jawa Timur',
            'Kalbar'=> 'Kalimantan Barat',
            'Kalteng'=> 'Kalimantan Tengah',
            'Kalsel'=> 'Kalimantan Selatan',
            'Kaltim'=> 'Kalimantan Timur',
            'Kaltra'=> 'Kalimantan Utara',
            'Bali'=> 'Bali',
            'NTT'=> 'Nusa Tenggara Timur',
            'NTB'=> 'Nusa Tenggara Barat',
            'Sulut'=> 'Sulawesi Utara',
            'Sulteng'=> 'Sulawesi Tengah',
            'Sulsel'=> 'Sulawesi Selatan',
            'Sultengg'=> 'Sulawesi Tenggara',
            'Sulbar'=> 'Sulawesi Barat',
            'Gorontalo'=> 'Gorontalo',
            'Maluku'=> 'Maluku',
            'Maluku Utara'=> 'Maluku Utara',
            'Papua'=> 'Papua',
            'Papua Barat'=> 'Papua Barat',
          );
          echo form_dropdown('province',$options,set_value('province'),'class="form-control"');
       ?>
      </div>
      <div class="form-group">
        <label>City</label>
        <input type="text" class="form-control"  placeholder="Jakarta" name="city" value="<?php echo set_value('city')?>">
      </div>
      <div class="form-group">
        <label>Experience</label>
        <textarea class="form-control" rows="3"  name="experience"><?php echo set_value('experience')?></textarea>
      </div>
      <div class="form-group">
        <label>Status User</label>
        <select class="form-control" name="status_user" value="<?php echo set_value('status_user')?>">
          <option value="0">Non Active</option>
          <option value="1">Active</option>
          <option value="2">Banned</option>
        </select>
      </div>
      <div class="form-group">
        <label>Permission</label>
        <select class="form-control" name="permission" value="<?php echo set_value('permission')?>">
          <option value="1">Admin</option>
          <option value="2">Doctor</option>
          <option value="3">Pasien</option>
        </select>
      </div>
      <div class ="form-group">
        <label>Love</label>
          <input type="text" class="form-control"  placeholder="medskin" name="love" value="<?php echo set_value('love')?>">
      </div>
      <div class="box-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>

  </div>
  <!-- /.box-body -->
</div> <!-- end of div box body -->
</div> <!-- end of div cols 6 -->
</div> <!-- end of div row-->
</section>
<?php $this->load->view('admin/common/script'); ?>
