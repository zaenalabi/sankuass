<!-- JavaScript -->
<script src="<?php echo base_url('assets');?>/vendor/jquery/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url('assets');?>/vendor/bootstrap/js/bootstrap.min.js"></script> 
<!-- SlimScroll -->
<script src="<?php echo base_url('assets');?>/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url('assets');?>/vendor/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('assets');?>/vendor/AdminLTE-2.4.3/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url('assets');?>/vendor/AdminLTE-2.4.3/js/demo.js"></script>

<script src="<?php echo base_url('assets'); ?>/vendor/datepicker/js/bootstrap-datepicker.min.js"></script>
<script src="<?php echo base_url('assets'); ?>/vendor/datepicker/bootstrap-datepicker.js"></script>

<script src="<?php echo base_url('assets'); ?>/vendor/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url('assets'); ?>/vendor/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script >
    $(document).ready(function(){
        $('#table1').DataTable()
    })
</script>

<script>
    const CURRENT_URL=window.location.href.split("#")[0].split("?")[0];
  const $SIDEBAR_MENU = $("#my-sidebar-menu");

  $SIDEBAR_MENU.find('a[href="' + CURRENT_URL + '"]').parent("li").addClass("active"); 
</script>
