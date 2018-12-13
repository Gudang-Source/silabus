<?php
include '../config.php';
$nama = $_POST['nama'];
$username = $_POST['username'];
$password = $_POST['password'];
$ni = $_POST['ni'];
$otoritas = $_POST['otoritas'];
$iduser = $_GET['iduser'];
$xpassword = str_rot13($password);
mysql_query("UPDATE tbuser SET username='$username', nama='$nama', password='$xpassword', ni='$ni', otoritas='$otoritas' WHERE iduser='$iduser'");