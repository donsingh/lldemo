<!-- Content Wrapper. Contains page content -->
<link rel='stylesheet' href='<?php echo base_url('assets/plugins/datepicker/datepicker3.css');?>'>
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

    <div class="box box-info">
      <div class="box-header">
        <h3 class="box-title">Manual Insert</h3>
        <!-- <div class="box-tools">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
          </button>
          <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div> -->
      </div>
      <div class="box-body">
          <div class='row'>
            <form method='POST' action='<?php echo base_url();?>index.php/faculty/new_faculty' onsubmit="return check();" autocomplete="off">
            <div class='col-md-4'>
              <label>ID Number</label>
              <input type='text' class='form-control' name='emp_no' id='emp_no' required="required" />
            </div>

            <div class='col-md-4'>
              <label>Department</label>
              <select class='form-control' name='dept' id='dept'>
                  <?php
                    foreach($dept as $d){
                        echo "<option value='".$d->id."'>".$d->name."</option>";
                    }
                  ?>
              </select>
            </div>

            <div class='col-md-4'>
              <label>Date of Birth <i>YYYY-MM-DD</i></label>
              <input type='text' class='form-control datepicker' name='dob' id='dob' required="required"/>
            </div>
          </div>
          <hr />
          <div class='row'>
            <div class='col-md-4'>
              <label>Last Name</label>
              <input type='text' class='form-control' name='lname' id='lname' required="required" />
            </div>

            <div class='col-md-4'>
              <label>First Name</label>
              <input type='text' class='form-control' name='fname' id='fname' required="required" />
            </div>

            <div class='col-md-4'>
              <label>Middle Name</label>
              <input type='text' class='form-control' name='mname' id='mname' required="required" />
            </div>
          </div>
          <hr />
          <div class='row'>
            <div class='col-md-4'>
              <label>Gender</label>
              <select class='form-control' name='sex' id='sex'>
                <option value='m'>Male</option>
                <option value='f'>Female</option>
              </select>
            </div>

            <div class='col-md-4'>
              <label>Tax Identification Number</label>
              <input type='number' class='form-control' name='tin' id='tin' required="required" />
            </div>

            <div class='col-md-4'>
              <label>SSS</label>
              <input type='number' class='form-control' name='sss' id='sss' required="required" />
            </div>
          </div>

          <hr />
          <div class='row'>
            <div class='col-md-4'>
              <label>Date Hired</label>
              <input type='text' class='form-control datepicker' name='date_hired' id='date_hired' required="required" />
            </div>

            <div class='col-md-4'>
              <label>Tenure</label>
              <select class='form-control' name='tenure' id='tenure'>
                  <?php foreach($tenure as $t){
                      echo "<option value='".$t->id."'>".$t->description."</option>";
                  }?>

              </select>
            </div>
            <div class='col-md-4'>
              <label>Options</label>
              <p>
                <button type='reset' class='btn btn-flat btn-sm btn-warning'><i class='fa fa-reply'></i> Reset</button>&nbsp;
                <button type='submit' class='btn btn-flat btn-sm btn-success'><i class='fa fa-paper-plane-o'></i> Submit</button>
              </p>
            </div>
          </div>
      </div>

    </form>
      <!-- /.box-body -->
    </div>


  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
