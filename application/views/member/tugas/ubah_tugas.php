<html>
	<head>
		<title>Form Ubah - CRUD Codeigniter</title>
	</head>
	<body>
		<h1>Form Ubah Data Mahasiswa</h1>
		<hr>

		<!-- Menampilkan Error jika validasi tidak valid -->
		<div style="color: red;"><?php echo validation_errors(); ?></div>

		<div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Horizontal Form</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?php echo form_open("member/Tugas/edit/".$tugas->kd_tugas); ?>
            <!-- <form class="form-horizontal"> -->
              <div class="box-body">

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Kd_tugas</label>

                  <div class="col-sm-10">
                    <input type="text" name="input_kd_tugas" value="<?php echo set_value('input_kd_tugas', $tugas->kd_tugas); ?>" readonly>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">NIM</label>

                  <div class="col-sm-10">
                    <input type="text" name="input_mahasiswa_id" value="<?php echo set_value('input_mahasiswa_id'); ?>">
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">kd_makul</label>

                  <div class="col-sm-10">
                    <input type="text" name="input_kd_makul" value="<?php echo set_value('input_kd_makul'); ?>">
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Tanggal</label>

                  <div class="col-sm-10">
                    <input type="date" name="input_tanggal" value="<?php echo set_value('input_tanggal'); ?>">
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Judul_buku</label>

                  <div class="col-sm-10">
                    <input type="text" name="input_judul_buku" value="<?php echo set_value('input_judul_buku'); ?>">
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Review</label>

                  <div class="col-sm-10">
                    <input type="text" name="input_review" value="<?php echo set_value('input_review'); ?>">
                  </div>
                </div>

              <!-- /.box-body -->
              <div class="box-footer">
                <input type="submit" name="submit" value="Simpan">
      <a href="<?php echo base_url("member/Tugas"); ?>"><input type="button" value="Batal"></a>
              </div>
              <!-- /.box-footer -->
            <?php echo form_close(); ?>
          </div>
<!--  -->
		
	</body>
</html>
