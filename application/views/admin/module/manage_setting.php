<section class="content">
  <div class="row">
  <div class="col-md-12">
  <div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">Edir User</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <?php if(!$this->form_validation->run() && isset($_POST['title'])){ ?>
    <div class="alert alert-warning alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <h4><i class="icon fa fa-warning"></i> Alert!</h4>
      <?php echo validation_errors()?>
    </div>
    <?php } ?>
    <?php echo form_open_multipart('');?>
      <div class="form-group">
        <label>Website's Title</label>
        <input type="text" class="form-control"  placeholder="Website's Title" name="title" value="<?php echo $result['title_website']?>">
      </div>
      <div class="form-group">
        <label>Consultation's Price</label>
        <input type="text" class="form-control"  placeholder="Consultation's Price" name="consultation" value="<?php echo $result['price_consultation']?>">
      </div>
      <div class="form-group">
        <label>Website's Title</label>
        <input type="text" class="form-control"  placeholder="Appointment's Price" name="appointment" value="<?php echo $result['price_appointment']?>">
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
