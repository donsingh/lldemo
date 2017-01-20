<script src='<?php echo base_url('assets/plugins/datepicker/bootstrap-datepicker.js');?>'></script>
<script>
$(document).ready(function(){
    $(".datepicker").datepicker({
        format: "yyyy-mm-dd"
    });
});
function check()
{
    //some validation dire
    return true;
}
</script>
