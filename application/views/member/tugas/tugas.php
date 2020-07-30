<!DOCTYPE html>
<html>
<head>
	<title>Jadwal UAS</title>
</head>
<body>

<h3>Daftar Penerima Tugas</h3>
<div>

</div>

<div class="box">
<div class="box-body">
        <table class="table table-bordered" id="table1">
        <thead>
            <tr class="">
                <th style="width: 10px">Kd_tugas</th>
                
                <th>NIM</th>
                
                
                <th>Kd_Makul</th>
                
                <th>Tema</th>
                
                <th>Status tugas</th>
                <th>Aksi</th>
            </tr>
            </thead>

            <tbody>
            <?php
            if (!empty($tugas)) { // Jika data jadwaluas tidak sama dengan kosong, artinya jika data jadwaluas ada
                foreach ($tugas as $data => $value) {
                    echo "<tr>

          <td>" . $value->kd_tugas . "</td>
          
          <td>" . $value->id_login . "</td>
          
          <td>" . $value->nama_makul . "</td>
          <td>" . $value->tema . "</td>";
          if ($value->status==0){
                        echo "<td>status menunggu</td>";
                    }else{
                        echo "<td>tugas diterima</td>";
                    }
        if ($value->status==0){          
        echo "<td><a href='".base_url("member/Buku/edit/" .$value->kd_tugas)."'>ambil tugas</a></td>";
        }else{
            echo "<td><a href='".base_url("member/Tugas/index" )."'>ambil tugas</a></td>";
        }
          
          
          echo "</tr>";
                }
            } else { // Jika data siswa kosong
                echo "<tr><td align='center' colspan='7'>Data Tidak Ada</td></tr>";
            }
            ?>
            </tbody>
        </table>
    </div>

</div>
</body>
</html>

