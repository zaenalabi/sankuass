<!DOCTYPE html>
<html>
<head>
    <title>Jadwal UAS</title>
</head>
<body>

 <!-- ?php date_default_timezone_set('Asia/jakarta');
$time = time();
echo date(' H:i:s', $time); ?> -->
<!-- <p>sedang berlangsung ujian (time) </p> -->

<div class="box">
    <div class="box-header">
        <div class="col-md-11">
            <h3>Jadwal UAS</h3>
        </div>
        <div class="col-md-1 text-right">
            <a href="<?php echo base_url('admin/Home/create'); ?>" class="btn btn-sm btn-success" data-toggle='tooltip'
               data-placement='top' title='Tambah'><i class="fa fa-plus"></i></a>
        </div>
    </div>
    <?php $sik = date('H:i'); ?>
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
                foreach ($jadwaluas as $data => $value) {
                    echo "<tr>
                    
					<td>" . $value->kd_jadwal . "</td>
                    <td>" . $value->nama_prodi . "</td>
					<td>" . $value->nama_makul . "</td>
					
                    <td>" . date("d/m/Y", strtotime($value->tgl_keterlambatan)) . "</td>
                    <td>" . $value->waktu."</td>
					<td>" . $value->ruang . "</td>
					
					<td><a href='" . base_url("admin/Home/edit/" . $value->kd_jadwal) . "' class='btn btn-primary' data-toggle='tooltip' data-placement='top' title='Edit'><i class='fa fa-pencil'></i></a>
					
					<a href='" . base_url("admin/Home/delete/" . $value->kd_jadwal) . "' class='btn btn-danger' data-toggle='tooltip' data-placement='top' title='Hapus'><i class='fa fa-trash'></i></a></td>
					</tr>";
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