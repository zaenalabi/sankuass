<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<html>
  <head>
    <title>Form Keterlambatan</title>
  </head>
  <body>
    <h1>Form Keterlambatan</h1>
    <hr>

    <!-- Menampilkan Error jika validasi tidak valid -->
    <div style="color: red;"><?php echo validation_errors(); ?></div>

      <div class="box box-info">
            <div class="box-header with-border">
              
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?php echo form_open("member/Keterlambatan/create");  ?>
            <!-- <form class="form-horizontal"> -->
              <div class="box-body">

                             
                <div class="form-group" >
                  <label for="inputEmail3" class="col-sm-2 control-label">NIM</label>

                  <div class="col-sm-10">
                    <input type="text"  name="input_mahasiswa_id" value="<?php echo set_value('input_mahasiswa_id'); ?>">
                  </div>
                </div>

                <div class="form-group" >
                  <label for="inputEmail3" class="col-sm-2 control-label">Nama</label>

                  <div  class="col-sm-10">
                    <input type="text" name="input_nama" value="<?php echo set_value('input_nama'); ?>">
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Makul</label>

                  <div class="col-sm-10">
                    <input type="text" name="input_kd_makul" value="<?php echo set_value('input_kd_makul'); ?>">
                    
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Tanggal</label>

                  <div class="col-sm-10">
                    <input type="date" name="input_date" value="<?php echo set_value('input_date'); ?>">
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Keterangan</label>

                  <div class="col-sm-10">
                    <input type="text" name="input_keterangan" value="<?php echo set_value('input_keterangan'); ?>">
                  </div>
                </div>

              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                

                <input type="submit" name="submit" value="Simpan">
      <a href="<?php echo base_url("member/Keterlambatan"); ?>"><input type="button" value="Batal"></a>
              </div>
              <!-- /.box-footer -->
            <?php echo form_close(); ?>
          </div>
      
  </body>
</html>