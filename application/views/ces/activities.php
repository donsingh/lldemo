<!-- Content Wrapper. Contains page content -->
<link rel='stylesheet' href='<?php echo base_url('assets/plugins/datepicker/datepicker3.css');?>'>
<style>
.table{
  width:100% !important;
}
tr{
    cursor: pointer;
}
</style>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <?php echo $page_header;?>
      <small><?php echo $page_description;?></small>
      <button class='btn btn-sm btn-flat bg-navy pull-right add-record'>Add New Activity <i class='fa fa-plus'></i></button>
    </h1>
  </section>

  <!-- Main content -->
  <section class="content">

    <div class='box box-info'>
      <div class='box-body'>
        <div class='row'>
          <div class='col-xs-12'>

        <table id="activities" class="table table-hover table-bordered table-condensed">
          <thead>
<!-- id
activity
date_Start
date_end
beneficiary
name_benefeciary
ben_address
purpose
type -->
             <th>Activity</th>
             <th>Date</th>
             <th>Beneficiary</th>
             <th>Purpose</th>
             <th>Type</th>
             <th class='hidden'>Date End</th>
             <th class='hidden'>Benefeciary Type</th>
             <th class='hidden'>Address</th>
          </thead>
          <tbody>
          <?php
          foreach($acts as $a=>$b){
            echo "<tr>";
            echo "<td>".$b->activity."</td>";
            echo "<td>".date("F j, Y", strtotime($b->date_start))."</td>";
            echo "<td>".$b->name_benefeciary."</td>";
            echo "<td>".$b->purpose."</td>";
            $type = ($b->type == "ex")? "Extra-Curricular" : "Co-Curricular";
            echo "<td>".$type."</td>";
            echo "<td class='hidden'>".date("F j, Y", strtotime($b->date_end))."</td>";
            echo "<td class='hidden'>".$b->beneficiary."</td>";
            echo "<td class='hidden'>".$b->ben_address."</td>";
            echo "</tr>";
          }
          ?>
          </tbody>
        </table>

      </div>
    </div>

      </div>
    </div>

    <!-- MODAL -->
    <div class="modal fade ces_modal1" tabindex="-1" role="dialog" aria-labelledby="ces_info_modal1">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span></button>
            <h4 class="modal-title">ADD RECORD</h4>
          </div>
          <form>

          <div class="modal-body">
              <div class='row'>
                <div class='col-xs-12'>
                  <label>Activity Name</label>
                  <input type='text' class='form-control' placeholder='' />
                </div>
              </div>
              <br />
              <div class='row'>
                <div class='col-xs-12'>
                  <label>Address</label>
                  <input type='text' class='form-control' placeholder='' />
                </div>
              </div>
              <br />
              <div class='row'>
                <div class='col-xs-6'>
                  <label>Beneficiary Name</label>
                  <input type='text' class='form-control ' />
                </div>
                <div class='col-xs-6'>
                  <label>Beneficiary Type</label>
                  <input type='text' class='form-control ' />
                </div>
              </div>
              <br />
              <div class='row'>
                <div class='col-xs-6'>
                  <label>Date Start</label>
                  <input type='text' class='form-control datepicker' />
                </div>
                <div class='col-xs-6'>
                  <label>Date End</label>
                  <input type='text' class='form-control datepicker' />
                </div>
              </div>
              <br />
              <div class='row'>
                <div class='col-xs-12'>
                  <label>Purpose</label>
                  <input type='text' class='form-control' placeholder='' />
                </div>
              </div>
              <br />
              <div class='row'>
                <div class='col-xs-12'>
                  <label>Type</label>
                  <select class='form-control'>
                      <option>Extra-Curricular</option>
                      <option>Co-Curricular</option>
                  </select>
                </div>
          </form>
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary pull-right" data-dismiss="modal">Submit</button>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- MODAL END -->

    <!-- MODAL -->
    <div class="modal fade ces_modal2" tabindex="-1" role="dialog" aria-labelledby="ces_info_modal2">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span></button>
            <h4 class="modal-title">VIEW CES ACTIVITY DETAILS</h4>
          </div>
          <form>

          <div class="modal-body">
              <div class="row dyna-body">

              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Close</button>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- MODAL END 2 -->


  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
