<!DOCTYPE html>
<html>
<head>
    <title>Jadwal UAS</title>
</head>
<body>

<?php date_default_timezone_set('Asia/jakarta');
// $time = time();
// echo date(' H:i:s', $time); ?>
<!-- <p>sedang berlangsung ujian (time) </p> -->
<div class="row">
    <div class="col-md-2">
        <h3>Jadwal UAS</h3>

    </div>
    <div class="col-md-10">
        <?php
        //;
        //$this->session->flashdata($keterlambatan->status);
        if (isset($keterlambatan->status)) {
            if ($keterlambatan->status > 0) { ?>
                <div class="alert alert-success" role="alert"><strong>OK!</strong> Kamu sudah boleh mengikuti UAS</div>
                <?php
            } else { ?>
                <div class="alert alert-warning" role="alert"><strong>Maaf!</strong> Kamu belum boleh mengikuti UAS
                </div>
                <?php
            }
        } else { ?>
            <div class="alert alert-warning" role="alert"><strong>Maaf!</strong> Kamu belum boleh mengikuti UAS
            </div>
            <?php
        } ?>
    </div>
</div>
<div class="box">

    <!-- /.box-header -->
    <div class="box-body">
        <table class="table table-bordered" id="table1">
            <thead>
            <tr>
                <th style="width: 10px">kd_jadwal</th>
                <th>Prodi</th>
                <th>Makul</th>
                <th>Tanggal</th>
                <th>Waktu</th>
                <th>Ruang</th>
                <th>Aksi</th>
            </tr>
            </thead>

            <tbody>
            <?php

            if (!empty($jadwaluas)) { // Jika data jadwaluas tidak sama dengan kosong, artinya jika data jadwaluas ada
                foreach ($jadwaluas as $data => $value) {// var_dump($value->waktu_mulai);
                    echo "<tr>

					<td>" . $value->kd_jadwal . "</td>
					<td>" . $value->nama_prodi . "</td>
					<td>" . $value->nama_makul . "</td>
					<td>" . date("d/m/Y", strtotime($value->tgl_keterlambatan)) . "</td>
                    <td>" . $value->waktu . "</td>					
					<td>" . $value->ruang . "</td>
                    <td><a href='" . base_url("member/Keterlambatan/edit/" . $value->kd_jadwal) . "'>Keterlambatan</a></td>
					
					
					</tr>";
                }
            } else { // Jika data siswa kosong
                echo "<tr><td align='center' colspan='7'>Data Tidak Ada</td></tr>";
            }
            ?>
            </tbody>
        </table>
    </div>

    <!-- /.box-body -->

</div>

</body>
</html>