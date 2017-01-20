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

        <table id="records" class="table table-hover table-bordered">
          <thead>
            <td>ID Number</td>
            <td>Last Name</td>
            <td>First Name</td>
            <td>Middle Name</td>
            <td>Department</td>
            <td>Option</td>
          </thead>
          <tbody>
          <?php
          foreach($test as $k=>$t){
            echo "<tr>";
            echo "<td>".$t->emp_no."</td>";
            echo "<td>".$t->lname."</td>";
            echo "<td>".$t->fname."</td>";
            echo "<td>".$t->mname."</td>";
            echo "<td>".$t->department."</td>";
            echo "<td id='".$t->id."'>
              <button class='btn btn-flat btn-xs btn-primary'><i class='fa fa-eye'></i></button>
              <a href='".base_url()."index.php/Faculty/faculty_form/update/".$t->id."'>
                <button class='btn btn-flat btn-xs btn-warning'><i class='fa fa-pencil'></i></button>
              </a>
              <button class='btn btn-flat btn-xs btn-danger'><i class='fa fa-remove'></i> </button>
            </td>";
            echo "</tr>";
          }
          ?>
          </tbody>
          <tfooter>
            <td>ID Number</td>
            <td>Last Name</td>
            <td>First Name</td>
            <td>Middle Name</td>
            <td>Department</td>
            <td>Option</td>
          </tfooter>
        </table>

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
            <table class='table table-bordered'>
                <tr>
                  <td><strong>ID Number: </strong><p class='faculty_emp_no'></p></td>
                  <td><strong>Department: </strong><p class='faculty_department'></p></td>
                  <td><strong>Hire Date: </strong><p class='faculty_date_hired'></p></td>
                  </tr>
                  <tr>
                  <td><strong>Date of Birth: </strong><p class='faculty_dob'></p></td>
                  <td><strong>Gender: </strong><p class='faculty_sex'></p></td>
                  <td><strong>Tenure: </strong><p class='faculty_tenure'></p></td>
                  </tr>
                  <tr>
                  <td><strong>TIN: </strong><p class='faculty_tin'></p></td>
                  <td><strong>SSS: </strong><p class='faculty_sss'></p></td>
                </tr>
            </table>
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
