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
    <li class="treeview active"><a href="#"><i class="fa fa-folder-open-o"></i> <span>jEdit</span></a>
    <li ><a href="logs.php"><i class="fa fa-book"></i> <span>Logs</span></a>
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
      Jadwal Editor
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">jEdit</li>
    </ol>

  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box">
      <div class="box-body">

        <button type="button" class="fa fa-user-plus btn btn-success" style="height: 35px;" onclick="window.location.href='reservasi.php'"> Tambah</button><br><br>

        <div class="modal fade" id="modal-default">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Jadwal Editor</h4>
              </div>
              <div class="modal-body ">

                <!-- form start -->
                <form action="updatejadwal.php" method="GET" id="manage-user">
                  <div class="box-body form-horizontal">
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Username</label>

                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="username" placeholder="Username" id="input-username" disabled/>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="new-password" class="col-sm-2 control-label">Gedung</label>

                      <div class="col-sm-10">
                        <input type="text" name="lab" class="form-control" id="input-newpassword" disabled/>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="retype-password" class="col-sm-2 control-label" >Hari</label>

                      <div class="col-sm-10">
                        <input type="text" name="hari" class="form-control" id="input-retypepassword" placeholder="Hari" disabled/>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Waktu</label>

                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="waktu" placeholder="MM:MM" id="input-nama" disabled/>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Tanggal</label>

                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="tanggal" placeholder="YYYY-MM-DD" id="tanggal" disabled/>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Status</label>

                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="status" id="status" disabled/>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Keterangan</label>

                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="keterangan2" id="keterangan"/>
                      </div>
                    </div>
                    <br>
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button>
                    <input type="submit" name="submit" class="add_data btn btn-primary pull-right" value="Kirim" />
                  </div>
                  <!-- /.box-body -->
                </form>
                <!-- form end -->

              </div>
              <!-- modal-body -->

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
      $('#manage-user').on('submit', function(e){
        e.preventDefault();
          $.ajax({
            url:$(this).attr('action'),
            method:$(this).attr('method'),
            data:$(this).serialize(),
            success:function(){
              $('form').attr('action',"updateuser.php");
              loadData();
              resetForm();
              $('#modal-default').modal('hide');
            }
          })
      })
    })
    function loadData(){
      $('#modal-default').on('hidden.bs.modal', function(){
        $(this).find('form')[0].reset();
      })
      $.get('getjadwal.php', function(data){
        $('#contentdinamis').html(data);

        $('.updateButton').click(function(e){
          e.preventDefault();
            $('[name=username]').val($(this).attr('updateusername'));
            $('[name=lab]').val($(this).attr('updatelab'));
            $('[name=waktu]').val($(this).attr('updatewaktu'));
            $('[name=hari]').val($(this).attr('updatehari'));
            $('[name=keterangan2]').val($(this).attr('updateketerangan'));
            $('[name=status]').val($(this).attr('updatestatus'));
            $('[name=tanggal]').val($(this).attr('updatetanggal'));
            $('form').attr('action',$(this).attr('updateid'));


        })
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