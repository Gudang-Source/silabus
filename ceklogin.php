<body>
<script src="dist/sweetalert2.all.min.js"></script>
<?php
include"config.php";
$username = $_POST['username'];
$password = str_rot13($_POST['password']);
$captcha = $_POST['g-recaptcha-response'];
$secret_key = '6LejDYIUAAAAAAKliQWOIWE2jtPGlVpdYGKFDtKN';
if(!isset($password)||!isset($username)){
	
	?>
	<script language="javascript">
		setTimeout(function() {
			swal({
				title: "Login Gagal!",
				text: "Username atau Password salah!",
				type: "error"
			}).then(function() {
				window.location = "login.html";
			});
		});
	</script>
	<?php

} else if(!isset($captcha)){
	?>
	<script language="javascript">
		setTimeout(function() {
			swal({
				title: "Login Gagal!",
				text: "Periksa kembali captcha!",
				type: "error"
			}).then(function() {
				window.location = "login.html";
			});
		});
	</script>
	<?php
} else {
	$ceklogin = mysql_query("SELECT * from tbuser where username='$username' and password='$password'");

	$url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . urlencode($secret_key) . '&response=' . $captcha;
	$recaptcha = file_get_contents($url);
	$recaptcha = json_decode($recaptcha, true);
	$data = mysql_fetch_array($ceklogin);
	$namapengguna = $data['username'];
	$nama = $data['nama'];
	$otoritas = $data['otoritas'];
	$ni = $data['ni'];
	$iduser = $data['iduser'];

	if ($otoritas == 1 && $recaptcha['success']){
		session_start();
		$_SESSION['iduser'] = $iduser;
		$_SESSION['username'] = $namapengguna;
		$_SESSION['nama'] = $nama;
		$_SESSION['otoritas'] = $otoritas;
		//header("location:admin/");
		?>
		
		<script language="javascript">
			setTimeout(function() {
				swal({
					title: "Login Sukses!",
					text: "Selamat datang <?php echo $_SESSION['nama']; ?>",
					type: "success"
				}).then(function() {
					window.location = "admin/";
				});
			});
		</script>
		<?php

	}
	else if ($otoritas== 2 && $recaptcha['success']){
		session_start();
		$_SESSION['iduser'] = $iduser;
		$_SESSION['username'] = $namapengguna;
		$_SESSION['nama'] = $nama;
		$_SESSION['ni'] = $ni;
		$_SESSION['otoritas'] = $otoritas;
		//header("location:user/");
		?>
		
		<script language="javascript">
			setTimeout(function() {
				swal({
					title: "Login Sukses!",
					text: "Selamat datang <?php echo $_SESSION['nama']; ?>",
					type: "success"
				}).then(function() {
					window.location = "user/";
				});
			});
		</script>
		<?php	
	}
	else {
		?>
		
		<script language="javascript">
			setTimeout(function() {
				swal({
					title: "Login Gagal!",
					text: "Username atau Password salah!",
					type: "error"
				}).then(function() {
					window.location = "login.html";
				});
			});
		</script>
		<?php
	}
}
?>
</body>