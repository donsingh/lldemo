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
            <?php
              $headers = array();
              foreach($table[0] as $key=>$value){
                  echo "<th class='text-capitalize'>".str_replace("_"," ",$key)."</th>";
                  $headers[] = $key;
              }
             ?>
             <th>Options</th>
          </thead>
          <tbody>
          <?php
          foreach($table as $a=>$b){
            echo "<tr>";
            foreach($headers as $head){
                echo "<td class='col_".$head."'>".$b->$head."</td>";
            }
            echo "<td><button class='btn btn-flat btn-warning btn-xs'><i class='fa fa-pencil'></i></button></td>";
            echo "</tr>";
          }
          ?>
          </tbody>
          <tfooter>
            <td>ID</td>
            <td>Code</td>
            <td>Description</td>
          </tfooter>
        </table>

      </div>
    </div>

      </div>
    </div>

    <!-- MODAL -->
    <div class="modal fade settings_modal" tabindex="-1" role="dialog" aria-labelledby="settings_info_modal">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span></button>
            <h4 class="modal-title">UPDATE RECORD</h4>
          </div>
          <div class="modal-body">
            <form class="form-horizontal">
              <?php
              foreach($headers as $key=>$head){
                  echo '<div class="form-group">
                    <label class="col-sm-2 control-label text-capitalize">'.$head.'</label>
                    <div class="col-sm-10">
                      <p class="form-control-static"><input type="text" class="form-control" id="box_'.$head.'" /></p>
                    </div>
                  </div>';
              }
              ?>

            </form>
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
<script>
var cols = ['<?php echo join($headers,"','");?>'];
</script>
