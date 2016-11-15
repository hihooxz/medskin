<section class="content">
  <div class="row">
  <div class="col-md-12">
  <div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">Edit Payment</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <?php if(!$this->form_validation->run() && isset($_POST['account_name'])){ ?>
    <div class="alert alert-warning alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <h4><i class="icon fa fa-warning"></i> Alert!</h4>
      <?php echo validation_errors();
      ?>
    </div>
    <?php }
    echo $error;
    ?>
      <!-- text input -->
          <?php echo form_open_multipart('');?>
      <div class="form-group">
        <label>Payment Name</label>
        <input type="text" class="form-control"  name="name_payment" value="<?php echo $result['name_payment']?>">
      </div>
      <div class="form-group">
        <label>Account Name</label>
        <input type="text" class="form-control"  name="account_name" value="<?php echo $result['account_name']?>">
      </div>
      <div class="form-group">
        <label>Account Number</label>
        <input type="text" class="form-control"  name="account_number" value="<?php echo $result['account_number']?>">
      </div>
      <div>
         <label>Payment Image</label>
         <input type="file" class="form-control"  name="userfile">
       </div>


  </div>

      <div class="box-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
  </div>
  <!-- /.box-body -->
</div> <!-- end of div box body -->
</div> <!-- end of div cols 6 -->
</div> <!-- end of div row-->
</section>
