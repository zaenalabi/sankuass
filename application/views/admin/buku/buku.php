<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<div class="box">
	<div class="box-body">
              <table class="table table-bordered" id="table1">
              <thead>
                <tr>
                  <th style="width: 10px">Id buku</th>
                  
					<th>Judul buku</th>
					<th>Review</th>
					<th>Lihat review</th>
					<th>Aksi</th>
					
					
					<!-- <th>Aksi</th> -->
                </tr>
                </thead>

                <tbody>
        <?php

			if( ! empty($buku)){ // Jika data jadwaluas tidak sama dengan kosong, artinya jika data jadwaluas ada
				foreach($buku as $data =>$value){ 
					echo "<tr>

					<td>".$value->id_buku."</td>
					
					<td>".$value->judul."</td>
					<td>".$value->review."</td>";
					
					echo "<td><a href='".base_url("admin/Buku/download/".$value->id_buku)."'>Download</a></td>";

					echo "<td>					
					<a href='".base_url("admin/Buku/delete/".$value->id_buku)."' class='btn btn-danger'
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