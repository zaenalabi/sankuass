<div class="register-box">
    <div class="register-logo">
        <a href="<?php echo base_url(); ?>"><b><?php echo $site['nama_website']; ?></b></a>
    </div>

    <div class="register-box-body">
        <font color="green">
            <?php echo $this->session->flashdata('pesan'); ?>
        </font>
        <p class="login-box-msg">Register a new membership</p>
        <?php echo form_open('auth/check_register', ''); ?>
        <div class="form-group has-feedback">
            <input type="text" name="id_login" class="form-control" required placeholder="id_login">
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
            <?php echo form_error('id_login', '<div class="text-danger"><small>', '</small></div>'); ?>
        </div>
        <div class="form-group has-feedback">
            <input type="text" name="first_name" class="form-control" required placeholder="nama depan">
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
            <?php echo form_error('first_name', '<div class="text-danger"><small>', '</small></div>'); ?>    
        </div>
        <div class="form-group has-feedback">
            <input type="text" name="last_name" class="form-control" required placeholder="nama belakang">
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
            <?php echo form_error('last_name', '<div class="text-danger"><small>', '</small></div>'); ?>    
        </div>
        <!-- <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">Nama Depan</label>
            <select name="input_kd_pengawasUas" class="form-control">
                <?php foreach ($Tbl_role_model as $key => $value) { ?>
                    <option value="<?php echo $value->id ?>"> <?php echo $value->name ?></option>
                <?php } ?>
            </select>
        <div class="col-sm-10">
                <input type="text" class="form-control" name="input_nama"
                value="<?php echo set_value('input_nama', $mahasiswa->nama); ?>">
        </div>
        <!-- <input type="text" name="input_prodi" value="<?php // echo set_value('input_prodi'); ?>"> 
            
        </div> -->
        <div class="form-group has-feedback">
            <input type="email" name="email" class="form-control" required placeholder="Email">
            <!-- <span class="glyphicon glyphicon-envelope form-control-feedback"></span> -->
            <?php echo form_error('email', '<div class="text-danger"><small>', '</small></div>'); ?>
        </div>
        <div class="form-group has-feedback">
            <input type="password" name="password" class="form-control" required placeholder="Password">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            <?php echo form_error('password', '<div class="text-danger"><small>', '</small></div>'); ?>
        </div>
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">Akun</label>
            <select name="input_kd_pengawasUas" class="form-control">
                <?php foreach ($Tbl_role_model as $key => $value) { ?>
                    <option value="<?php echo $value->id ?>"> <?php echo $value->name ?></option>
                <?php } ?>
            </select>
            <!-- <input type="text" name="input_prodi" value="<?php // echo set_value('input_prodi'); ?>"> -->
            
        </div>
        <!-- <select>
            
                   <option>1.Membe r</option>
                   <option>2.Dosen</option>
            
        </select> -->

        <div class="row">
            <div class="col-xs-4">
                <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
                <?php echo form_close(); ?>
            </div>
        </div>
        <a href="<?php echo base_url('auth/login'); ?>" class="text-center">I already have a membership</a>
    </div>
</div>