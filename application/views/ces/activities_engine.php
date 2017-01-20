<script src='<?php echo base_url('assets/plugins/datatables/jquery.dataTables.min.js');?>'></script>
<script src='<?php echo base_url('assets/plugins/datatables/dataTables.bootstrap.min.js');?>'></script>
<script src='<?php echo base_url('assets/plugins/datepicker/bootstrap-datepicker.js');?>'></script>
<script>
$(document).ready(function(){
  $("body").addClass("sidebar-collapse");
  $("#activities").DataTable({

  });

  $(".datepicker").datepicker({
      format: "yyyy-mm-dd"
  });

  $(".add-record").on("click", function(){
      $(".ces_modal1").modal("show");
  });

  $("#activities tr").on("click", function(){
      var row = $(this);
      $(".dyna-body").empty();
      $("th").each(function(a,b){
          $(".dyna-body").append("<div class='col-sm-4 text-right'><strong>"+$(b).text()+"</strong></div>");
          $(".dyna-body").append("<div class='col-sm-8'>"+$(row).find("td").eq(a).text()+"</div>");
      });
      $(".ces_modal2").modal("show");
  });
});
</script>
