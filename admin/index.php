<?php
include "../config.php";
include "otoritas1.php";
$totalUser = mysql_num_rows(mysql_query("SELECT * from tbuser WHERE otoritas<>'1'"));
$totalAdmin = mysql_num_rows(mysql_query("SELECT * from tbuser WHERE otoritas='1'"));
$totalJadwal = mysql_num_rows(mysql_query("SELECT * from tbjadwal WHERE status='1'"));
$totalJadwalBooking = mysql_num_rows(mysql_query("SELECT j.*, u.username as username, u.ni as ni, u.otoritas as otoritas, u.nama as nama FROM tbjadwal j, tbhari h, tblab l, tbuser u, tbwaktu w WHERE (j.idlab=l.idlab AND j.idwaktu=w.idwaktu AND j.idhari=h.idhari AND j.iduser=u.iduser AND j.status='1' and u.otoritas='2')"));
$totalJadwalTetap = mysql_num_rows(mysql_query("SELECT j.*, u.username as username, u.ni as ni, u.otoritas as otoritas, u.nama as nama FROM tbjadwal j, tbhari h, tblab l, tbuser u, tbwaktu w WHERE (j.idlab=l.idlab AND j.idwaktu=w.idwaktu AND j.idhari=h.idhari AND j.iduser=u.iduser AND j.status='1' AND u.otoritas='1')"));


$totalLab = mysql_num_rows(mysql_query("SELECT * from tblab"));

for($a = 1; $a <= $totalLab; $a++){
  $namalab = mysql_fetch_array(mysql_query("SELECT * from tblab where idlab='$a'"));
  $xlab = $namalab['lab'];
  $olehuser[$a-1] = mysql_num_rows(mysql_query("SELECT l.lab as lab FROM tbjadwal j, tbhari h, tblab l, tbuser u, tbwaktu w WHERE j.idlab=l.idlab AND j.idwaktu=w.idwaktu AND j.idhari=h.idhari AND j.iduser=u.iduser AND l.lab='$xlab' AND u.otoritas='2' AND j.status='1'"));
}

for($a = 1; $a <= $totalLab; $a++){
  $namalab = mysql_fetch_array(mysql_query("SELECT * from tblab where idlab='$a'"));
  $xlab = $namalab['lab'];
  $olehadmin[$a-1] = mysql_num_rows(mysql_query("SELECT l.lab as lab FROM tbjadwal j, tbhari h, tblab l, tbuser u, tbwaktu w WHERE j.idlab=l.idlab AND j.idwaktu=w.idwaktu AND j.idhari=h.idhari AND j.iduser=u.iduser AND l.lab='$xlab' AND u.otoritas='1' AND j.status='1'"));
}



?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SILABUS | UNPKEDIRI</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="../bower_components/select2/dist/css/select2.min.css">
  <link rel="stylesheet" href="../bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="../plugins/iCheck/all.css">
  <link rel="stylesheet" href="../bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
  <link rel="icon" href="../dist/img/favicon.png" type="image/gif" sizes="16x16">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-red-light sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="../index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>SLB</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>SI</b>LABUS</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li style="padding-left:10px; padding-right:10px; padding-top:5px; padding-bottom:5px">
            <a href="../logout.php" style="padding-left:30px; padding-right:30px; padding-top:10px; height:40px;" class="btn btn-block btn-warning"><span class="fa fa-sign-out"></span>LOGOUT</a>
          </li>
        </ul>

      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
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
        <li class="header">MAIN MENU</li>
        <li class="treeview active"><a href="#"><i class="fa fa-dashboard"></i>
         <span>Dashboard</span><span class="pull-right-container"></span></a>
        </li>
        <li><a href="data.php"><i class="fa fa-calendar"></i> <span>Jadwal</span></a></li>
        <li><a href="cari.php"><i class="fa fa-search"></i> <span>Pencarian</span></a>
        <li><a href="reservasi.php"><i class="fa fa-search-plus"></i> <span>Reservasi</span></a>
        </li>
        <li><a href="userman.php"><i class="fa fa-users"></i> <span>Userman</span></a>
        </li>
        <li ><a href="jedit.php"><i class="fa fa-folder-open-o"></i> <span>jEdit</span></a>
        <li ><a href="logs.php"><i class="fa fa-book"></i> <span>Logs</span></a>
        
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

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php echo $totalJadwal ; ?><sup style="font-size: 20px"></sup></h3>

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
              <h3><?php echo $totalJadwalTetap ; ?></h3>

              <p>Jadwal Tetap</p>
            </div>
            <div class="icon">
              <i class="ion ion-calendar"></i>
            </div>
            <a href="jedit.php" class="small-box-footer">Lihat <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?php echo $totalJadwalBooking ; ?></h3>

              <p>Jadwal Terbooking</p>
            </div>
            <div class="icon">
              <i class="ion ion-ios-timer"></i>
            </div>  
            <a href="jedit.php" class="small-box-footer">Lihat <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo $totalUser ; ?></h3>

              <p>User Terdaftar</p>
            </div>
            <div class="icon">
              <i class="ion ion-android-people"></i>
            </div>  
            <a href="userman.php" class="small-box-footer">Lihat <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-md-6">
          <!-- DONUT CHART -->
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">User</h3>

              <div class="box-tools pull-right">
                </button>
              </div>
            </div>
            <div class="box-body">
              <canvas id="pieChart" style="height:250px"></canvas>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

        </div>
        <!-- /.col (LEFT) -->
        <div class="col-md-6">
          <!-- BAR CHART -->
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Lab</h3>

              <div class="box-tools pull-right">
                </button>
              </div>
            </div>
            <div class="box-body">
              <div class="chart">
                <canvas id="barChart" style="height:230px"></canvas>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

        </div>
        <!-- /.col (RIGHT) -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- ChartJS -->
