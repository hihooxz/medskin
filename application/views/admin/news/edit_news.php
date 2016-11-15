<section class="content">
  <div class="row">
  <div class="col-md-12">
  <div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">Edit News</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <?php if(!$this->form_validation->run() && isset($_POST['news'])){ ?>
    <div class="alert alert-warning alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <h4><i class="icon fa fa-warning"></i> Alert!</h4>
      <?php echo validation_errors();
      ?>
    </div>
    <?php }
    //echo $error;
    ?>
    <?php echo form_open_multipart('');?>
      <!-- text input -->
      <div class="form-group">
        <label>Image News</label>
        <input type="file" class="form-control"  name="userfile">
      </div>
      <div class="form-group">
        <label>Content News</label>
        <textarea class="form-control" rows="3" name="news"><?php echo $result['news']?></textarea>
        </div>
        <div class="form-group">
          <label>Status News</label>
          <select class="form-control" name="status_news" value="<?php echo $result['status_news']?>">
            <option value="1">Pending</option>
            <option value="2">Published</option>
          </select>
        </div>
       </div>

      <div class="box-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
      <?php echo form_close(); ?>
  </div>
  <!-- /.box-body -->
</div> <!-- end of div box body -->
</div> <!-- end of div cols 6 -->
</div> <!-- end of div row-->
</section>
