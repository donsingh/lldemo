<script src='<?php echo base_url('assets/plugins/datatables/jquery.dataTables.min.js');?>'></script>
<script src='<?php echo base_url('assets/plugins/datatables/dataTables.bootstrap.min.js');?>'></script>
<script>
var ask = 1;
$(document).ready(function(){
    $("body").addClass("sidebar-collapse");
    // var table = $("#records").DataTable({
    //   bProcessing: true,
    //   responsive: true
    // });

    $("td").on("dblclick", function(){
          var pos = $(this).index();
          if(pos != 5 && pos != 9 && pos != 10){
              var cntnt = $(this).text();
              $(this).html("<input type='text' id='workOn' value='"+cntnt+"' />").focusout(function() {
                  var newContent = $("#workOn").val();
                  $(this).html(newContent);
              });
              $("#workOn").focus();
          }
    });

    $(".btn-danger").on("click", function(){
        if(confirm("Remove this row?")){
            $(this).parent().parent().remove();
        }
    });

    $(".btn-primary").on("click", function(){
        var valid = 0;
        if(ask == 0){
                valid = 1;
        }else{
                valid = (confirm("Insert this row now?")) ? 1 : 0;
        }
        if(valid == 1){
            var row = $(this).parent().parent();
            $.ajax({
                url : "<?php echo base_url();?>index.php/faculty/new_faculty",
                method: "POST",
                cache: false,
                data:{
                    emp_no : $(row).children("td").eq(0).text(),
                    fname : $(row).children("td").eq(1).text(),
                    mname : $(row).children("td").eq(2).text(),
                    lname : $(row).children("td").eq(3).text(),
                    dob : $(row).children("td").eq(4).text(),
                    sex : $(row).children("td").eq(5).children("select").val(),
                    tin : $(row).children("td").eq(6).text(),
                    sss : $(row).children("td").eq(7).text(),
                    date_hired : $(row).children("td").eq(8).text(),
                    tenure : $(row).children("td").eq(9).children("select").val(),
                    dept : $(row).children("td").eq(10).children("select").val(),
                    type : "ajax"
                },
                success: function(data){
                    console.log(data);
                    if(data == "1"){
                          var prog = '<div class="progress  active"><div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 0%"><span class="sr-only"><span class="perper">0</span>% Complete</span></div></div>';
                          row.html("<td colspan='12'>"+prog+"</td>");
                          var move_progress = setInterval(function(){
                              $(".progress-bar").css("width", "+=1%");
                              var progress_width = $(".progress-bar").prop('style')['width'];
                              if(parseInt(progress_width) > 99 ){
                                  clearInterval(move_progress);
                              }
                          }, 1);
                    }else{
                          row.addClass("danger");
                    }
                }
            });
        }
    });

    $(".bg-purple").on("click", function(){
        if(confirm("Are you sure you want to insert ALL?")){
            ask = 0;
            triggerClick(0);
        }
    });
});
function triggerClick(i)
{
    setTimeout(function () {
        $(".btn-primary:eq( "+i+" )").click();
        if(i < $(".btn-primary").length){
            triggerClick(i);
        }else{
            ask = 1;
            alert("Done!");
        }
    }, 1000);
}
</script>
