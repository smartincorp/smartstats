<?php 
require("../CPU/init.php"); 
?><!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $server_Name; ?> - DB viewing</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.5 -->
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.css">
  <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
  <!-- Pace theme -->
  <link rel="stylesheet" href="../plugins/pace/themes/pace-main.css" />
  <script src="../plugins/jQuery/jQuery-2.1.4.min.js"></script>
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <style>
    .pace-running > *:not(.pace) {
  display: none;
}
  </style>
</head>
<body class="hold-transition <?php echo "$skin"; ?> sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>S</b> S</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Smart</b> Stats</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Smart Stats</p>
          <!-- Status -->
          <a href="#"><?php echo $info; ?></a>
        </div>
      </div>

      <ul class="sidebar-menu">
        <li class="header">Main Navigation</li>
        <!-- Optionally, you can add icons to the links -->
		    <li class="active"><a href="../index.php"><i class="fa fa-key"></i> <span>Smart Stats</span></a></li>
				<li><a href="dbediting.php"><i class="fa fa-server"></i><span>DB editing</span></a></li>
				<li><a href="https://patchy.smartclashcoc.com/" target="_blank"><i class="fa fa-link"></i><span>Smart Patch</span></a></li>
       </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>

<div class="content-wrapper">
	<section class="content-header">
	    <h1 align="center"><?php echo $server_Name; ?></h1></h1><br>
	    <p align="center"><?php echo $server_Disc; ?></p>
	</section>
<div class="content">
<?php

$dbc = new databaseConnection();
$dbc->connect();

if (empty($_GET["page"])) {
	$currentPage = 0;
	$currentPageLimit = 0;
} else {
	if (!is_numeric($_GET["page"])) {
		$currentPage = 0;
		$currentPageLimit = 0;
	} else {
		$currentPage = strip_tags($_GET["page"]);
		$currentPageLimit = $content_limit*$currentPage;
	}
}
if (empty($_GET["sortBy"])) {
	$sql = "SELECT * FROM player LIMIT $currentPageLimit,".$content_limit;
} else {
	$sortBy = htmlentities($_GET["sortBy"]);
	switch ($sortBy) {
		case "id_asc":
			$sql = "SELECT * FROM player ORDER BY `PlayerId` ASC LIMIT $currentPageLimit,".$content_limit;
			break;
		case "id_desc":
			$sql = "SELECT * FROM player ORDER BY `PlayerId` DESC LIMIT $currentPageLimit,".$content_limit;
			break;
		case "pl_asc":
			$sql = "SELECT * FROM player ORDER BY `AccountPrivileges` ASC LIMIT $currentPageLimit,".$content_limit;
			break;
		case "pl_desc":
			$sql = "SELECT * FROM player ORDER BY `AccountPrivileges` DESC LIMIT $currentPageLimit,".$content_limit;
			break;
		case "ut_asc":
			$sql = "SELECT * FROM player ORDER BY `LastUpdateTime` ASC LIMIT $currentPageLimit,".$content_limit;
			break;
		case "ut_desc":
			$sql = "SELECT * FROM player ORDER BY `LastUpdateTime` DESC LIMIT $currentPageLimit,".$content_limit;
			break;
		case "ip_asc";
		    $sql = "SELECT * FROM player ORDER BY 'IPAddress' ASC LIMIT $currentPageLimit,".$content_limit;
		    break;
		case "ip_desc";
		    $sql = "SELECT * FROM player ORDER BY 'IPAddress' DESC LIMIT $currentPageLimit,".$content_limit; 
		    break;
		default:
			$sql = "SELECT * FROM player LIMIT $currentPageLimit,".$content_limit;
			break;
	}
}
?>
<div class="box">
            <div class="box-header">
              <h3 class="box-title">Database viewing</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tbody><tr>
				    <th><h3>Player ID <a href="?sortBy=id_asc" title="ID ascending">▲</a><a href="?sortBy=id_desc" title="ID descending">▼</a></h3></th>
					<th><h3>Privilege Level <a href="?sortBy=pl_asc" title="Privilege Level ascending">▲</a><a href="?sortBy=pl_desc" title="Privilege Level descending">▼</a></h3></th>
					<th><h3>Last Update Time <a href="?sortBy=ut_asc" title="LUT ascending">▲</a><a href="?sortBy=ut_desc" title="LUT descending">▼</a></h3></th>
					<th><h3>IP Address <a href="?sortBy=ip_asc" title="IP ascending">▲</a><a href="?sortBy=ip_desc" title="IP descending">▼</a></h3></th>
					</tr>
                <?php
                if (!$dbc->queryDB($sql)) {
					echo $dbc->errors()."<br />";
				} else {
					$databaseResponse = $dbc->queryDB($sql);
					while($row = mysqli_fetch_array($databaseResponse)){
						$avatarDecoded = json_decode($row["Avatar"]);
						$playerName = $avatarDecoded->{"avatar_name"};
						
						echo "<tr>
						<td>" . $row["PlayerId"] . "</td>
						<td>" . $row["AccountPrivileges"] . "</td>
						<td>" . $row["LastUpdateTime"] . "</td>
						<td>" . $row["IPAddress"] . "</td>";
					}
				}
				?>
			</tbody></table>
            </div>
            <!-- /.box-body -->
          </div>

</div>
</section>
</div>
<script src="../plugins/pace/pace.js"></script>
<footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
      Smart Stats, A Status Page
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2016-17 <a href="https://smartclashcoc.com/" target="_blank">Smart Stats</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane active" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript::;">
              <i class="menu-icon fa fa-server bg-yellow"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Smart Stats</h4>

                <p>Is now v<?php echo $Version; ?></p>
              </div>
            </a>
          </li>
        </ul>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript::;">
              <i class="menu-icon fa fa-cogs bg-yellow"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Better Managment</h4>

                <p>Is to be done. As of now the DB editing feature is BETA!!!</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript::;">
              <h4 class="control-sidebar-subheading">
                Better script and features
                <span class="label label-danger pull-right">70%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<script src="../bootstrap/js/bootstrap.min.js"></script>
<script src="../dist/js/app.min.js"></script>
<script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>

</body>
</html>