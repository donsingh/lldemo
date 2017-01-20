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

        <table id="book" class="table table-hover table-bordered table-condensed">
          <thead>
             <th>ISBN</th>
             <th>Title</th>
             <th>Year</th>
             <th>Publisher</th>
             <th>Options</th>
          </thead>
          <tbody>
          <?php
          foreach($books as $a=>$b){
            echo "<tr>";
            echo "<td>".$b->ISBN."</td>";
			echo "<td>".$b->title."</td>";
			echo "<td>".$b->year_published."</td>";
			echo "<td>".$b->publisher."</td>";
			echo "<td>
					<button class='btn btn-flat btn-xs btn-info' alt='".$b->id."'><i class='fa fa-list-ol'></i> Details</button>
			</td>";
            echo "</tr>";
          }
          ?>
          </tbody>
          <tfooter>
			 <th>ISBN</th>
             <th>Title</th>
             <th>Year</th>
             <th>Publisher</th>
             <th>Options</th>
          </tfooter>
        </table>

      </div>
    </div>

      </div>
    </div>

    <!-- MODAL -->
    <div class="modal fade book_modal" tabindex="-1" role="dialog" aria-labelledby="book_info_modal">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <form class="form-horizontal" method="POST" action="<?php echo base_url();?>index.php/book/new_book/" autocomplete="off">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span></button>
            <h4 class="modal-title">ADD NEW BOOK RECORD</h4>
          </div>
          <div class="modal-body">
                
                    <div class="form-group">
                        <label class="col-sm-2 control-label">ISBN</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" placeholder="ISBN">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Chapter Title</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" placeholder="Chapter Title">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Title</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" placeholder="Title">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Authors</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" placeholder="Separate Authors by Commas (John B. Adams, Mark K. Spencer)">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Year Published</label>
                        <div class="col-sm-3">
                          <input type="text" class="form-control" placeholder="Year">
                        </div>
                        <label class="col-sm-2 control-label">Role</label>
                        <div class="col-sm-5">
                          <select class='form-control'>
                            <option>Main Author</option>
                            <option>Co-Author</option>
                          </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Publisher Name</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" placeholder="Publisher Name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Publisher Address</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" placeholder="Publisher Address">
                        </div>
                    </div>
                
          </div> 
          <div class="modal-footer">
            <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary btn-flat pull-right" data-dismiss="modal">Submit</button>
          </div>
          </form>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- MODAL END -->
	
	<div class="modal fade details_modal" tabindex="-1" role="dialog" aria-labelledby="details_modal">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <form class="form-horizontal" >
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span></button>
            <h4 class="modal-title">ADD NEW BOOK RECORD</h4>
          </div>
          <div class="modal-body">
                
                    <div class="form-group">
                        <label class="col-sm-2 control-label">ISBN</label>
                        <div class="col-sm-10">
                          <h4 class='data1'></h4>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Chapter Title</label>
                        <div class="col-sm-10">
                          <h4 class='data2'></h4>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Title</label>
                        <div class="col-sm-10">
                          <h4 class='data3'></h4>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Authors</label>
                        <div class="col-sm-10">
                          <h4 class='data4'></h4>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Year Published</label>
                        <div class="col-sm-3">
                          <h4 class='data5'></h4>
                        </div>
                        <label class="col-sm-2 control-label">Role</label>
                        <div class="col-sm-5">
                          <h4 class='data6'></h4>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Publisher Name</label>
                        <div class="col-sm-10">
                          <h4 class='data7'></h4>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Publisher Address</label>
                        <div class="col-sm-10">
                          <h4 class='data8'></h4>
                        </div>
                    </div>
                
          </div> 
          </form>
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
