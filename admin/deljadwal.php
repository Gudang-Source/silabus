<?php
include '../config.php';
include 'otoritas1.php';

$iduser=$_GET['iduser'];
$idlab=$_GET['idlab'];
$idwaktu=$_GET['idwaktu'];
$idhari=$_GET['idhari'];
$keterangan=$_GET['keterangan'];
$status=$_GET['keterangan'];
$tanggal=$_GET['tanggal'];

if($tanggal=="Jadwal Tetap"){
	//mysql_query("DELETE from tbjadwal WHERE iduser='$iduser' and idhari='$idhari' and idwaktu='$idwaktu' and idlab='$idlab' and keterangan='$keterangan' and status='$status' and tanggal is NULL");
	mysql_query("UPDATE tbjadwal SET status='2' WHERE idlab='$idlab' AND idwaktu='$idwaktu' AND idhari='$idhari' AND iduser='$iduser' AND keterangan='$keterangan' AND tanggal is NULL");
} if($tanggal!="Jadwal Tetap"){
	//mysql_query("DELETE from tbjadwal WHERE iduser='$iduser' and idhari='$idhari' and idwaktu='$idwaktu' and idlab='$idlab' and keterangan='$keterangan' and status='$status' and tanggal='$tanggal'");

	mysql_query("UPDATE tbjadwal SET status='2' WHERE idlab='$idlab' AND idwaktu='$idwaktu' AND idhari='$idhari' AND iduser='$iduser' AND keterangan='$keterangan' AND tanggal='$tanggal'");
} else {
	?>
	<script type="text/javascript">
		alert("Gagal merubah jadwal!");
	</script>
	<?php
}

header('location:userman.php');