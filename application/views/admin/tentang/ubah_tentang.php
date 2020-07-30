<html>
<head>
    <title>Form Ubah - CRUD Codeigniter</title>
</head>
<body>

<!-- Menampilkan Error jika validasi tidak valid -->
<div style="color: red;"><?php echo validation_errors(); ?></div>
<div class="row">
    <div class="col-sm-8 col-sm-offset-2">
        <div class="panel panel-primary">
            <div class="panel-heading with-border">
                <h3 class="panel-title">Form Ubah Tentang</h3>
            </div>
            <?php echo form_open("admin/Tentang/edit/". $tentang->id); ?>
            <!-- <form class="form-horizontal"> -->
            <div class="panel-body form-horizontal">
                <div class="form-group">
                    <label>Judul</label>
                    <input type="text" name="input_judul" class="form" 
                    value="<?php echo set_value('input_judul', $tentang->judul); ?>">
                </div>
                                        
                <div class="form-group">
                    <label >Konten</label>
                    <textarea name="input_konten" id="summernote"><?php echo $tentang->konten ?></textarea>
               </div>
                                          
            </div>
            
            

            <!-- /.panel-body -->
            <div class="panel-footer">
                <div class="text-center">
                    <input type="submit" class="btn btn-primary" name="submit" value="simpan"></input>
                    <a href="<?php echo base_url("admin/Tentang"); ?>">
                        <input class="btn btn-default" type="button" value="Batal"></input></a>
                </div>
            </div>
            <!-- /.panel-footer -->
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
</body>
</html>





                                        