<!DOCTYPE html>
<html>
<head>
<!-- head -->

  <title>AdminLTE 2 | Top Navigation</title>
  <!-- Tell the browser to be responsive to screen width -->
<?php require_once('_meta.php') ;?>
<?php require_once('_css.php') ;?>
 <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  
</head>
<!-- /head -->

<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. (sebelah kiri)-->
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">
<?php require_once('_header.php') ;?>
 
  <!-- navbar selesai -->  
  
  <!-- Full Width Column (background tampilan) -->
  <div class="content-wrapper">
    <div class="container">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          
          <small></small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class=""></i>Tentang</a></li>
          <li><a href="#">Layout</a></li>
          <li class="active">Top Navigation</li>
        </ol>
      </section>
	  <!-- Background tampilan selesai -->
	  
	  
      <!-- Main content (isi) -->
      <section class="content">
        
        <?php echo $contents ;?>
        <!-- /.box -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.container -->
  </div>
  <!-- /.content-wrapper -->
    
  <!-- kaki-->
<?php require_once('_footer.php') ;?>
  <!-- kaki selesai -->
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<?php require_once('_js.php') ;?>
</body>
</html>
