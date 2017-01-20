<script src='<?php echo base_url('assets/plugins/datatables/jquery.dataTables.min.js');?>'></script>
<script src='<?php echo base_url('assets/plugins/datatables/dataTables.bootstrap.min.js');?>'></script>
<script>
$(document).ready(function(){
    $("#records").DataTable();
    // $(".settings_modal").modal("show");
    $(".btn-warning").on("click", function(){
        var row = $(this).parent().parent();
        $(cols).each(function(a,b){
            $("#box_"+b).val($(row).find(".col_"+b).text());
            $(".settings_modal").modal("show");
        });
    });
});

</script>
