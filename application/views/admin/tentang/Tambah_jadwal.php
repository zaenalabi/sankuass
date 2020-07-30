<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<html>
	<head>
		<title>Form Tambah - CRUD Codeigniter</title>
	</head>
	<body>
		<h1>Form Tambah Data Mahasiswa</h1>
		<hr>

		<!-- Menampilkan Error jika validasi tidak valid -->
		<div style="color: red;"><?php echo validation_errors(); ?></div>

		<?php echo form_open("admin/Home/create"); ?>
			<table cellpadding="8">
				<tr>
					<td>NIS</td>
					<td><input type="text" name="input_nis" value="<?php echo set_value('input_nis'); ?>"></td>
				</tr>
				<tr>
					<td>Nama</td>
					<td><input type="text" name="input_nama" value="<?php echo set_value('input_nama'); ?>"></td>
				</tr>
				<tr>
					<td>Jenis Kelamin</td>
					<td>
					<input type="radio" name="input_jeniskelamin" value="Laki-laki" <?php echo set_radio('jeniskelamin', 'Laki-laki'); ?>> Laki-laki
					<input type="radio" name="input_jeniskelamin" value="Perempuan" <?php echo set_radio('jeniskelamin', 'Perempuan'); ?>> Perempuan
					</td>
				</tr>
				
			</table>
				
			<hr>
			<input type="submit" name="submit" value="Simpan">
			<a href="<?php echo base_url(); ?>"><input type="button" value="Batal"></a>
		<?php echo form_close(); ?>
	</body>
</html>
