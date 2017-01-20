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
	var book_id = $(this).attr("alt");
	// console.log(book_id);
	$.ajax({
		url: "<?php echo base_url();?>index.php/book/book_details/",
		method: "POST",
		cache: false,
		data: { book:book_id},
		success: function(data){
			if(data==1){
				console.log(data);
				alert("Something is wrong! Contanct Admin!");
			}else{
				data = JSON.parse(data);
				console.log(data);
				$(".data1").text(data[0]['ISBN']);
				$(".data2").text(data[0]['chapter_title']);
				$(".data3").text(data[0]['title']);
				$(".data4").text(data[0]['author']);
				$(".data5").text(data[0]['year_published']);
				var d6 = (data[0]['role']=="m") ? "Main Author" : "Co-Author";
				$(".data6").text(d6);
				$(".data7").text(data[0]['publisher']);
				$(".data8").text(data[0]['publisher_place']);
				$(".details_modal").modal("show");
			}
		}
	});
  });
});
</script>
