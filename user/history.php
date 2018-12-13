<?php
include "otoritas2.php";
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
          <li><a href="cari.php"><i class="fa fa-search-plus"></i> <span>Reservasi</span></a>
    </li>
      <li><a href="edituser.php?id=<?php echo $_SESSION['iduser']; ?>"><i class="fa fa-sliders"></i> <span>Preferensi</span></a></li>
      <li class="treeview active"><a href="history.php"><i class="fa fa-history"></i> <span>Riwayat</span></a>
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
      Riwayat Reservasi
    </h1>
    <ol class="breadcrumb">
      <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Riwayat</li>
    </ol>

  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box">
      <div class="box-body">

        <button type="button" class="fa fa-search-plus btn btn-primary" data-toggle="modal" data-target="#modal-default" style="height: 35px;" onclick="window.location.href='cari.php'"> Tambah</button>
        <div id=contentdinamis>

        </div>
        <!-- /.content -->
      </div>
      <!-- /.box-body -->\
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
      $.get('gethistory.php', function(data){
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