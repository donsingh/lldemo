<!-- Main Footer -->
<footer class="main-footer">
  <!-- To the right -->
  <div class="pull-right hidden-xs">
    <strong><?php echo $footer_text;?></strong>
  </div>
  <!-- Default to the left -->
  <strong>The information contained here is confidential. Absolutely no screenshots are allowed!</strong>
</footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.2.3 -->
<script src="<?php echo base_url('assets/plugins/jQuery/jquery-2.2.3.min.js');?>"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/js/app.min.js');?>"></script>
</body>
</html>
<script>
$(document).ready(function(){
    $(".sidebar-menu>li").each(function(a,b){
        if(a == <?php echo $menu_index;?>){
            $(b).addClass("active");
        }
    });
});
</script>
