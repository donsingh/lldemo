<script src='<?php echo base_url('assets/plugins/datatables/jquery.dataTables.min.js');?>'></script>
<script src='<?php echo base_url('assets/plugins/datatables/dataTables.bootstrap.min.js');?>'></script>
<script>
$(document).ready(function(){
  $("#myces").DataTable({
    "pageLength": 8
  });

  $(".add-record").on("click", function(){
      $(".ces_modal").modal("show");
  });
});
</script>
