<?php
include 'otoritas2.php';
include "header.php";
$iduser = $_SESSION['iduser'];

$totalJadwal = mysql_num_rows(mysql_query("SELECT * from tbjadwal WHERE status='1'"));
$totalJadwalTetap = mysql_num_rows(mysql_query("SELECT * from tbjadwal WHERE status='1' and iduser='1'"));
$totalBooking = mysql_num_rows(mysql_query("SELECT * from tbjadwal WHERE status='1' and iduser='$iduser'"));
$totalRiwayat = mysql_num_rows(mysql_query("SELECT * from tbjadwal WHERE (status='1' and iduser='$iduser') OR status='2' and iduser='$iduser'"));

?>
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="treeview active">
        <a href="#">
          <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          <span class="pull-right-container">
            
          </span>
        </a>
        
      </li>
	  <li><a href="data.php"><i class="fa fa-calendar"></i> <span>Jadwal</span></a></li>
    <li><a href="cari.php"><i class="fa fa-search-plus"></i> <span>Reservasi</span></a></li>
    <li><a href="edituser.php?id=<?php echo $_SESSION['iduser']; ?>"><i class="fa fa-sliders"></i> <span>Preferensi</span></a></li>
    <li ><a href="history.php"><i class="fa fa-history"></i> <span>Riwayat</span></a>

    </ul>  
  </section>
  <!-- /.sidebar -->
</aside>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
      <h1>
        Dashboard
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>
<br>
  <!-- Main content -->

<div class="nav-tabs-custom">
            
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
                <!-- isi -->
                <section class="content">
    <div class="row">
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php echo $totalJadwal; ?><sup style="font-size: 20px"></sup></h3>

              <p>Total Jadwal</p>
            </div>
            <div class="icon">
              <i class="ion ion-grid"></i>
            </div>
            <a href="data.php" class="small-box-footer">Lihat <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?php echo $totalJadwalTetap; ?></h3>

              <p>Jadwal Tetap</p>
            </div>
            <div class="icon">
              <i class="ion ion-calendar"></i>
            </div>
            <a href="#" class="small-box-footer">&nbsp <i class=""></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?php echo $totalBooking; ?></h3>

              <p>Reservasi Aktif</p>
            </div>
            <div class="icon">
              <i class="ion ion-ios-timer"></i>
            </div>	
            <a href="history.php" class="small-box-footer">Lihat <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
		<div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-blue">
            <div class="inner">
              <h3><?php echo $totalRiwayat; ?></h3>

              <p>Riwayat Reservasi</p>
            </div>
            <div class="icon">
              <i class="fa fa-history"></i>
            </div>	
            <a href="history.php" class="small-box-footer">Lihat <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
  </section>
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
