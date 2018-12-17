<?php
mysql_connect("localhost", "root", "") or die("cannot connect" . mysql_error());
mysql_select_db("silabus") or die(mysql_error());
mysql_query("UPDATE tbjadwal SET status='2' WHERE tanggal < CURDATE()");
$token = "704087464:AAHb-7VBIg72wMO0062OJenKcUlqVXZUSok";
$user_id = "551488397";
?>