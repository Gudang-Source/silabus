<body>
<script src="dist/sweetalert2.all.min.js"></script>
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
$captcha = $_POST['g-recaptcha-response'];
$secret_key = '6LejDYIUAAAAAAKliQWOIWE2jtPGlVpdYGKFDtKN';

if(!isset($captcha)){
	?>
	<script language="javascript">
		setTimeout(function() {
			swal({
				title: "Registrasi Gagal",
				text: "Isi captcha dengan benar!",
				type: "error"
			}).then(function() {
				window.location = "register.html";
			});
		});
	</script>
	<?php
} else if($useruser==$username || $username==$usermin){
	?>
	
	<script language="javascript">
		setTimeout(function() {
			swal({
				title: "Registrasi Gagal",
				text: "Username sudah digunakan user lain!",
				type: "error"
			}).then(function() {
				window.location = "register.html";
			});
		});
	</script>
	<?php
} else if($nimin==$ni || $niuser==$ni){
	?>
	<script language="javascript">
		setTimeout(function() {
			swal({
				title: "Registrasi Gagal",
				text: "Anda sudah memiliki akun! Silahkan login.",
				type: "error"
			}).then(function() {
				window.location = "login.html";
			});
		});
	</script>
	<?php
} else if($password!=$password2){
	?>
	
	<script language="javascript">
		setTimeout(function() {
			swal({
				title: "Registrasi Gagal",
				text: "Periksa kembali password anda!",
				type: "error"
			}).then(function() {
				window.location = "register.html";
			});
		});
	</script>
	<?php
} else{
	$url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . urlencode($secret_key) . '&response=' . $captcha;   
	$recaptcha = file_get_contents($url);
	$recaptcha = json_decode($recaptcha, true);

	if(!$recaptcha['success']){
		?>
		<script language="javascript">
			setTimeout(function() {
				swal({
					title: "Registrasi Gagal",
					text: "Isi captcha dengan benar!",
					type: "error"
				}).then(function() {
					window.location = "register.html";
				});
			});
		</script>
		<?php
	} else {
		$xpassword = str_rot13($password);
		mysql_query("INSERT into tbuser set username='$username', password='$xpassword', ni='$ni', nama='$nama', otoritas='2'");
		?>
		<script language="javascript">
			setTimeout(function() {
				swal({
					title: "Registrasi Berhasil",
					text: "Anda berhasil mendaftar, silahkan login!",
					type: "success"
				}).then(function() {
					window.location = "login.html";
				});
			});
		</script>
		<?php
	}
}
?>