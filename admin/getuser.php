<?php
include '../config.php';

$qry = mysql_query("SELECT * from tbuser");

if (mysql_num_rows($qry) > 0) {
	echo '<script src="../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
        <script src="../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css"></script>
        <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th style="text-align: center;" class="col-sm-1">Otoritas</th>
                  <th style="text-align: center;" >Username</th>
                  <th style="text-align: center;" >Nama</th>
                  <th style="text-align: center;" >Nomor Induk</th>
                  <th style="text-align: center;" class="col-sm-2">Aksi</th>
                </tr>
                </thead>
                <tbody>';
	while ($data = mysql_fetch_assoc($qry)) {
		$data['otoritas'] != 1 ? $otoritas="user" : $otoritas="admin";
		$data['otoritas'] != 1 ? $warna="warning" : $warna="primary";

		echo '	<tr>
				  <td style="text-align: center;" ><span class="label label-'.$warna.'">'.$otoritas.'</span></td>
                  <td>'.$data["username"].'</td>
                  <td>'.$data["nama"].'</td>
                  <td>'.$data["ni"].'</td>
                  <td style="text-align: center;">
	                  <button type="button" updatepass="'.str_rot13($data["password"]).'" updateid="updateuser.php?iduser='.$data["iduser"].'" updatenama="'.$data["nama"].'" updateusername="'.$data["username"].'" updateni="'.$data["ni"].'" updateotoritas="'.$data["otoritas"].'" class="fa fa-edit btn btn-warning updateButton" data-toggle="modal" data-target="#modal-default" style="height: 30px;" > Ubah</button>
	                  <span></span>
	                  <button type="button" class="fa fa-user-times btn btn-danger deleteButton" style="height: 30px;" onclick="window.location.href=`deluser.php?iduser='.$data["iduser"].'`"> Hapus</button>
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

