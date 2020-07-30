<!-- JavaScript -->
<script src="<?php echo base_url('assets'); ?>/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo base_url('assets'); ?>/vendor/iCheck/icheck.min.js"></script>
<script src="<?php echo base_url('assets'); ?>/vendor/AdminLTE-2.4.3/js/adminlte.min.js"></script>
<script src="<?php echo base_url('assets'); ?>/vendor/ckeditor/ckeditor.js"></script>
<script src="<?php echo base_url('assets'); ?>/vendor/jquery/jquery.min.js"></script>
<script src="<?php echo base_url('assets'); ?>/vendor/tinymce/tinymce.min.js"></script>
<script src="<?php echo base_url('assets'); ?>/vendor/datepicker/js/bootstrap-datepicker.min.js"></script>
<script src="<?php echo base_url('assets'); ?>/vendor/datepicker/bootstrap-datepicker.js"></script>


<!-- < script src="<?php echo base_url('assets'); ?>/vendor/jquery/jquery.min.js"></script> -->

<script src="<?php echo base_url('assets'); ?>/vendor/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url('assets'); ?>/vendor/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script >
    $(document).ready(function(){
        $('#table1').DataTable()
    })
</script>

<script>tinymce.init({selector:'textarea'});</script>
<script>
    const CURRENT_URL=window.location.href.split("#")[0].split("?")[0];
  const $SIDEBAR_MENU = $("#my-sidebar-menu");

  $SIDEBAR_MENU.find('a[href="' + CURRENT_URL + '"]').parent("li").addClass("active"); 
</script>
<script>
    $('#ModalMe').on('hide.bs.modal', function () {
        setTimeout(function () {
            $('#ModalHeader, #ModalContent, #ModalFooter').html('');
        }, 500);
    });
    // Initialize tooltip component
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })

    // Initialize popover component
    $(function () {
        $('[data-toggle="popover"]').popover()
    })

    function startTime() {
        var today = new Date();
        var h = today.getHours();
        var m = today.getMinutes();
        var s = today.getSeconds();
        m = checkTime(m);
        s = checkTime(s);
        document.getElementById('rtlTimeClock').innerHTML =
            h + ":" + m + ":" + s;
        var t = setTimeout(startTime, 500);
    }

    function checkTime(i) {
        if (i < 10) {
            i = "0" + i
        }
        ;  // add zero in front of numbers < 10
        return i;
    }
</script>