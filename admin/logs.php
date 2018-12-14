<?php
include "otoritas1.php";
include "header.php";
?>
<!-- =============================================== -->

<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
        <div class="pull-left image">
          <img src="../dist/img/admin-unp.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $_SESSION['nama']; ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li>
        <a href="index.php">
          <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          <span class="pull-right-container">
            
          </span>
        </a>
        
      </li>
    <li><a href="data.php"><i class="fa fa-calendar"></i> <span>Jadwal</span></a></li>
    <li><a href="cari.php"><i class="fa fa-search"></i> <span>Pencarian</span></a>
    <li><a href="reservasi.php"><i class="fa fa-search-plus"></i> <span>Reservasi</span></a>
    </li>
    <li><a href="userman.php"><i class="fa fa-users"></i> <span>Userman</span></a>
    </li>
    <li><a href="jedit.php"><i class="fa fa-folder-open-o"></i> <span>jEdit</span></a>
    <li class="treeview active"><a href="logs.php"><i class="fa fa-book"></i> <span>Logs</span></a>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>

<!-- =============================================== -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Riwayat Reservasi
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Logs</li>
    </ol>

  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box">
      <div class="box-body">

        <div id=contentdinamis>

        </div>
        <!-- /.content -->
      </div>
      <!-- /.box-body -->

      <!-- /.box-footer-->
    </div>
    <!-- /.box -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<footer class="main-footer">
  <div class="pull-right hidden-xs">

  </div>

</footer>

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
   <script>
    $(document).ready(function() {
      $('.sidebar-menu').tree();
      loadData();
    })
    function loadData(){
      $('#modal-default').on('hidden.bs.modal', function(){
        $(this).find('form')[0].reset();
      })
      $.get('getlogs.php', function(data){
        $('#contentdinamis').html(data);

      })
    }
    function resetForm(){
      $('[type=text]').val('');
      $('[type=password]').val('');
      $('[type=number]').val('');
      $('[name=otoritas]').val('1');

    }
  </script>
</body>

</html>