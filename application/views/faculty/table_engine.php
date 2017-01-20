<script src='<?php echo base_url('assets/plugins/datatables/jquery.dataTables.min.js');?>'></script>
<script src='<?php echo base_url('assets/plugins/datatables/dataTables.bootstrap.min.js');?>'></script>
<script>
$(document).ready(function(){
    $("body").addClass("sidebar-collapse");
    $("#records").DataTable({
      bProcessing: true,
      responsive: true
    });
});

$(".btn-xs.btn-primary").on("click", function(){
    $.ajax({
      url:"<?php echo base_url();?>index.php/Faculty/faculty_info",
      cache: false,
      method: "POST",
      data:{id:$(this).parent().attr("id")},
      success: function(data){
          if(data=="0"){
              alert("Something went wrong...");
          }else{
              var obj = JSON.parse(data);
              $.each(obj,function(a,b){
                  $(".faculty_"+a).text(b);
              });
              $(".faculty_modal").modal('show');
          }
      }
    });

});
</script>
