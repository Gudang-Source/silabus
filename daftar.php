<?php
include ("config.php");

$nama = $_POST['nama'];
$username = $_POST['username'];
$password = $_POST['password'];
$password2 = $_POST['password2'];
$ni = $_POST['ni'];


$qryuser = mysql_query("SELECT * from tbuser where (ni='$ni' and otoritas='2') OR (username='$username' and otoritas='2') ");
$qrymin = mysql_query("SELECT * from tbuser where (ni='$ni' and otoritas='1') OR (username='$username' and otoritas='1') ");
$datauser = mysql_fetch_array($qryuser);
$datamin = mysql_fetch_array($qrymin);
$useruser = $datauser['username'];
$usermin = $datamin['username'];
$niuser = $datauser['ni'];
$nimin = $datamin['ni'];
if($useruser==$username || $username==$usermin){
	?>
	<script language="javascript">
		alert('Username sudah digunakan user lain!');
		document.location.href="register.html";
	</script>
	<?php
} else if($nimin==$ni || $niuser==$ni){
	?>
	<script language="javascript">
		alert('Anda sudah memiliki akun! Silahkan login.');
		document.location.href="login.html";
	</script>
	<?php
} else if($password!=$password2){
	?>
	<script language="javascript">
		alert('Periksa kembali password anda!');
		document.location.href="register.html";
	</script>
	<?php
} else{
	$xpassword = str_rot13($password);
	mysql_query("INSERT into tbuser set username='$username', password='$xpassword', ni='$ni', nama='$nama', otoritas='2'");
	?>
	<script language="javascript">
		alert('Anda berhasil mendaftar, silahkan login!');
		document.location.href="login.html";
	</script>
	<?php
}
?>