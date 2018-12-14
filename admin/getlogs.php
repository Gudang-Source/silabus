<?php
include '../config.php';

$qry = mysql_query("SELECT * from tbjadwal where status='2' order by iduser DESC");


if (mysql_num_rows($qry) > 0) {
	echo '<script src="../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
        <script src="../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css"></script>
        <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th style="text-align: center;" class="col-sm-1">Status</th>
                  <th style="text-align: center;" class="col-sm-1">Jenis</th>
                  <th style="text-align: center;" >Username</th>
                  <th style="text-align: center; class="col-sm-1" >Gedung</th>
                  <th style="text-align: center;" >Keterangan</th>
                  <th style="text-align: center; class=col-sm-1" >Hari</th>
                  <th style="text-align: center; class="col-sm-1" >Waktu</th>
                  <th style="text-align: center;" class="col-sm-1">Tanggal</th>
                </tr>
                </thead>
                <tbody>';
	while ($data = mysql_fetch_assoc($qry)) {
    $idhari=$data['idhari']; $iduser=$data['iduser']; $idlab=$data['idlab']; $idwaktu=$data['idwaktu'];

    $tbuser = mysql_fetch_array(mysql_query("SELECT * from tbuser where iduser='$iduser'"));
    $tbhari = mysql_fetch_array(mysql_query("SELECT * from tbhari where idhari='$idhari'"));
    $tblab = mysql_fetch_array(mysql_query("SELECT * from tblab where idlab='$idlab'"));
    $tbwaktu = mysql_fetch_array(mysql_query("SELECT * from tbwaktu where idwaktu='$idwaktu'"));

    if(!isset($data['tanggal'])){
      $tanggal = "Jadwal Tetap";
    } else {
      $tanggal = $data['tanggal'];
    }

		$data['status'] != 1 ? $status="Expired" : $status="Aktif";
		$data['status'] != 1 ? $warna="danger" : $warna="success";
    $data['iduser'] != 1 ? $jenis="reservasi" : $jenis="tetap";
    $data['iduser'] != 1 ? $warna2="warning" : $warna2="info";

		echo '	<tr>
        				  <td style="text-align: center;" ><span class="label label-'.$warna.'">'.$status.'</span></td>
                  <td style="text-align: center;" ><span class="label label-'.$warna2.'">'.$jenis.'</span></td>
                  <td>'.$tbuser["username"].'</td>
                  <td style="text-align: center;">'.$tblab["lab"].'</td>
                  <td>'.$data["keterangan"].'</td>
                  <td style="text-align: center;">'.$tbhari['hari'].'</td>
                  <td style="text-align: center;">'.$tbwaktu["waktu"].'</td>
                  <td style="text-align: center;">'.$tanggal.'</td>


                </tr>';
	}
	echo "		</tbody>
              </table>
              <script>
                $(function () {
                  $('#example1').DataTable({
                    'paging'      : true,
                    'lengthChange': false,
                    'searching'   : true,
                    'ordering'    : true,
                    'info'        : true,
                    'autoWidth'   : false
                  })
                })
              </script>";

}

