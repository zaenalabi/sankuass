<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
  
  <div class="box">
    <div class="box-header">
        <div class="col-md-11">
            <h3>Jadwal UAS</h3>
        </div>
        
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        
            
            <?php
            if (!empty($tentang)) { // Jika data jadwaluas tidak sama dengan kosong, artinya jika data jadwaluas ada
                foreach ($tentang as $data => $value) {
                    echo "<tr>

          
          <td>".$value->judul."</td><br>
          <td>".$value->konten."</td>
          <td><a href='".base_url("admin/Tentang/edit/" .$value->id)."' class='btn btn-primary' 
        data-toggle='tooltip' data-placement='top' title='Edit'><i class='fa fa-pencil'></i>></a></td>
          </tr>";
                }
            } else { // Jika data siswa kosong
                echo "<tr><td align='center' colspan='7'>Data Tidak Ada</td></tr>";
            }
            ?>
        
    </div>
</div>


