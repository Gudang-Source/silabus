<?php
include "header.php";
include "otoritas1.php";
?>

<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
	  <li><a href="index.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
    </li>
      <li class="treeview active">
        <a href="#">
          <i class="fa fa-calendar"></i> <span>Jadwal</span>
          <span class="pull-right-container">
          </span>
        </a>
      </li>
    <li><a href="cari.php"><i class="fa fa-search"></i> <span>Cari Jadwal</span></a>
    </li>
    </ul>  
  </section>
  <!-- /.sidebar -->
</aside>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content-header">
      <h1>
        Dashboard
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Jadwal</li>
      </ol>
    </section>
<br>
  <!-- Main content -->

<div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_1" data-toggle="tab">F1</a></li>
              <li><a href="#tab_2" data-toggle="tab">F2</a></li>
              <li><a href="#tab_3" data-toggle="tab">F3</a></li>
              <li><a href="#tab_4" data-toggle="tab">G1</a></li>
              <li><a href="#tab_5" data-toggle="tab">G2</a></li>
              <li><a href="#tab_6" data-toggle="tab">G5</a></li>
              <li><a href="#tab_7" data-toggle="tab">L12</a></li>
              
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
                <!-- isi -->
                <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title"> Laboratorium F1</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="example2" class="table table-bordered table-striped">

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
                    $query = mysql_query("SELECT j.keterangan FROM tbjadwal j, tbhari h, tblab l, tbuser u, tbwaktu w WHERE j.idlab=l.idlab AND j.idwaktu=w.idwaktu AND j.idhari=h.idhari AND j.iduser=u.iduser AND l.lab='F1' AND w.idwaktu='$x' AND h.idhari='$y'");
                    $datanya = mysql_fetch_array($query);
                    echo "<td>".$datanya['keterangan']."</td>";
                  }
                  echo "</tr>";
                }
                ?>



              </tbody>
            </table>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->


      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_2">
                <!-- isi 2-->
                <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title"> Laboratorium F2</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="example2" class="table table-bordered table-striped">

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
                    $query = mysql_query("SELECT j.keterangan FROM tbjadwal j, tbhari h, tblab l, tbuser u, tbwaktu w WHERE j.idlab=l.idlab AND j.idwaktu=w.idwaktu AND j.idhari=h.idhari AND j.iduser=u.iduser AND l.lab='F2' AND w.idwaktu='$x' AND h.idhari='$y' and j.status='1'");
                    $datanya = mysql_fetch_array($query);
                    echo "<td>".$datanya['keterangan']."</td>";
                  }
                  echo "</tr>";
                }
                ?>



              </tbody>
            </table>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->


      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_3">
                <!-- isi 3-->
                  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title"> Laboratorium F3</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="example2" class="table table-bordered table-striped">

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
                    $query = mysql_query("SELECT j.keterangan FROM tbjadwal j, tbhari h, tblab l, tbuser u, tbwaktu w WHERE j.idlab=l.idlab AND j.idwaktu=w.idwaktu AND j.idhari=h.idhari AND j.iduser=u.iduser AND l.lab='F3' AND w.idwaktu='$x' AND h.idhari='$y'");
                    $datanya = mysql_fetch_array($query);
                    echo "<td>".$datanya['keterangan']."</td>";
                  }
                  echo "</tr>";
                }
                ?>



              </tbody>
            </table>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->


      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
              </div>
              <div class="tab-pane" id="tab_4">
                <!-- isi 4-->
                  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title"> Laboratorium G1</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="example2" class="table table-bordered table-striped">

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
                    $query = mysql_query("SELECT j.keterangan FROM tbjadwal j, tbhari h, tblab l, tbuser u, tbwaktu w WHERE j.idlab=l.idlab AND j.idwaktu=w.idwaktu AND j.idhari=h.idhari AND j.iduser=u.iduser AND l.lab='G1' AND w.idwaktu='$x' AND h.idhari='$y'");
                    $datanya = mysql_fetch_array($query);
                    echo "<td>".$datanya['keterangan']."</td>";
                  }
                  echo "</tr>";
                }
                ?>



              </tbody>
            </table>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->


      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_5">
                <!-- isi 5-->
                  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title"> Laboratorium G2</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="example2" class="table table-bordered table-striped">

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
                    $query = mysql_query("SELECT j.keterangan FROM tbjadwal j, tbhari h, tblab l, tbuser u, tbwaktu w WHERE j.idlab=l.idlab AND j.idwaktu=w.idwaktu AND j.idhari=h.idhari AND j.iduser=u.iduser AND l.lab='G2' AND w.idwaktu='$x' AND h.idhari='$y'");
                    $datanya = mysql_fetch_array($query);
                    echo "<td>".$datanya['keterangan']."</td>";
                  }
                  echo "</tr>";
                }
                ?>



              </tbody>
            </table>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->


      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_6">
                <!-- isi 6-->
                  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title"> Laboratorium G5</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="example2" class="table table-bordered table-striped">

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
                    $query = mysql_query("SELECT j.keterangan FROM tbjadwal j, tbhari h, tblab l, tbuser u, tbwaktu w WHERE j.idlab=l.idlab AND j.idwaktu=w.idwaktu AND j.idhari=h.idhari AND j.iduser=u.iduser AND l.lab='G5' AND w.idwaktu='$x' AND h.idhari='$y'");
                    $datanya = mysql_fetch_array($query);
                    echo "<td>".$datanya['keterangan']."</td>";
                  }
                  echo "</tr>";
                }
                ?>



              </tbody>
            </table>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->


      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_7">
                <!-- isi 7-->
                  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title"> Laboratorium L12</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="example2" class="table table-bordered table-striped">

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
                    $query = mysql_query("SELECT j.keterangan FROM tbjadwal j, tbhari h, tblab l, tbuser u, tbwaktu w WHERE j.idlab=l.idlab AND j.idwaktu=w.idwaktu AND j.idhari=h.idhari AND j.iduser=u.iduser AND l.lab='L12' AND w.idwaktu='$x' AND h.idhari='$y'");
                    $datanya = mysql_fetch_array($query);
                    echo "<td>".$datanya['keterangan']."</td>";
                  }
                  echo "</tr>";
                }
                ?>



              </tbody>
            </table>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->


      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- nav-tabs-custom -->


  

  















  <!-- /.tab-pane -->

