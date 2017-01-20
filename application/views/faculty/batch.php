<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <?php echo $page_header;?>
      <small><?php echo $page_description;?></small>
    </h1>
  </section>

  <!-- Main content -->
  <section class="content">

    <div class='box box-info'>
      <div class='box-body'>
        <div class='row'>
            <div class='col-md-12'>
              <h3>Upload XLS / XLSX File<br /><small>Please make sure the file follows: </small></h3>
              <img src='<?php echo base_url('assets/img/faculty_batch_sample.JPG');?>' style='width:100%;'>
              <strong>Fill in blank fields with <em>NULL</em></strong><br /><br />
              <?php if( $error != " "){?>
              <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                <?php echo $error;?>
              </div>
              <?php }?>
              <?php echo form_open_multipart('faculty/do_upload');?>

              <input type="file" name="facultyfile" size="20" required="required"/>

              <br />
              <div class="checkbox">
                  <label>
                    <input type="checkbox" name='cheaders' value='on'> Ignore first rows (Column Headers)
                  </label>
              </div>
              <button type="submit" value="upload" class='btn btn-flat btn-primary btn-sm ' />
              <i class='fa fa-upload'></i>
              Upload
              </button>

              </form>
            </div>
        </div>
      </div>
    </div>

    <!-- MODAL -->
    <div class="modal fade faculty_modal" tabindex="-1" role="dialog" aria-labelledby="faculty_info_modal">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span></button>
            <h4 class="modal-title"></h4>
          </div>
          <div class="modal-body">

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Close</button>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- MODAL END -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
