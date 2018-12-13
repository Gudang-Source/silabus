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
    <li ><a href="history.php"><i class="fa fa-book"></i> <span>Logs</span></a>
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

        <button type="button" class="fa fa-user-plus btn btn-success" data-toggle="modal" data-target="#modal-default" style="height: 35px;"> Tambah</button><br><br>

        <div class="modal fade" id="modal-default">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Manajemen User</h4>
              </div>
              <div class="modal-body ">

                <!-- form start -->
                <form action="adduser.php" method="POST" id="manage-user">
                  <div class="box-body form-horizontal">
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Username</label>

                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="username" placeholder="Username" id="input-username" />
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="new-password" class="col-sm-2 control-label">Password</label>

                      <div class="col-sm-10">
                        <input type="password" name="password" class="form-control" id="input-newpassword" placeholder="Password Baru" />
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="retype-password" class="col-sm-2 control-label" ></label>

                      <div class="col-sm-10">
                        <input type="password" name="password2" class="form-control" id="input-retypepassword" placeholder="Ulangi Password" />
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Nama</label>

                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="nama" placeholder="Nama" id="input-nama" />
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">No Induk</label>

                      <div class="col-sm-10">
                        <input type="number" class="form-control" name="ni" placeholder="Nomor Induk" id="input-ni" />
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Otoritas</label>
                      <div class="col-sm-10">
                        
                        <select name="otoritas" class="form-control" id="input-otoritas">
                          <option value="1">Admin</option>
                          <option value="2">User</option>
                        </select>
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
        if ($('#input-username').val()==""){
          alert("Data tidak valid!");
        }
        else if ($('#input-newpassword').val()==""){
          alert("Data tidak valid");
        }
        else if (($('#input-retypepassword').val()=="")||($('#input-retypepassword').val()!=$('#input-newpassword').val())){
          alert("Data tidak valid!");
        }
        else if ($('#input-nama').val()==""){
          alert("Data tidak valid");
        }
        else if ($('#input-ni').val()==""){
          alert("Data tidak valid");
        }
        else if ($('#input-otoritas').val()==""){
          alert("Data tidak valid");
        }

        else {
          $.ajax({
            url:$(this).attr('action'),
            method:$(this).attr('method'),
            data:$(this).serialize(),
            success:function(){
              $('form').attr('action',"adduser.php");
              loadData();
              resetForm();
              $('#modal-default').modal('hide');
            }
          })
        }
      })
    })
    function loadData(){
      $('#modal-default').on('hidden.bs.modal', function(){
        $(this).find('form')[0].reset();
      })
      $.get('getuser.php', function(data){
        $('#contentdinamis').html(data);

        $('.updateButton').click(function(e){
          e.preventDefault();
            $('[name=username]').val($(this).attr('updateusername'));
            $('[name=nama]').val($(this).attr('updatenama'));
            $('[name=ni]').val($(this).attr('updateni'));
            $('[name=otoritas]').val($(this).attr('updateotoritas'));
            $('[name=password]').val($(this).attr('updatepass'));
            $('[name=password2]').val($(this).attr('updatepass'));
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