<html>
	<head>
		<title>Form Ubah - CRUD Codeigniter</title>
	</head>
	<body>
		
		<hr>

		<!-- Menampilkan Error jika validasi tidak valid -->
		<div style="color: red;"><?php echo validation_errors(); ?></div>
    <div class="row">
    <div class="col-sm-6 col-sm-offset-3">
        <div class="panel panel-primary">
            <div class="panel-heading with-border">
                <h3 class="panel-title">Form Ubah Tugas</h3>
            </div>
		
            <!-- /.box-header -->
            <!-- form start -->
            <?php echo form_open("admin/Tugas/edit/" .$tugas->kd_tugas); ?>
            <!-- <form class="form-horizontal"> -->
            <div class="panel-body form-horizontal">
              <div class="form-group">
                  <label class="col-sm-2 control-label">Kd Tugas</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="input_kd_tugas" value="<?php echo set_value('input_kd_tugas', $tugas->kd_tugas); ?>" >
                  </div>
                </div>

               
<!--               <input type="hidden" class="form-control" name="input_kd_keterlambatan" value="<?php echo set_value('input_kd_keterlambatan', $tugas->kd_keterlambatan); ?>">
              <input type="hidden" class="form-control" name="input_user_id" value="<?php echo set_value('input_user_id', $tugas->user_id); ?>">
 -->
                  
                    <!-- <input type="hidden" class="form-control" name="input_user_id" value="<?php echo set_value('input_user_id', $keterlambatan->user_id); ?>"> -->
                  
                
              
                <!-- <div class="form-group" >
                  <label for="inputEmail3" class="col-sm-2 control-label">nim</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="input_id_login" value="<?php echo set_value('input_id_login', $tbl_user->id_login); ?>">
                  </div>
                </div> -->

                <div class="form-group" >
                  <label for="inputEmail3" class="col-sm-2 control-label">kd_makul</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="input_kd_makul" value="<?php echo set_value('input_kd_makul', $tugas->kd_makul); ?>">
                  </div>
                </div>

                <div class="form-group" >
                  <label for="inputEmail3" class="col-sm-2 control-label">Tgl Keterlambatan</label>

                  <div  class="col-sm-10">
                    <input type="date" class="form-control" name="input_tgl_keterlambatan" value="<?php echo set_value('input_tgl_keterlambatan', $tugas->tgl_keterlambatan); ?>">
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Tgl Tugas</label>

                  <div class="col-sm-10">
                    <input type="date" class="form-control" name="input_tgl_tugas" value="<?php echo set_value('input_tgl_tugas',  $tugas->tgl_tugas ); ?>">
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Tema</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="input_tema" value="<?php echo set_value('input_tema',  $tugas->tema ); ?>">
                  </div>
                </div>
                
            </div>
            <!-- body akhir -->
              <div class="panel-footer">
                <div class="text-center">
                    <input type="submit" class="btn btn-primary" name="submit" value="Simpan"></input>
                    <a href="<?php echo base_url("admin/tugas/index"); ?>"><input class="btn btn-default" type="button" value="Batal"></input></a>
                </div>
              </div>
              <!-- /.box-footer -->
            <?php echo form_close(); ?>
          </div>
		
	</body>
</html>
