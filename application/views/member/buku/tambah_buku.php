<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<html>
	<head>
		<title>Form Tugas</title>
	</head>
	<body>
		<h1>Form Tugas</h1>
		<hr>

		<!-- Menampilkan Error jika validasi tidak valid -->
		<div style="color: red;"><?php echo validation_errors(); ?></div>
    

    

		  <div class="box box-info">
            
            <!-- /.box-header -->
            <!-- form start -->
            
            <!-- < ?php echo form_open("member/Buku/edit/" .$tugas->kd_tugas); ?> -->
            <form action="<?=base_url("member/Buku/edit/" .$tugas->kd_tugas) ?>" method="post" enctype="multipart/form-data">
            <!-- <form class="form-horizontal"> -->
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">kd tugas</label>

                  <div class="col-sm-10">
                    <input type="text" name="input_kd_tugas" value="<?php echo set_value('input_kd_tugas', $tugas->kd_tugas); ?>" readonly>
                  </div>
                </div>

                

                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Judul</label>

                  <div class="col-sm-10">
                    <input type="text" name="input_judul" value="<?php echo set_value('input_judul'); ?>">
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Review</label>

                  <div class="col-sm-10">
                    <input type="file" name="doc" class="form_control" value="<?php echo set_value('input_review'); ?>">
                  </div>
                </div>
                
                

                

              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <input type="submit" name="submit" value="Simpan">
      <a href="<?php echo base_url("member/Home"); ?>"><input type="button" value="Batal"></a>
              </div>
              <!-- /.box-footer -->
              </form>
            <!-- < ?php echo form_close(); ?> -->
          </div>

		<!-- batas awal -->
			
		
	</body>
</html>
