<?php
include ("../config.php");

$nama = $_POST['nama'];
$username = $_POST['username'];
$password = $_POST['password'];
$password2 = $_POST['password2'];
$ni = $_POST['ni'];
$otoritas = $_POST['otoritas'];

$qry = mysql_query("SELECT * from tbuser where username='$username'");

if (mysql_num_rows($qry)>0){
	$data = mysql_fetch_array($qry);
	?>
		<script language="javascript">
			alert('Username sudah digunakan!');
			document.location.href="userman.php";
		</script>
	<?php
} else {
	if ($password!=$password2){
		?>
			<script language="javascript">
				alert('Password tidak valid!');
				document.location.href="userman.php";
			</script>
		<?php
	} else {
		mysql_query("INSERT into tbuser set username='$username', password='$password', ni='$ni', nama='$nama', otoritas='$otoritas'");
  		?>
			<script language="javascript">
				alert('User berhasil ditambahkan.');
				document.location.href="userman.php";
			</script>
		<?php
	}
}
?>