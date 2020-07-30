<!DOCTYPE html>
<html>

<head>
    <title>
        <?php echo $title ?>
    </title>
    <link href='<?php echo base_url("assets/upload/images/$favicon"); ?>' rel='shortcut icon' type='image/x-icon'/>
    <!-- meta -->
    <?php require_once('_meta.php'); ?>

    <!-- css -->
    <?php require_once('_css.php'); ?>
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <!-- jQuery 2.2.3 -->
    <script src="<?php echo base_url('assets'); ?>/vendor/jquery/jquery.min.js"></script>
</head>

<body class="hold-transition skin-blue fixed sidebar-mini" onload="startTime()">
<div class="wrapper">
    <!-- header -->
    <?php require_once('_header.php'); ?>
    <!-- sidebar -->
    <?php require_once('_sidebar.php'); ?>
    <!-- content -->
    <div class="content-wrapper">
        <!-- Main content -->
        <!-- <section class="content-header">
        <h1>
          Dashboard
          <small></small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Top Navigation</li>
        </ol>
      </section> -->

        <section class="content">
        <div><h4></h4></div>
            <!-- <h4 id="rtlTimeClock"></h4> -->
            <?php echo $contents; ?>
        </section>
        <div class="modal fade" id="ModalMe" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
             aria-hidden="true" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" id="ModalClose" class="close" data-dismiss="modal" aria-label="Close"><i
                                    class='fa fa-times'></i>
                        </button>
                        <h4 class="modal-title" id="ModalHeader"></h4>
                    </div>
                    <div class="modal-body" id="ModalContent"></div>
                    <div class="modal-footer" id="ModalFooter"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- footer -->
    <?php require_once('_footer.php'); ?>

    <div class="control-sidebar-bg"></div>
</div>
<!-- js -->
<?php require_once('_js.php'); ?>
</body>

</html>
