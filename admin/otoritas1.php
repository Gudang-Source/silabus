<?php
if(!isset($_SESSION)) 
{ 
        session_start(); 
}
if($_SESSION['otoritas']!=1){
	if(!isset($_SESSION['otoritas'])) {
		header("location:../login.html");
	} else {
	header("location:../user/index.php");
	}
}
?>
