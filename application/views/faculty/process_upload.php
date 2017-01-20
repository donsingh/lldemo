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
    </h1>
  </section>

  <!-- Main content -->
  <section class="content">

    <div class='box box-info'>
      <div class='box-body'>
        <div class='row'>
          <div class='col-xs-12'>

            <h3>
              Your file was successfully uploaded!
              <small>Review the data, edit and submit for insertion!</small>
              <button class='btn btn-flat bg-purple pull-right'>Insert All <i class='fa fa-indent'></i></button>
            </h3>
            <div class='table-responsive'>
            <table id="records" class="table table-hover table-striped table-bordered table-condensed">
              <thead>
                <th>ID</th>
                <th>FIRST NAME</th>
                <th>MIDDLE NAME</th>
                <th>LAST NAME</th>
                <th>DATE OF BIRTH</th>
                <th>GENDER</th>
                <th>TIN</th>
                <th>SSS</th>
                <th>DATE HIRED</th>
                <th>TENURE</th>
                <th>DEPARTMENT</th>
                <th>OPT</th>
              </thead>
              <tbody>
            <?php
              foreach($sheet as $key=>$val){
                if($headers != 1 && $key != 1){
                  echo "<tr>";
                  foreach($val as $a=>$item){
          						$query = ($item == "") ? "NULL" : $item;
                      $query = ($a == "E" || $a == "I") ? date("Y-m-d",($item - 25569) * 86400) : $item;
                      if($a == "F"){
                          $selM = (strtoupper($item) == "MALE") ? "selected='selected'" : "";
                          $selF = (strtoupper($item) == "FEMALE") ? "selected='selected'" : "";
                          $query = "
                          <select class='form-control input-sm'>
                              <option value='1' ".$selM.">Male</option>
                              <option value='2' ".$selF.">Female</option>
                          </select>
                          ";
                      }

                      if($a == "J"){
                          $selM = (strtoupper($item) == "CONTRACTUAL") ? "selected='selected'" : "";
                          $selF = (strtoupper($item) == "PERMANENT") ? "selected='selected'" : "";
                          $query = "
                          <select class='form-control input-sm'>
                              <option value='1' ".$selM.">Contractual</option>
                              <option value='2' ".$selF.">Permanent</option>
                          </select>
                          ";
                      }
                      if($a == "K"){
                          $query = "<select class='form-control input-sm'>";
                          foreach($dept as $dep){
                              similar_text($dep->name, $item, $percent);
                              $sel = ($percent > 95) ? "selected='selected'" : "";
                              $query .= "<option value='".$dep->id."' ".$sel.">".$dep->name."</option>";
                          }
                          $query .= "</select>";
                      }
                      echo "<td>".$query."</td>";
          				}

                  echo "<td>
                  <button class='btn btn-flat btn-xs btn-danger'><i class='fa fa-remove'></i></button>
                  <button class='btn btn-flat btn-xs btn-primary'><i class='fa fa-upload'></i></button>
                  </td>";

                  echo "</tr>";
                }
              }
            ?>
            </tbody>
            <tfooter>
                <th>ID</th>
                <th>FIRST NAME</th>
                <th>MIDDLE NAME</th>
                <th>LAST NAME</th>
                <th>DATE OF BIRTH</th>
                <th>GENDER</th>
                <th>TIN</th>
                <th>SSS</th>
                <th>DATE HIRED</th>
                <th>TENURE</th>
                <th>DEPARTMENT</th>
                <th>OPT</th>
            </tfooter>
            </table>

          </div>
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
            <h4 class="modal-title"><span class='faculty_lname'></span>,<span class='faculty_fname'></span>&nbsp;<span class='faculty_mname'></span></h4>
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
