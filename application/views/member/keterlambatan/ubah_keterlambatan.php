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
                <h3 class="panel-title">Form Keterlambatan</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?php echo form_open("member/Keterlambatan/edit/" .$jadwaluas->kd_jadwal); ?>
            <!-- <form class="form-horizontal"> -->
              <div class="panel-body form-horizontal">

                
              
                <div class="form-group" >
                  <label for="inputEmail3" class="col-sm-2 control-label">kd_jadwal</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="input_kd_jadwal" value="<?php echo set_value('input_kd_jadwal', $jadwaluas->kd_jadwal); ?>" readonly>
                  </div>
                </div>

                <div class="form-group" >
                  <label for="inputEmail3" class="col-sm-2 control-label">nim</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="input_id_login" value="<?php echo set_value('input_id_login', $tbl_user->id_login); ?>" readonly>
                  </div>
                </div>

                <div class="form-group" >
                  <label for="inputEmail3" class="col-sm-2 control-label">nama</label>

                  <div  class="col-sm-10">
                    <input type="text" class="form-control" name="input_nama" value="<?php echo set_value('input_nama', $tbl_user->first_name.' '.$tbl_user->last_name); ?>" readonly>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">makul</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="input_kd_makul" value="<?php echo set_value('input_kd_makul', $jadwaluas->kd_makul); ?>" readonly>
                  </div>
                </div>

                <div class="form-group" class="input-group date" data-provide="datepicker">
                    <label  class="col-sm-2 control-label">Tanggal</label>

                    <div class="col-sm-10" >
                        <input type="text" class="form-control datepicker"  name="input_tgl_keterlambatan"
                               value="<?php echo set_value('input_tgl_keterlambatan', date("m/d/Y", strtotime($jadwaluas->tgl_keterlambatan))); ?>" readonly>

                    </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">keterangan</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="input_keterangan" value="<?php echo set_value('input_keterangan'); ?>">
                  </div>
                </div>


                 
              

                

              </div>

              <!-- /.box-body -->
             
              <div class="panel-footer">
                <div class="text-center">
                    <input type="submit" class="btn btn-primary" name="submit" value="Simpan"></input>
                    <a href="<?php echo base_url("member/Home"); ?>">
                        <input class="btn btn-default" type="button" value="Batal"></input></a>
                </div>
            </div>
              <!-- /.box-footer -->
            <?php echo form_close(); ?>
          </div>
        </div>
      </div>
<script type="text/javascript">
 $(function(){
  $(".datepicker").datepicker({
      format: 'dd-mm-yyyy',
      autoclose: true,
      todayHighlight: true,
  });
 });
</script>
	</body>
</html>
