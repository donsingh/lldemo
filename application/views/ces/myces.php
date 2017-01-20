<!-- Content Wrapper. Contains page content -->
<style>
.table{
  width:100% !important;
}
</style>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <?php echo $page_header;?>
      <small><?php echo $page_description;?></small>
      <button class='btn btn-sm btn-flat bg-navy pull-right add-record'>Add New Record <i class='fa fa-plus'></i></button>
    </h1>
  </section>

  <!-- Main content -->
  <section class="content">

    <div class='box box-info'>
      <div class='box-body'>
        <div class='row'>
          <div class='col-xs-12'>

        <table id="myces" class="table table-hover table-bordered table-condensed">
          <thead>
              <!-- activity, date_start, name_benefeciary, role -->
             <th>Activity</th>
             <th>Date</th>
             <th>Beneficiary</th>
             <th>Role</th>
             <th>Status</th>
          </thead>
          <tbody>
          <?php
          foreach($myces as $a=>$b){
            echo "<tr>";
            echo "<td>".$b->activity."</td>";
            echo "<td>".$b->date_start."</td>";
            echo "<td>".$b->name_benefeciary."</td>";
            echo "<td>".$b->role."</td>";
            switch($b->status){
              case "0": echo "<td class='warning text-center'>UNVERIFIED <i class='fa fa-question-circle'></i></td>";
                        break;
              case "1": echo "<td class='info text-center'>VERIFIED BY CES COORDINATOR <i class='fa fa-hourglass-end'></i></td>";
                        break;
              case "2": echo "<td class='info text-center'>VERIFIED BY CES COORDINATOR <i class='fa fa-hourglass-end'></i></td>";
                        break;
              case "3": echo "<td class='success text-center'>VERIFIED <i class='fa fa-check-circle'></i></td>";
                        break;
            }
            echo "</tr>";
          }
          ?>
          </tbody>
          <tfooter>
            <th>Activity</th>
            <th>Date</th>
            <th>Beneficiary</th>
            <th>Role</th>
            <th>Status</th>
          </tfooter>
        </table>

      </div>
    </div>

      </div>
    </div>

    <!-- MODAL -->
    <div class="modal fade ces_modal" tabindex="-1" role="dialog" aria-labelledby="ces_info_modal">
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
                  <input type='text' class='form-control' placeholder='Search CES Activity' />
                  <small>If activity is not yet registered, please create it first in the Main Menu!</small>
                </div>
              </div>
              <hr />
              <div class='row'>
                <div class='col-xs-12'>
                  <label>Role</label>
                  <select class='form-control'>
                      <option>Activity Lead</option>
                      <option>Coordinator</option>
                      <option>Facilitator</option>
                      <option>Co-Organizer</option>
                      <option>Resource Speaker</option>
                      <option>Participant</option>
                      <option>Assistant</option>
                      <option>Member</option>
                  </select>
                  <small>After submitting, roles will have to be verified by Dept. CES, College CES and University CES Coordinators</small>
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

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
