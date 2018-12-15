<?php
include 'header.php';
$id = $_SESSION['iduser'];
?>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="../dist/img/user.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $_SESSION['nama']; ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN MENU</li>
    <li><a href="index.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
    </li>
      <li>
        <a href="data.php">
          <i class="fa fa-calendar"></i> <span>Jadwal</span>
          <span class="pull-right-container">
          </span>
        </a>
      </li>
    <li  class="treeview active"><a href="cari.php"><i class="fa fa-search-plus"></i> <span>Reservasi</span></a>
    </li>
	<li><a href="edituser.php?id=<?php echo $_SESSION['iduser']; ?>"><i class="fa fa-sliders"></i> <span>Preferensi</span></a></li>
  <li ><a href="history.php"><i class="fa fa-history"></i> <span>Riwayat</span></a>
    </li>
    </ul>  
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Reservasi Lab
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Reservasi</li>
      </ol>
    </section>
    <br>
    <!-- Main content -->
    <section class="content">

      <!-- SELECT2 EXAMPLE -->
      <div class="box box-default" align=>
        
        <br>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>Gedung Laboratorium</label>
                <select class="form-control select2" style="width: 100%;" id="gedung">
                  <option>F1</option>
                  <option>F2</option>
                  <option>F3</option>
                  <option>G1</option>
                  <option>G2</option>
                  <option>G5</option>
                  <option>L12</option>
                </select>
              </div>
              <!-- /.form-group -->
              <br>
              <div class="form-group">
                <label>Waktu Mulai</label>
                <select class="form-control select2" style="width: 100%;" id="waktu">
					<?php
					$query = mysql_query("select * from tbwaktu");
					while ($data = mysql_fetch_assoc($query)) {
					  echo '<option value="'.$data['idwaktu'].'">'.$data['waktu'].'</option>';
					}
					?>
                </select>
              </div>
			  
			    <div class="form-group">
                <label>Waktu Selesai</label>
                <select class="form-control select2" style="width: 100%;" id="waktu2">
					<?php
					$query = mysql_query("select * from tbwaktu");
					while ($data = mysql_fetch_assoc($query)) {
					  echo '<option value="'.$data['idwaktu'].'">'.$data['waktu'].'</option>';
					}
					?>
                </select>
              </div>
			  
              <!-- /.form-group -->
              <br>
              <div class="form-group">
                <label>Tanggal</label>

                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right" id="datepicker">

                </div>
             
			 <br>
			  <div class="form-group">
                <label>Keterangan</label>           
                <div>
                  <textarea maxlength="30" class="textarea" placeholder="Maks. 30 karakter. Contoh :  3A-KRIPTO-Anwar"
                            style="width: 100%; height: 40px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"
							id="keterangan"></textarea>
                </div>
			  </div>
              
              <button type="button" class="view_data btn btn-block btn-warning btn-flat" data-toggle="modal" data-target="#modal-default">Booking Lab</button>
              <br>
              <!-- /.form group -->
            </div>

            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->

      
      <!-- /.row -->
      <div class="modal fade" id="modal-default">
          <div class="modal-dialog" style="width: 1150px">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Notifikasi</h4>
              </div>
              <div class="modal-body" id="data_lab">
                
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
    </section>
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

<script src="../dist/sweetalert2.all.min.js"></script>
<!-- jQuery 3 -->
<script src="../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Select2 -->
<script src="../bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- InputMask -->
<script src="../plugins/input-mask/jquery.inputmask.js"></script>
<script src="../plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="../plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- date-range-picker -->
<script src="../bower_components/moment/min/moment.min.js"></script>
<script src="../bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="../bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- bootstrap color picker -->
<script src="../bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="../plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- SlimScroll -->
<script src="../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="../plugins/iCheck/icheck.min.js"></script>
<!-- FastClick -->
<script src="../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<!-- Page script -->
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A' })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Date picker
    var todayDate = new Date().getDate();
    $('#datepicker').datepicker({
      startDate: new Date(),
      endDate: new Date(new Date().setDate(todayDate + 14)),
      daysOfWeekDisabled:[0,6],
      autoclose: true
    })

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    })
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass   : 'iradio_minimal-red'
    })
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    //Timepicker
    $('.timepicker').timepicker({
      showInputs: false
    })
  })
</script>
<script>
  // ini menyiapkan dokumen agar siap grak :)
  $(document).ready(function(){

    // yang bawah ini bekerja jika tombol lihat data (class="view_data") di klik
    $('.view_data').click(function(){
      // membuat variabel id, nilainya dari attribut id pada button
      // id="'.$row['id'].'" -> data id dari database ya sob, jadi dinamis nanti id nya
      var gedung =  document.getElementById("gedung").value;
      var waktu =  document.getElementById("waktu").value;
	  var waktu2 =  document.getElementById("waktu2").value;
      var tanggal = document.getElementById("datepicker").value;
      var keterangan = document.getElementById("keterangan").value;
      // memulai ajax
      $.ajax({
        url: 'view.php',  // set url -> ini file yang menyimpan query tampil detail data siswa
        method: 'post',   // method -> metodenya pakai post. Tahu kan post? gak tahu? browsing aja :)
        data: {gedung:gedung, idwaktu:waktu, idwaktu2:waktu2, tanggal:tanggal, keterangan:keterangan},    // nah ini datanya -> {id:id} = berarti menyimpan data post id yang nilainya dari = var id = $(this).attr("id");
        success:function(data){   // kode dibawah ini jalan kalau sukses
          $('#data_lab').html(data);  // mengisi konten dari -> <div class="modal-body" id="data_siswa">
          $('#myModal').modal("show");  // menampilkan dialog modal nya
        }
      });
    });
  });
</script>
</body>
</html>


