<div class="login-box">
	
	<p class="login-box-msg text-bold">Selamat Datang <br>
di Sistem Keterlambatan UAS<br>
Fakultas Teknik & Ilmu Komputer</p>
		<!-- <a href="<?php echo base_url(); ?>"><b><?php echo $site['nama_website']; ?></b></a> -->
	
	<!-- /.login-logo -->
	<div class="login-box-body">
		<p class="login-box-msg text-bold">login</p>
		<form method="post" action="<?php echo base_url('auth/login'); ?>" role="login">
			<div class="form-group has-feedback">
				<input type="id_login" name="id_login" class="form-control" required minlength="5" placeholder="Username" />
				<span class="glyphicon  glyphicon-envelope form-control-feedback"></span>
			</div>
			<div class="form-group has-feedback">
				<input type="password" name="password" class="form-control" required minlength="5" placeholder="Password" />
				<span class="glyphicon glyphicon-lock form-control-feedback"></span>
			</div>

			<div class="row">
				<div class="checkbox icheck col-xs-12 col-sm-6 col-md-6">
					<!-- <label>
                        <?php echo form_checkbox('remember_code', '1', false, 'id="remember_code"'); ?>
                        Ingat Saya
                    </label> -->
				</div>
				<div class="col-xs-12 col-sm-6 col-md-6" style="padding-bottom: 5px">
					<button type="submit" name="submit" value="login" class="btn btn-primary btn-block btn-flat"><i class="fa fa-sign-in" aria-hidden="true"></i> Masuk</button>
				</div>
			</div>
			<a href="<?php echo base_url('auth/forgot_password'); ?>"> Lupa Kata Sandi?</a><br>
			<!-- <a href="<?php echo base_url('auth/register'); ?>"> Daftar Akun</a> -->
			
		</form>
		
	</div>
	<div id="myalert">
		<?php echo $this->session->flashdata('alert', true); ?>
	</div>
	<br>


<script>
	$(function() {
		$('input').iCheck({
			checkboxClass: 'icheckbox_square-blue',
			radioClass: 'iradio_square-blue',
			increaseArea: '20%' // optional
		});
	});
	$('#myalert').delay('slow').slideDown('slow').delay(4100).slideUp(600);
</script>
