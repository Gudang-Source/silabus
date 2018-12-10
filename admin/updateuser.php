<?php
include '../config.php';
$nama = $_POST['nama'];
$username = $_POST['username'];
$password = $_POST['password'];
$ni = $_POST['ni'];
$otoritas = $_POST['otoritas'];
$iduser = $_GET['iduser'];

mysql_query("UPDATE tbuser SET username='$username', nama='$nama', password='$password', ni='$ni', otoritas='$otoritas' WHERE iduser='$iduser'");