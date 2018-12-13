<?php
include '../config.php';
session_start();
$iduser = $_SESSION['iduser'];
//$qry = mysql_query("SELECT * from tbuser");
$qry = mysql_query("SELECT * from tbjadwal WHERE iduser='$iduser' ORDER BY tanggal DESC");

if (mysql_num_rows($qry) > 0) {
	echo '<script src="../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
        <script src="../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css"></script>
        <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th style="text-align: center;" class="col-sm-1">Status</th>
                  <th style="text-align: center;" class="col-sm-1">Gedung</th>
                  <th style="text-align: center;" >Keterangan</th>
                  <th style="text-align: center;" >Waktu</th>
                  <th style="text-align: center;" >Tanggal</th>
                </tr>
                </thead>
                <tbody>';
	while ($data = mysql_fetch_assoc($qry)) {
		$data['status'] != 1 ? $status="Expired" : $status="Active";
		$data['status'] != 1 ? $warna="danger" : $warna="success";

    $idwaktu = $data['idwaktu'];
    $idlab = $data['idlab'];
    $jadwal = mysql_fetch_array(mysql_query("SELECT waktu from tbwaktu WHERE idwaktu='$idwaktu'"));
    $lab = mysql_fetch_array(mysql_query("SELECT lab from tblab WHERE idlab='$idlab'"));

		echo '	<tr>
				  <td style="text-align: center;" ><span class="label label-'.$warna.'">'.$status.'</span></td>
                  <td style="text-align: center;" >'.$lab["lab"].'</td>
                  <td>'.$data["keterangan"].'</td>
                  <td style="text-align: center;" >'.$jadwal["waktu"].'</td>
                  <td style="text-align: center;" >'.$data["tanggal"].'</td>
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

} else {
  echo "<center><b>Anda tidak memiliki riwayat reservasi.</b></center>";
}

