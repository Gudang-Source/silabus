  <?php
  include "../config.php";
  session_start();
  $lab = $_POST['gedung'];
  $idhari = $_POST['idhari'];
  $idwaktu = $_POST['idwaktu'];
  $idwaktu2 = $_POST['idwaktu2'];
  $keterangan = $_POST['keterangan'];
  $iduser = $_SESSION['iduser'];

  $untukidlab=mysql_fetch_array(mysql_query("SELECT idlab from tblab where lab='$lab'"));
  $idlab = $untukidlab['idlab'];
  $untukhari=mysql_fetch_array(mysql_query("SELECT * from tbhari where idhari='$idhari'"));
  $hari = $untukhari['hari'];

  if($keterangan==""){
    echo "Parameter salah! Mohon periksa kolom kembali keterangan.";
    echo "<script language='javascript'>Swal('Gagal', 'Parameter salah! Mohon periksa kolom kembali keterangan', 'error');</script>";
  } else {
    $checker = [];
    if($idwaktu>$idwaktu2){
      ?>
      <script language="javascript">Swal('Gagal', 'Mohon periksa kembali Waktu Mulai dan Waktu Akhir.', 'error');</script>
      <?php
      echo "Parameter salah! Mohon periksa kembali Waktu Mulai dan Waktu Akhir.";
    } else {
      if(!empty($idhari) || !empty($keterangan)){
        $z = $idwaktu2 - ($idwaktu-1);
        for($i=0; $i<$z; $i++){
          $xidwaktu = $idwaktu+$i;

      //$query0 = mysql_query("SELECT j.* FROM tbjadwal j, tbhari h, tblab l, tbuser u, tbwaktu w WHERE (j.idlab=l.idlab AND j.idwaktu=w.idwaktu AND j.idhari=h.idhari AND j.iduser=u.iduser AND j.idhari='$idhari' AND w.idwaktu='$xidwaktu' AND l.lab='$lab') OR (j.idlab=l.idlab AND j.idwaktu=w.idwaktu AND j.idhari=h.idhari AND j.iduser=u.iduser AND j.idhari='$idhari' AND w.idwaktu='$xidwaktu' AND l.lab='$lab' AND j.tanggal='$xtgl')");

          $query0 = mysql_query("SELECT j.* FROM tbjadwal j, tbhari h, tblab l, tbuser u, tbwaktu w WHERE (j.idlab=l.idlab AND j.idwaktu=w.idwaktu AND j.idhari=h.idhari AND j.iduser=u.iduser AND j.idhari='$idhari' AND w.idwaktu='$xidwaktu' AND l.lab='$lab' AND j.iduser='1') OR (j.idlab=l.idlab AND j.idwaktu=w.idwaktu AND j.idhari=h.idhari AND j.iduser=u.iduser AND j.idhari='$idhari' AND w.idwaktu='$xidwaktu' AND l.lab='$lab' AND YEARWEEK(j.tanggal, 1)=YEARWEEK(CURDATE(), 1))");

          $checker[$i] = mysql_num_rows($query0);

          if(in_array("1", $checker)){
            ?>
            <script language="javascript">Swal('Gagal', 'Lab sudah terpesan! Harap hapus jadwal terlebih dahulu.', 'warning');</script>
            <?php
            echo "<h1><b>Lab sudah terpesan! Harap hapus jadwal terlebih dahulu.</b></h1>";
            break;
          }

        }
        if(!in_array("1", $checker)){
          for($x=0; $x<$z; $x++){
            $yidwaktu = $idwaktu+$x;

       // $query1 = mysql_query("SELECT j.* FROM tbjadwal j, tbhari h, tblab l, tbuser u, tbwaktu w WHERE (j.idlab=l.idlab AND j.idwaktu=w.idwaktu AND j.idhari=h.idhari AND j.iduser=u.iduser AND j.idhari='$idhari' AND w.idwaktu='$yidwaktu' AND l.lab='$lab') OR (j.idlab=l.idlab AND j.idwaktu=w.idwaktu AND j.idhari=h.idhari AND j.iduser=u.iduser AND j.idhari='$idhari' AND w.idwaktu='$yidwaktu' AND l.lab='$lab' AND j.tanggal='$xtgl')");

            $query1 = mysql_query("SELECT j.* FROM tbjadwal j, tbhari h, tblab l, tbuser u, tbwaktu w WHERE (j.idlab=l.idlab AND j.idwaktu=w.idwaktu AND j.idhari=h.idhari AND j.iduser=u.iduser AND j.idhari='$idhari' AND w.idwaktu='$yidwaktu' AND l.lab='$lab' AND j.iduser='1') OR (j.idlab=l.idlab AND j.idwaktu=w.idwaktu AND j.idhari=h.idhari AND j.iduser=u.iduser AND j.idhari='$idhari' AND w.idwaktu='$yidwaktu' AND l.lab='$lab' AND YEARWEEK(j.tanggal, 1)=YEARWEEK(CURDATE(), 1))");


            mysql_query("INSERT into silabus.tbjadwal (idlab,idwaktu,idhari,iduser,tanggal,keterangan,status) values ('$idlab','$yidwaktu','$idhari','$iduser', NULL, '$keterangan','1')");

          }
          ?>
          <script language="javascript">Swal('Berhasil', 'Jadwal berhasil ditetapkan', 'success');</script>
          <?php
          echo "<h1><b>Jadwal Lab ".$lab." berhasil ditetapkan!</b></h1>";
        }

      }

      else {
        ?>
        <script language="javascript">Swal('Gagal', 'Parameter salah! Mohon periksa kolom kembali keterangan.', 'error');</script>
        <?php
        echo "Parameter salah! Mohon periksa kolom kembali keterangan.";
      }
    }
  }
  ?>