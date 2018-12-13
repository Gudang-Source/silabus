<?php
mysql_connect("localhost", "root", "") or die("cannot connect" . mysql_error());
mysql_select_db("silabus") or die(mysql_error());
mysql_query("UPDATE tbjadwal SET status='2' WHERE tanggal < CURDATE()");
?>