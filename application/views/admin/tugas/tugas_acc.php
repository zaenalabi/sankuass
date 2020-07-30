<!DOCTYPE html>
<html>
<head>
	<title>Tugas</title>
</head>
<body>





    <div class="box">
    <div class="box-header">
        <div class="col-md-11">
            <h3>Data Tugas</h3>
        </div>
        <!-- <div class="col-md-1 text-right">
            <a href="<?php echo base_url('admin/Tugas/create'); ?>" 
            class="btn btn-sm btn-success" data-toggle='tooltip' data-placement='top' title='Tambah'><i class="fa fa-plus"></i></a>
        </div> -->
    </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered" id="table1">
              <thead>
                <tr>
                    <th>kd Tugas</th>
                    <th>NIM</th>
					<th>Nama Makul</th>
					<th>Tgl Telat</th>
					<th>Tgl Tugas</th>
					<th>Tema Buku</th>
                    <th>Judul Buku</th>
					<th>Acc</th>
                    <th>Aksi</th>
                    
                </tr>
                </thead>

                <tbody>
                <?php
			if( ! empty($tugas)){ // Jika data siswa tidak sama dengan kosong, artinya jika data siswa ada
				foreach($tugas as $data =>$value){
					echo "<tr>
					<td>".$value->kd_tugas."</td>
					<td>".$value->id_login."</td>
					<td>".$value->nama_makul."</td>
					<td>".$value->tgl_keterlambatan."</td>
					<td>".$value->tgl_tugas."</td>
					<td>".$value->tema."</td>
                    <td>".$value->judul."</td>";
                    if ($value->status==0){
                        echo "<td><a href='".base_url("admin/Tugas/editAcc/".$value->kd_tugas)."'>status menunggu</a></td>";
                    }else{
                        echo "<td><a href='".base_url("admin/Tugas/editAcc/".$value->kd_tugas)."'>tugas diterima</a></td>";
                    }
					
                    echo "<td>                  
                    <a href='".base_url("admin/Tugas/delete/".$value->kd_tugas)."' class='btn btn-danger'
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

           
          </div>
</body>
</html>