<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<html>
	<head>
		<title>Form Tambah - CRUD Codeigniter</title>
	</head>
	<body>
		
		<hr>

		<!-- Menampilkan Error jika validasi tidak valid -->
		<div style="color: red;"><?php echo validation_errors(); ?></div>
    <div class="row">
    <div class="col-sm-6 col-sm-offset-3">
        <div class="panel panel-primary">
            <div class="panel-heading with-border">
                <h3 class="panel-title">Form Tambah Tugas</h3>
            </div>
		
            <!-- /.box-header -->
            <!-- form start -->
            <?php echo form_open("admin/Tugas/create"); ?>
            <!-- <form class="form-horizontal"> -->
              <div class="panel-body form-horizontal">

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Tema</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="input_tema" value="<?php echo set_value('input_tema'); ?>">
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Ketentuan</label>

                  <div class="col-sm-10">
                    <textarea name="input_ketentuan" class="form-control" value="<?php echo set_value('input_ketentuan'); ?>"></textarea>
                  </div>
                </div>
                                               
              </div>
              <!-- /.box-body -->
              
              <div class="panel-footer">
                <div class="text-center">
                    <input type="submit" class="btn btn-primary" name="submit" value="Simpan">
                    <a href="<?php echo base_url("admin/Tugas"); ?>"><input type="button" class="btn btn-default"
                                                                           value="Batal"></a>
                </div>
            </div>
              <!-- /.box-footer -->
            <?php echo form_close(); ?>
          </div>
          </div>
          </div>


	</body>
</html>
