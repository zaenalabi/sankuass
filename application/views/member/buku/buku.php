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
                  <th style="width: 10px">id_buku</th>
                  <th>judul</th>
					<th>penulis</th>
					<th>tahun</th>
					<th>review</th>
					
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
					<td>".$value->penulis."</td>
					<td>".$value->tahun."</td>
					<td>".$value->review."</td>
					
					
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