<?php
include "../config.php";
$lab = $_POST['gedung'];
$tanggal = $_POST['tanggal'];
$xtgl = date('Y-m-d', strtotime($tanggal));


if(!empty($tanggal)){
?>
                  <table id="example2" class="table table-bordered table-striped" style="align-items: center;">

                    <thead>
                      <tr>
                        <th rowspan="2" style="text-align: center;">JAM</th>
                        <th colspan="5" style="text-align: center;">HARI</th>
                      </tr>
                      <tr style="text-align: center;">
                        <td>SENIN</td>
                        <td>SELASA</td>
                        <td>RABU</td>
                        <td>KAMIS</td>
                        <td>JUMAT</td>
                      </tr>
                    </thead>
                    <tbody style="text-align: center;">

                      <?php
                      
                      $qw = mysql_query("SELECT * from tbwaktu");
                      $qh = mysql_query("SELECT * from tbhari");
                      $jw = mysql_num_rows($qw);
                      $jh = mysql_num_rows($qh);
                      $dw = mysql_fetch_array($qw);

                      for($x=1;$x<=$jw;$x++){
                        $query0 = mysql_query("SELECT waktu from tbwaktu t WHERE t.idwaktu='$x'");
                        $data0 = mysql_fetch_array($query0);
                        echo "<tr><td>".$data0['waktu']."</td>";
                        for($y=1;$y<=$jh;$y++){
                          $query = mysql_query("SELECT j.keterangan FROM tbjadwal j, tbhari h, tblab l, tbuser u, tbwaktu w WHERE j.idlab=l.idlab AND j.idwaktu=w.idwaktu AND j.idhari=h.idhari AND j.iduser=u.iduser AND l.lab='$lab' AND j.tanggal='$xtgl' AND w.idwaktu='$x' AND h.idhari='$y'");
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
                  
<?php } else {
  ?> <script type="text/javascript"> alert("Masukkan parameter pencarian!") </script> <?php
}
?>