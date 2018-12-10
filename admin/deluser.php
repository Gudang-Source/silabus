<?php
include '../config.php';
$var=$_GET['iduser'];
mysql_query("DELETE from tbuser WHERE iduser='$var'");

header('location:userman.php');