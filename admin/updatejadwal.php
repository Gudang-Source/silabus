<?php
include '../config.php';
include 'otoritas1.php';
$iduser = $_GET['iduser'];
$idlab = $_GET['idlab'];
$idhari = $_GET['idhari'];
$idwaktu = $_GET['idwaktu'];
$status = $_GET['status'];
$keterangan2 = $_GET['keterangan2'];
$tanggal = $_GET['tanggal'];

if($tanggal=="Jadwal Tetap"){
	mysql_query("UPDATE tbjadwal SET keterangan='$keterangan2' WHERE idlab='$idlab' AND idwaktu='$idwaktu' AND idhari='$idhari' AND iduser='$iduser' AND status='$status' AND tanggal is NULL");
} else if($tanggal!="Jadwal Tetap"){
	mysql_query("UPDATE tbjadwal SET keterangan='$keterangan2' WHERE idlab='$idlab' AND idwaktu='$idwaktu' AND idhari='$idhari' AND iduser='$iduser' AND tanggal='$tanggal' AND status='$status'");
} else {
	?>
	<script type="text/javascript">
		alert("Gagal merubah jadwal!");
	</script>
	<?php
}


//mysql_query("UPDATE tbuser SET username='$username', nama='$nama', password='$xpassword', ni='$ni', otoritas='$otoritas' WHERE iduser='$iduser'");

//UPDATE tbjadwal SET keterangan='Anwar Was Here' WHERE idlab='1' AND idwaktu='1' AND idhari='5' AND iduser='3' AND tanggal='2018-12-14' AND status='1'