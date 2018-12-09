<?php
include '../config.php';

$qry = mysql_query("SELECT * from tbuser");

if (mysql_num_rows($qry) > 0) {
	echo '<table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th style="text-align: center;" class="col-sm-1">Otoritas</th>
                  <th style="text-align: center;" >Username</th>
                  <th style="text-align: center;" >Nama</th>
                  <th style="text-align: center;" >Nomor Induk</th>
                  <th style="text-align: center;" class="col-sm-2">Action</th>
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
	                  <button type="button" class="fa fa-edit btn btn-warning" data-toggle="modal" data-target="#modal-default" style="height: 30px;"> Ubah</button>
	                  <span></span>
	                  <button type="button" class="fa fa-trash-o btn btn-danger" data-toggle="modal" data-target="#modal-default" style="height: 30px;"> Hapus</button>
                  </td>
                </tr>';
	}
	echo "		</tbody>
              </table>";

}

