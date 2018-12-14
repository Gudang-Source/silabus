  <?php
include "../config.php";
session_start();
$lab = $_POST['gedung'];
$tanggal = $_POST['tanggal'];
$idwaktu = $_POST['idwaktu'];
$idwaktu2 = $_POST['idwaktu2'];
$keterangan = $_POST['keterangan'];
$iduser = $_SESSION['iduser'];

$xtgl = date('Y-m-d', strtotime($tanggal));
$idhari = date('N', strtotime($xtgl));

$untukidlab=mysql_fetch_array(mysql_query("SELECT idlab from tblab where lab='$lab'"));
$idlab = $untukidlab['idlab'];

$checker = [];
if($idwaktu>$idwaktu2){
  echo "Parameter salah! Mohon periksa kembali Waktu Mulai dan Waktu Akhir.";
} else {
  if(!empty($tanggal) && !empty($keterangan)){
    $z = $idwaktu2 - ($idwaktu-1);
    for($i=0; $i<$z; $i++){
      $xidwaktu = $idwaktu+$i;

      //$query0 = mysql_query("SELECT j.* FROM tbjadwal j, tbhari h, tblab l, tbuser u, tbwaktu w WHERE (j.idlab=l.idlab AND j.idwaktu=w.idwaktu AND j.idhari=h.idhari AND j.iduser=u.iduser AND j.idhari='$idhari' AND w.idwaktu='$xidwaktu' AND l.lab='$lab') OR (j.idlab=l.idlab AND j.idwaktu=w.idwaktu AND j.idhari=h.idhari AND j.iduser=u.iduser AND j.idhari='$idhari' AND w.idwaktu='$xidwaktu' AND l.lab='$lab' AND j.tanggal='$xtgl')");

      $query0 = mysql_query("SELECT j.* FROM tbjadwal j, tbhari h, tblab l, tbuser u, tbwaktu w WHERE (j.idlab=l.idlab AND j.idwaktu=w.idwaktu AND j.idhari=h.idhari AND j.iduser=u.iduser AND j.idhari='$idhari' AND w.idwaktu='$xidwaktu' AND l.lab='$lab' AND u.otoritas='1') OR (j.idlab=l.idlab AND j.idwaktu=w.idwaktu AND j.idhari=h.idhari AND j.iduser=u.iduser AND j.idhari='$idhari' AND w.idwaktu='$xidwaktu' AND l.lab='$lab' AND YEARWEEK(j.tanggal, 1)=YEARWEEK('$xtgl', 1))");

      $checker[$i] = mysql_num_rows($query0);

      if(in_array("1", $checker)){
        echo "<h1><b>Mohon maaf Lab sudah terpesan!</b></h1>";
        break;
      }

    }
    if(!in_array("1", $checker)){
      for($x=0; $x<$z; $x++){
        $yidwaktu = $idwaktu+$x;

       // $query1 = mysql_query("SELECT j.* FROM tbjadwal j, tbhari h, tblab l, tbuser u, tbwaktu w WHERE (j.idlab=l.idlab AND j.idwaktu=w.idwaktu AND j.idhari=h.idhari AND j.iduser=u.iduser AND j.idhari='$idhari' AND w.idwaktu='$yidwaktu' AND l.lab='$lab') OR (j.idlab=l.idlab AND j.idwaktu=w.idwaktu AND j.idhari=h.idhari AND j.iduser=u.iduser AND j.idhari='$idhari' AND w.idwaktu='$yidwaktu' AND l.lab='$lab' AND j.tanggal='$xtgl')");

        $query1 = mysql_query("SELECT j.* FROM tbjadwal j, tbhari h, tblab l, tbuser u, tbwaktu w WHERE (j.idlab=l.idlab AND j.idwaktu=w.idwaktu AND j.idhari=h.idhari AND j.iduser=u.iduser AND j.idhari='$idhari' AND w.idwaktu='$yidwaktu' AND l.lab='$lab' AND u.otoritas='1') OR (j.idlab=l.idlab AND j.idwaktu=w.idwaktu AND j.idhari=h.idhari AND j.iduser=u.iduser AND j.idhari='$idhari' AND w.idwaktu='$yidwaktu' AND l.lab='$lab' AND YEARWEEK(j.tanggal, 1)=YEARWEEK('$xtgl', 1))");


        mysql_query("INSERT into silabus.tbjadwal (idlab,idwaktu,idhari,iduser,tanggal,keterangan,status) values ('$idlab','$yidwaktu','$idhari','$iduser','$xtgl', '$keterangan','1')");
      }
      echo "<h1><b>Gedung Lab ".$lab." berhasil dipesan!</b></h1>";
    }

  }

  else {
    echo "Parameter salah! Mohon periksa kembali tanggal dan keterangan.";
  }
}
?>

