<?php
include "../config.php";
$lab = $_POST['gedung'];
$tanggal = $_POST['tanggal'];
$idwaktu = $_POST['idwaktu'];
$xtgl = date('Y-m-d', strtotime($tanggal));
$idhari = date('N', strtotime($xtgl));
if(!empty($tanggal)){
  //$query0 = mysql_query("SELECT j.* FROM tbjadwal j, tbhari h, tblab l, tbuser u, tbwaktu w WHERE (j.idlab=l.idlab AND j.idwaktu=w.idwaktu AND j.idhari=h.idhari AND j.iduser=u.iduser AND j.idhari='$idhari' AND w.idwaktu='$idwaktu' AND l.lab='$lab') OR j.tanggal='$xtgl'");

  $query0 = mysql_query("SELECT j.* FROM tbjadwal j, tbhari h, tblab l, tbuser u, tbwaktu w WHERE (j.idlab=l.idlab AND j.idwaktu=w.idwaktu AND j.idhari=h.idhari AND j.iduser=u.iduser AND j.idhari='$idhari' AND w.idwaktu='$idwaktu' AND l.lab='$lab' AND j.iduser='1') OR (j.idlab=l.idlab AND j.idwaktu=w.idwaktu AND j.idhari=h.idhari AND j.iduser=u.iduser AND j.idhari='$idhari' AND w.idwaktu='$idwaktu' AND l.lab='$lab' AND YEARWEEK(j.tanggal, 1)=YEARWEEK('$xtgl', 1))");



  if(mysql_num_rows($query0)==0){
    echo "<h1><center><b>Jadwal tidak ditemukan</b></center></h1>";
  } else {
      $untukhari = mysql_fetch_array($query0);
      $idharinya = $untukhari['idhari'];
      $qh = mysql_query("SELECT hari from tbhari WHERE idhari='$idharinya'");
      $datahari = mysql_fetch_array($qh);
      $harinya = $datahari['hari'];
      ?>
                      <table id="example2" class="table table-bordered table-striped" style="align-items: center;">
                        <thead>
                          <tr>
                            <th rowspan="2" style="text-align: center;">JAM</th>
                          </tr>
                          <tr style="text-align: center;">
                            <td><?php echo $harinya; ?></td>
                          </tr>
                        </thead>
                        <tbody style="text-align: center;">

                          <?php
                          $jw = mysql_num_rows($query0);
                          $jh = mysql_num_rows($query0);
                          $dw = mysql_fetch_array($query0);

                          for($x=1;$x<=$jw;$x++){
                            $query1 = mysql_query("SELECT waktu from tbwaktu t WHERE t.idwaktu='$x'");
                            $data0 = mysql_fetch_array($query1);
                            echo "<tr><td>".$data0['waktu']."</td>";
                            for($y=1;$y<=$jh;$y++){
                              //$query = mysql_query("SELECT j.keterangan FROM tbjadwal j, tbhari h, tblab l, tbuser u, tbwaktu w WHERE j.idlab=l.idlab AND j.idwaktu=w.idwaktu AND j.idhari=h.idhari AND j.iduser=u.iduser AND l.lab='$lab' AND j.tanggal='$xtgl' AND w.idwaktu='$x' AND h.idhari='$y'");
                              $query = mysql_query("SELECT j.keterangan FROM tbjadwal j, tbhari h, tblab l, tbuser u, tbwaktu w WHERE (j.idlab=l.idlab AND j.idwaktu=w.idwaktu AND j.idhari=h.idhari AND j.iduser=u.iduser AND j.idhari='$idhari' AND w.idwaktu='$idwaktu' AND l.lab='$lab') OR j.tanggal='$xtgl'");
                              $datanya = mysql_fetch_array($query);
                              echo "<td>".$datanya['keterangan']."</td>";
                            }
                            echo "</tr>";
                          }
                          ?>
                        </tbody>
                      </table>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button>
                        <p>Jadwal gedung
                        <?php
                          echo $lab;
                        ?>
                        pada tanggal
                        <?php
                          echo date('d-M-Y', strtotime($tanggal));
                        ?>
                        </p>
                      </div>
                      
    <?php
  }
} else {
  echo "<h1><center><b></b>Harap periksa parameter pencarian!</b></center></h1>";
}