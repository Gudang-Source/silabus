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

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
            </li>
            <li>
                <a href="data.php">
                    <i class="fa fa-calendar"></i> <span>Jadwal</span>
                    <span class="pull-right-container">
                    </span>
                </a>
            </li>
            <li><a href="cari.php"><i class="fa fa-search"></i> <span>Cari Jadwal</span></a>
            </li>
            <li class="treeview active"><a href="userman.php"><i class="fa fa-users"></i> <span>User Manager</span></a>
            </li>
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
      User Manager
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">User Manager</li>
    </ol>

  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box">
      <div class="box-body">

        <button type="button" class="fa fa-plus btn btn-success" data-toggle="modal" data-target="#modal-default" style="height: 35px;"> Tambah</button><br><br>

        <div class="modal fade" id="modal-default">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Tambah User</h4>
              </div>
              <div class="modal-body ">

                <!-- form start -->
                <form>
                  <div class="box-body form-horizontal">
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Username</label>

                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="username" placeholder="Username" id="username">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label" >Password</label>

                      <div class="col-sm-10">
                        <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Password" id="password">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label" ></label>

                      <div class="col-sm-10">
                        <input type="password" name="password2" class="form-control" id="inputPassword3" placeholder="Ulangi Password" id="password2">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Nama</label>

                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="nama" placeholder="nama" id="nama">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Nomor Induk</label>

                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="ni" placeholder="Nomor Induk" id="ni">
                      </div>
                    </div>
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button>
                    <input type="submit" class="add_data btn btn-primary pull-right" ></input>
                  </div>
                  <!-- /.box-body -->
                </form>
                <!-- form end -->

              </div>

            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->

        </div>
        <!-- /.modal -->

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
        $('.sidebar-menu').tree()
    })
</script>
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
<script>
    $(document).ready(function() {
        loadData();
    })
    function loadData(){
      $.get('getuser.php', function(data){
        $('#contentdinamis').html(data);
      })
    }
</script>


</body>

</html>