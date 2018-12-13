<?php
include"config.php";
$username = $_POST['username'];
$password = $_POST['password'];
$passwordbaru = $_POST['passwordbaru'];
$passwordbaru2 = $_POST['passwordbaru2'];

	$cek = mysql_query("SELECT * from tbuser where username='$username' and password='$password'");
	$data = mysql_fetch_array($cek);
	
	$username = $data['username'];
	if ($username==$username){
		session_start();
		$_SESSION['username'] = $username;
		mysql_query("UPDATE tbuser set password='$passwordbaru',  where  username='$username'");
		echo "username=$username ";
		echo "<br>password=$password";
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
?>