</div>
<!-- /.tab-content -->
</div>
<!-- nav-tabs-custom -->
</div>
<!-- /.col -->




<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Create the tabs -->
  <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
    <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
    <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
  </ul>
  <!-- Tab panes -->
  <div class="tab-content">
    <!-- Home tab content -->
    <div class="tab-pane" id="control-sidebar-home-tab">
      <h3 class="control-sidebar-heading">Recent Activity</h3>
      <ul class="control-sidebar-menu">
        <li>
          <a href="javascript:void(0)">
            <i class="menu-icon fa fa-birthday-cake bg-red"></i>

            <div class="menu-info">
              <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

              <p>Will be 23 on April 24th</p>
            </div>
          </a>
        </li>
        <li>
          <a href="javascript:void(0)">
            <i class="menu-icon fa fa-user bg-yellow"></i>

            <div class="menu-info">
              <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

              <p>New phone +1(800)555-1234</p>
            </div>
          </a>
        </li>
        <li>
          <a href="javascript:void(0)">
            <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

            <div class="menu-info">
              <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

              <p>nora@example.com</p>
            </div>
          </a>
        </li>
        <li>
          <a href="javascript:void(0)">
            <i class="menu-icon fa fa-file-code-o bg-green"></i>

            <div class="menu-info">
              <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

              <p>Execution time 5 seconds</p>
            </div>
          </a>
        </li>
      </ul>
      <!-- /.control-sidebar-menu -->

      <h3 class="control-sidebar-heading">Tasks Progress</h3>
      <ul class="control-sidebar-menu">
        <li>
          <a href="javascript:void(0)">
            <h4 class="control-sidebar-subheading">
              Custom Template Design
              <span class="label label-danger pull-right">70%</span>
            </h4>

            <div class="progress progress-xxs">
              <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
            </div>
          </a>
        </li>
        <li>
          <a href="javascript:void(0)">
            <h4 class="control-sidebar-subheading">
              Update Resume
              <span class="label label-success pull-right">95%</span>
            </h4>

            <div class="progress progress-xxs">
              <div class="progress-bar progress-bar-success" style="width: 95%"></div>
            </div>
          </a>
        </li>
        <li>
          <a href="javascript:void(0)">
            <h4 class="control-sidebar-subheading">
              Laravel Integration
              <span class="label label-warning pull-right">50%</span>
            </h4>

            <div class="progress progress-xxs">
              <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
            </div>
          </a>
        </li>
        <li>
          <a href="javascript:void(0)">
            <h4 class="control-sidebar-subheading">
              Back End Framework
              <span class="label label-primary pull-right">68%</span>
            </h4>

            <div class="progress progress-xxs">
              <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
            </div>
          </a>
        </li>
      </ul>
      <!-- /.control-sidebar-menu -->

    </div>
    <!-- /.tab-pane -->
    <!-- Stats tab content -->
    <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
    <!-- /.tab-pane -->
    <!-- Settings tab content -->
    <div class="tab-pane" id="control-sidebar-settings-tab">
      <form method="post">
        <h3 class="control-sidebar-heading">General Settings</h3>

        <div class="form-group">
          <label class="control-sidebar-subheading">
            Report panel usage
            <input type="checkbox" class="pull-right" checked>
          </label>

          <p>
            Some information about this general settings option
          </p>
        </div>
        <!-- /.form-group -->

        <div class="form-group">
          <label class="control-sidebar-subheading">
            Allow mail redirect
            <input type="checkbox" class="pull-right" checked>
          </label>

          <p>
            Other sets of options are available
          </p>
        </div>
        <!-- /.form-group -->

        <div class="form-group">
          <label class="control-sidebar-subheading">
            Expose author name in posts
            <input type="checkbox" class="pull-right" checked>
          </label>

          <p>
            Allow the user to show his name in blog posts
          </p>
        </div>
        <!-- /.form-group -->

        <h3 class="control-sidebar-heading">Chat Settings</h3>

        <div class="form-group">
          <label class="control-sidebar-subheading">
            Show me as online
            <input type="checkbox" class="pull-right" checked>
          </label>
        </div>
        <!-- /.form-group -->

        <div class="form-group">
          <label class="control-sidebar-subheading">
            Turn off notifications
            <input type="checkbox" class="pull-right">
          </label>
        </div>
        <!-- /.form-group -->

        <div class="form-group">
          <label class="control-sidebar-subheading">
            Delete chat history
            <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
          </label>
        </div>
        <!-- /.form-group -->
      </form>
    </div>
    <!-- /.tab-pane -->
  </div>
</aside>
<!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
   immediately after the control sidebar -->
   <div class="control-sidebar-bg"></div>
 </div>
 <!-- ./wrapper -->

 <!-- jQuery 3 -->
 <script src="../bower_components/jquery/dist/jquery.min.js"></script>
 <!-- Bootstrap 3.3.7 -->
 <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
 <!-- DataTables -->
 <script src="../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
 <script src="../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
 <!-- SlimScroll -->
 <script src="../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
 <!-- FastClick -->
 <script src="../bower_components/fastclick/lib/fastclick.js"></script>
 <!-- AdminLTE App -->
 <script src="../dist/js/adminlte.min.js"></script>
 <!-- AdminLTE for demo purposes -->
 <script src="../dist/js/demo.js"></script>
 <!-- page script -->
 <script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : false,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : false,
      'info'        : false,
      'autoWidth'   : false
    })
  })
</script>
</body>
</html>
