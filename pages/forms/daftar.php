<?php
include ("../tables/config.php");

$nama = $_POST['nama'];
$username = $_POST['username'];
$password = $_POST['password'];
$password2 = $_POST['password2'];
$ni = $_POST['ni'];


$qryuser = mysql_query("SELECT * from tbuser where username='$username' and otoritas='2'");
$qrymin = mysql_query("SELECT * from tbuser where username='$username' and otoritas='1'");
$datauser = mysql_fetch_array($qryuser);
$datamin = mysql_fetch_array($qrymin);
$useruser = $datauser['username'];
$usermin = $datamin['username'];
if($useruser==$username || $username==$usermin){
	?>
	<script language="javascript">
		alert('Username sudah digunakan user lain!');
		document.location.href="general.html";
	</script>
	<?php
}
if($password!=$password2){
	?>
	<script language="javascript">
		alert('Periksa kembali password anda!');
		document.location.href="general.html";
	</script>
	<?php
}
else{
	mysql_query("INSERT into tbuser set username='$username', password='$password', ni='$ni', nama='$nama', otoritas='2'");
	?>
	<script language="javascript">
		alert('Anda berhasil mendaftar, silahkan login!');
		document.location.href="general.html";
	</script>
	<?php
}
?>