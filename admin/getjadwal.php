<?php
include '../config.php';

//$qry = mysql_query("SELECT * from tbjadwal where status='1' order by iduser DESC");
$qry = mysql_query("SELECT j.*, u.username as username, u.ni as ni, u.otoritas as otoritas, u.nama as nama FROM tbjadwal j, tbhari h, tblab l, tbuser u, tbwaktu w WHERE j.idlab=l.idlab AND j.idwaktu=w.idwaktu AND j.idhari=h.idhari AND j.iduser=u.iduser AND j.status='1' order by iduser DESC");


if (mysql_num_rows($qry) > 0) {
	echo '<script src="../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
        <script src="../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css"></script>
        <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th style="text-align: center;" class="col-sm-1">Jenis</th>
                  <th style="text-align: center;" >Username</th>
                  <th style="text-align: center; class="col-sm-1" >Gedung</th>
                  <th style="text-align: center;" >Keterangan</th>
                  <th style="text-align: center; class=col-sm-1" >Hari</th>
                  <th style="text-align: center; class="col-sm-1" >Waktu</th>
                  <th style="text-align: center;" class="col-sm-1">Tanggal</th>
                  <th style="text-align: center;" class="col-sm-2">Aksi</th>
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
    $data['otoritas'] != 1 ? $jenis="reservasi" : $jenis="tetap";
    $data['otoritas'] != 1 ? $warna2="warning" : $warna2="info";

		echo '	<tr>
                  <td style="text-align: center;" ><span class="label label-'.$warna2.'">'.$jenis.'</span></td>
                  <td>'.$tbuser["username"].'</td>
                  <td style="text-align: center;">'.$tblab["lab"].'</td>
                  <td>'.$data["keterangan"].'</td>
                  <td style="text-align: center;">'.$tbhari['hari'].'</td>
                  <td style="text-align: center;">'.$tbwaktu["waktu"].'</td>
                  <td style="text-align: center;">'.$tanggal.'</td>


                  <td style="text-align: center;">
                    <button type="button" updateusername="'.$tbuser["username"].'" updatelab="'.$tblab["lab"].'" updatewaktu="'.$tbwaktu["waktu"].'" updatehari="'.$tbhari["hari"].'" updateketerangan="'.$data["keterangan"].'" updatestatus="'.$status.'" updatetanggal="'.$tanggal.'" updateid="updatejadwal.php?iduser='.$data["iduser"].'&idlab='.$data["idlab"].'&idwaktu='.$data["idwaktu"].'&idhari='.$data["idhari"].'&status='.$data["status"].'&keterangan='.$data["keterangan"].'&tanggal='.$tanggal.'" class="fa fa-edit btn btn-warning updateButton" data-toggle="modal" data-target="#modal-default" style="height: 30px;" > Ubah</button>
                    <span></span>
                    <button type="button" class="fa fa-user-times btn btn-danger deleteButton" style="height: 30px;" onclick="window.location.href=`deljadwal.php?iduser='.$iduser.'&idlab='.$idlab.'&idwaktu='.$idwaktu.'&idhari='.$idhari.'&keterangan='.$data["keterangan"].'&status='.$data["status"].'&tanggal='.$tanggal.'`"> Disable</button>
                  </td>


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

