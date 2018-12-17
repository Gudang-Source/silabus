<?php
mysql_connect("localhost", "root", "") or die("cannot connect" . mysql_error());
mysql_select_db("silabus") or die(mysql_error());
mysql_query("UPDATE tbjadwal SET status='2' WHERE tanggal < CURDATE()");
$token = "704087464:AAHb-7VBIg72wMO0062OJenKcUlqVXZUSok";
$user_id = "551488397";
function get_client_ip() {
    $ipaddress = '';
    if (isset($_SERVER['HTTP_CLIENT_IP']))
        {$ipaddress = $_SERVER['HTTP_CLIENT_IP'];}
    else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
        {$ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];}
    else if(isset($_SERVER['HTTP_X_FORWARDED']))
        {$ipaddress = $_SERVER['HTTP_X_FORWARDED'];}
    else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
        {$ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];}
    else if(isset($_SERVER['HTTP_FORWARDED']))
        {$ipaddress = $_SERVER['HTTP_FORWARDED'];}
    else if(isset($_SERVER['REMOTE_ADDR']))
        {$ipaddress = $_SERVER['REMOTE_ADDR'];}
    else
        {$ipaddress = 'UNKNOWN';}
    return $ipaddress;
}
?>