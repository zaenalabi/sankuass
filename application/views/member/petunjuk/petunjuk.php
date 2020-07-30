<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
  
  <div class="box">
    <div class="box-header">
        <div class="col-md-11">
            <h3></h3>
        </div>
        
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        
            
            <?php
            if (!empty($petunjuk)) { // Jika data jadwaluas tidak sama dengan kosong, artinya jika data jadwaluas ada
                foreach ($petunjuk as $data => $value) {
                    echo "<tr>

          
          <td>".$value->judul."</td><br>
          <td>".$value->konten."</td>
          
          </tr>";
                }
            } else { // Jika data siswa kosong
                echo "<tr><td align='center' colspan='7'>Data Tidak Ada</td></tr>";
            }
            ?>
        
    </div>
</div>

