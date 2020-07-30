<!DOCTYPE html>
<html>
<head>
	<title>Keterlambatan</title>
</head>
<body>



	<div class="box">
		<div class="box-header">
			<div class="col-md-11">
            <h3>Data Keterlambatan</h3>
        </div>
            <div class="col-md-1">
              <a href="<?php echo base_url('admin/Keterlambatan/create'); ?>"  class="btn btn-sm btn-success" data-toggle='tooltip' data-placement='top' title='Tambah'><i class="fa fa-plus"></i></a>
            </div>
           </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered" id="table1">
              <thead>
                <tr>
                  <th style="width: 10px">Kd_Terlambat</th>
                  
					<th>NIM</th>
					
					<th>Makul</th>
					<th>Tanggal</th>
					<th>Keterangan</th>
					<th>ACC</th>
					<th>Aksi</th>
					<th>Tugas</th>
                </tr>
              </thead>
              <tbody>
                <?php
			if( ! empty($keterlambatan)){ // Jika data jadwaluas tidak sama dengan kosong, artinya jika data jadwaluas ada
				foreach($keterlambatan as $data =>$value){ 
					echo "<tr>

					<td>".$value->kd_keterlambatan."</td>
					
					<td>".$value->id_login."</td>
					
					<td>".$value->nama_makul."</td>
					<td>" . date("d/m/Y", strtotime($value->tgl_keterlambatan)) . "</td>
					<td>".$value->keterangan."</td>";
					if ($value->status==0) {
						echo "<td><a href='".base_url("admin/Keterlambatan/editAcc/".$value->kd_keterlambatan)."'>Belum</a></td>";
					}else{
						echo "<td><a href='".base_url("admin/Keterlambatan/editAcc/".$value->kd_keterlambatan)."'>Terverifikasi</a></td>";
					}
					echo "<td><a href='".base_url("admin/Tugas/edite/".$value->kd_keterlambatan)."'>Buat Tugas</a></td>";

					// if ($value->status==0){
					// 	echo "Verifikasi Keterlambatan belum di ACC";
					// }
					// else{
					// echo "<td><a href='".base_url("admin/Tugas/edite/".$value->kd_keterlambatan)."'>Buat Tugas</a></td>";
					// }

		echo "<td><a href='".base_url("admin/Keterlambatan/edit/".$value->kd_keterlambatan)."' class='btn btn-primary' 
		data-toggle='tooltip' data-placement='top' title='Edit'><i class='fa fa-pencil'></i></a>
		<a href='".base_url("admin/Keterlambatan/delete/".$value->kd_keterlambatan)."'  class='btn btn-danger' 
		data-toggle='tooltip' data-placement='top' title='Hapus'><i class='fa fa-trash'></i></a></td>
		</tr>";

				}
			}else{ // Jika data siswa kosong
				echo "<tr><td align='center' colspan='7'>Data Tidak Ada</td></tr>";
			}
			?>
			</tbody>
			</table>
            </div>

            <!-- /.box-body -->
            
          </div>


</table>

</body>
<script type="text/javascript">
    $(document).on('click', '#hapusData', function (e) {
        e.preventDefault();
        var Link = $(this).attr('href');
        $('.modal-dialog').removeClass('modal-lg');
        $('.modal-dialog').addClass('modal-sm');
        $('#ModalHeader').html('Konfirmasi');
        $('#ModalContent').html('Apakah anda yakin ingin menghapus data ini ?');
        $('#ModalFooter').html("<a href='" + Link + "' class='btn btn-sm btn-primary'>Ya, saya yakin</a><button type='button' class='btn btn-sm btn-default' data-dismiss='modal'>Batal</button>");
        $('#ModalMe').modal('show');
    });
</script>
</html>
