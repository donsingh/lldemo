<script src='<?php echo base_url('assets/plugins/datatables/jquery.dataTables.min.js');?>'></script>
<script src='<?php echo base_url('assets/plugins/datatables/dataTables.bootstrap.min.js');?>'></script>
<script>
$(document).ready(function(){
  $("#book").DataTable({
    "pageLength": 8
  });

  $(".add-record").on("click", function(){
      $(".book_modal").modal("show");
  });
  
  $("#book").on("click", ".btn-info", function(){
	var journal_id = $(this).attr("alt");
	// console.log(book_id);
	$.ajax({
		url: "<?php echo base_url();?>index.php/book/journal_details/",
		method: "POST",
		cache: false,
		data: { journal:journal_id},
		success: function(data){
			if(data==1){
				console.log(data);
				alert("Something is wrong! Contact Admin!");
			}else{
				data = JSON.parse(data);
				console.log(data);
				$(".data3").text(data[0]['title']);
				$(".data4").text(data[0]['journal_name']);
				$(".data4").text(data[0]['vol_no']);
				$(".data4").text(data[0]['issue_no']);
				$(".data4").text(data[0]['page_no']);
				$(".data5").text(data[0]['year_published']);
				var d6 = (data[0]['role']=="m") ? "Main Author" : "Co-Author";
				$(".data6").text(d6);
				$(".data7").text(data[0]['publisher']);
				$(".data8").text(data[0]['publisher_place']);
				var d = (data[0]['pub_type']=="r") ? "Related" : "Non-Related";
				$(".data6").text(d6);
				$(".details_modal").modal("show");
			}
		}
	});
  });
});
</script>
