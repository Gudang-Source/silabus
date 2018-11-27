<?php

include ("../tables/config.php");
$username = $_POST['username'];
$password = $_POST['password'];

$query = mysql_query("SELECT otoritas from tbuser where username='$username' and password='$password'");
$ceklogin = mysql_fetch_array($query);
$prm = $ceklogin['otoritas'];
if ($prm == 1){
	echo "kamu admin";
}
if ($prm == 2){
	echo "bukan admin";
} else {
	?>
	<script language="javascript">
			alert('Username atau Password salah!');
			document.location.href="general.html";
	</script>	
	<?php
}
?>