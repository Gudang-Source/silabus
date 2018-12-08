<?php
mysql_connect("localhost", "root", "") or die("cannot connect" . mysql_error());
mysql_select_db("silabus") or die(mysql_error());
?>