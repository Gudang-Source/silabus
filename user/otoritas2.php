<?php
if(!isset($_SESSION)) 
{ 
        session_start(); 
}
if($_SESSION['otoritas']!=2){
	if(!isset($_SESSION['otoritas'])) {
		header("location:../login.html");
	} else {
	header("location:../index.php");
	}
}
?>

