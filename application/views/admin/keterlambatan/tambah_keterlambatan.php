<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<html>
	<head>
		<title>Form Tambah</title>
	</head>
	<body>	
		<hr>

		<!-- Menampilkan Error jika validasi tidak valid -->
		<div style="color: red;"><?php echo validation_errors(); ?></div>
      <div class="row">
		  <div class="col-sm-6 col-sm-offset-3">
      <div class="panel panel-primary">
            <div class="panel-heading with-border">
              <h3 class="panel-title">Form Tambah Keterlambatan</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?php echo form_open("admin/Keterlambatan/create"); ?>
            <!-- <form class="form-horizontal"> -->
              <div class="panel-body form-horizontal">
             
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">NIM</label>

                    
                    <select name="input_user_id" class="form-control select" style="width: 80%;">
                     <option value="0">--pilih--</option>
                <?php foreach ($Tbl_user_model as $key=>$value) { ?>
                    <option value="<?php echo $value->user_id ?>"> <?php echo $value->id_login ?></option>
                <?php } ?>
                    </select>
                    
                </div>

                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Makul</label>

                    
                    <select name="input_kd_makul" class="form-control select" style="width: 80%;">
                     <option value="0">--pilih--</option>
                <?php foreach ($Makul_model as $key=>$value) { ?>
                    <option value="<?php echo $value->kd_makul ?>"> <?php echo $value->nama_makul ?></option>
                <?php } ?>
                    </select>
                    
                </div>

                <div class="form-group">
                    <label  class="col-sm-2 control-label">Tanggal</label>

                    <div class="col-sm-10" class >
                        <input type="text" class="form-control datepicker"  name="input_tgl_keterlambatan"
                               value="<?php echo set_value('input_tgl_keterlambatan'); ?>">

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
                    <input type="submit" class="btn btn-primary" name="submit" value="Simpan">
                    <a href="<?php echo base_url("admin/Keterlambatan"); ?>"><input type="button" class="btn btn-default"
                   value="Batal"></a>
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