<script src="../bower_components/chart.js/Chart.js"></script>
<!-- FastClick -->
<script src="../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    /* ChartJS
     * -------
     * Here we will create a few charts using ChartJS
     */



    //-------------
    //- PIE CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
    var pieChart       = new Chart(pieChartCanvas)
    var PieData        = [
      {
        value    : <?php echo $totalAdmin; ?>,
        color    : '#EF5350',
        highlight: '#f56954',
        label    : 'Admin'
      },
      {
        value    : <?php echo $totalUser; ?>,
        color    : '#FFEB3B',
        highlight: '#FFF176',
        label    : 'User'
      },
    ]
    var pieOptions     = {
      //Boolean - Whether we should show a stroke on each segment
      segmentShowStroke    : true,
      //String - The colour of each segment stroke
      segmentStrokeColor   : '#fff',
      //Number - The width of each segment stroke
      segmentStrokeWidth   : 2,
      //Number - The percentage of the chart that we cut out of the middle
      percentageInnerCutout: 50, // This is 0 for Pie charts
      //Number - Amount of animation steps
      animationSteps       : 100,
      //String - Animation easing effect
      animationEasing      : 'easeOutBounce',
      //Boolean - Whether we animate the rotation of the Doughnut
      animateRotate        : true,
      //Boolean - Whether we animate scaling the Doughnut from the centre
      animateScale         : false,
      //Boolean - whether to make the chart responsive to window resizing
      responsive           : true,
      // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
      maintainAspectRatio  : true,
      //String - A legend template
      legendTemplate       : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<segments.length; i++){%><li><span style="background-color:<%=segments[i].fillColor%>"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>'
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    pieChart.Pie(PieData, pieOptions)

    //-------------
    //- BAR CHART -
    //-------------
    var barChartCanvas                   = $('#barChart').get(0).getContext('2d')
    var barChart                         = new Chart(barChartCanvas)
    var areaChartData = {
      labels  : ['F1', 'F2', 'F3', 'G1', 'G2', 'G5', 'L12'],
      datasets: [
        {
          label               : 'Admin',
          fillColor           : '#EF5350',
          strokeColor         : '#EF5350',
          pointColor          : '#FF1744',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : [
          <?php
            for($b=0; $b<$totalLab; $b++){
              echo $olehadmin[$b].", ";
            }
          ?>
          ]
        },
        {
          label               : 'Users',
          fillColor           : '#FFF176',
          strokeColor         : '#FFF176',
          pointColor          : '#FFF176',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [
          <?php
            for($b=0; $b<$totalLab; $b++){
              echo $olehuser[$b].", ";
            }
          ?>
          ]
        }
      ]
    }
    var barChartData                     = areaChartData

    barChartData.datasets[1].fillColor   = '#00a65a'
    barChartData.datasets[1].strokeColor = '#00a65a'
    barChartData.datasets[1].pointColor  = '#00a65a'
    var barChartOptions                  = {
      //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
      scaleBeginAtZero        : true,
      //Boolean - Whether grid lines are shown across the chart
      scaleShowGridLines      : true,
      //String - Colour of the grid lines
      scaleGridLineColor      : 'rgba(0,0,0,.05)',
      //Number - Width of the grid lines
      scaleGridLineWidth      : 1,
      //Boolean - Whether to show horizontal lines (except X axis)
      scaleShowHorizontalLines: true,
      //Boolean - Whether to show vertical lines (except Y axis)
      scaleShowVerticalLines  : true,
      //Boolean - If there is a stroke on each bar
      barShowStroke           : true,
      //Number - Pixel width of the bar stroke
      barStrokeWidth          : 2,
      //Number - Spacing between each of the X value sets
      barValueSpacing         : 5,
      //Number - Spacing between data sets within X values
      barDatasetSpacing       : 1,
      //String - A legend template
      legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].fillColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
      //Boolean - whether to make the chart responsive
      responsive              : true,
      maintainAspectRatio     : true
    }

    barChartOptions.datasetFill = false
    barChart.Bar(barChartData, barChartOptions)
  })
</script>
</body>
</html>
