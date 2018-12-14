<?php

  include 'header.php';
  include 'otoritas2.php';
	$id = $_SESSION['iduser'];
	$query = mysql_query("SELECT * FROM tbuser WHERE iduser='$id'");
	$data = mysql_fetch_assoc($query);
	if(mysql_num_rows($query) < 1 ) {
		echo "Data tidak ditemukan";	
	} 
?>
  <aside class="main-sidebar">
    <section class="sidebar">
      <div class="user-panel">
        <div class="pull-left image">
          <img src="../dist/img/user.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $_SESSION['nama']; ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
		<ul class="sidebar-menu" data-widget="tree">
      <li class="header">MAIN MENU</li>
      
		  <li><a href="index.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>  </li>
		  <li><a href="data.php">
			  <i class="fa fa-calendar"></i> <span>Jadwal</span>
			  <span class="pull-right-container">
			  </span></a></li>
		  <li><a href="cari.php"><i class="fa fa-search-plus"></i> <span>Reservasi</span></a>
		  <li  class="treeview active"><a href="edituser.php"><i class="fa fa-sliders"></i> <span>Preferensi</span></a></li>
      <li ><a href="history.php"><i class="fa fa-history"></i> <span>Riwayat</span></a>
		</ul>  
	</section>
  </aside>

	<div class="content-wrapper">
    <section class="content-header">
      <h1> Edit User </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Edit User</li>
      </ol>
    </section>
    <br>
    <section class="content">
	<div class="register-box">
	<div class="register-logo">
		<a href="index.php">SILABUS</a>
		</div>
    <form method="post">
    <div class="form-group has-feedback">
      <input type="text" name="namabaru" class="form-control" placeholder="Nama Baru">
      <span class="glyphicon glyphicon-font form-control-feedback"></span>
    </div>
	  <div class="form-group has-feedback">
        <input type="password" name="password" class="form-control" placeholder="Password Lama">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
	  
	  <div class="form-group has-feedback">
        <input type="password" name="passwordbaru" class="form-control" placeholder="Password Baru">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
    
	  
    
      <div class="row">
        <div class="col-xs-8">
        </div>
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat" name="ubahpassword">Submit</button>
        </div>
      </div>
    </form>
	
	<?php
		if(isset($_POST['ubahpassword'])) {	
			$xpassword = $_POST['password'];
      $password = str_rot13($xpassword);
			$passwordbaru = str_rot13($_POST['passwordbaru']);
			$namabaru = $_POST['namabaru'];
      if($password==$data['password']){
        mysql_query("UPDATE tbuser SET password='$passwordbaru' WHERE iduser='$id'");
        mysql_query("UPDATE tbuser SET     nama='$namabaru'     WHERE iduser='$id'");
        echo "<script language='javascript'>alert('Data berhasil di ubah.'); document.location='edituser.php';</script>";
        $_SESSION['nama'] = $namabaru;
      } else {
				echo "<script language='javascript'>alert('Data gagal di ubah!'); document.location='edituser.php';</script>";
			}		
		}
	?>

</div>
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="plugins/iCheck/icheck.min.js"></script>

      <div class="modal fade" id="modal-default">
          <div class="modal-dialog" style="width: 1150px">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Hasil Pencarian</h4>
              </div>
              <div class="modal-body" id="data_lab">
                
              </div>
            </div>
          </div>
        </div>
    </section>
  </div>
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
    reserved.
  </footer>
  <div class="control-sidebar-bg"></div>
</div>

<script src="bower_components/jquery/dist/jquery.min.js"></script>
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="bower_components/select2/dist/js/select2.full.min.js"></script>
<script src="plugins/input-mask/jquery.inputmask.js"></script>
<script src="plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- date-range-picker -->
<script src="bower_components/moment/min/moment.min.js"></script>
<script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- bootstrap color picker -->
<script src="bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- SlimScroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="plugins/iCheck/icheck.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- Page script -->

</body>
</html>
