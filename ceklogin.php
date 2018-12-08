<?php
include"config.php";
$username = $_POST['username'];
$password = $_POST['password'];
if($username==''){
	session_destroy();
	?>
	<script language="javascript">
		alert('Username atau Password salah!');
		document.location.href="login.html";
	</script>
	<?php
} else {
	$ceklogin = mysql_query("SELECT * from tbuser where username='$username' and password='$password'");

	$data = mysql_fetch_array($ceklogin);
	$namapengguna = $data['username'];
	$nama = $data['nama'];
	$otoritas = $data['otoritas'];
	$ni = $data['ni'];

	if ($otoritas == 1){
		session_start();
		$_SESSION['username'] = $namapengguna;
		$_SESSION['nama'] = $nama;
		$_SESSION['otoritas'] = $otoritas;
		header("location:admin/");
	}
	else if ($otoritas== 2){
		session_start();
		$_SESSION['username'] = $namapengguna;
		$_SESSION['nama'] = $nama;
		$_SESSION['ni'] = $ni;
		$_SESSION['otoritas'] = $otoritas;
		header("location:user/");	
	}
	else {
		session_destroy();
		?>
		<script language="javascript">
			alert('Username atau Password salah!');
			document.location.href="login.html";
		</script>
		<?php
	}
}
?>