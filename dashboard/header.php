<?php
  session_start();
  if(!isset($_SESSION['user_name'])){ //if login in session is not set
    header("Location: loginform.php");
  }
  include('db/dbPDO.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>


  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="images/favicon.png" type="image/png">

  <title>SPYR Games Dashboard Admin</title>

  <link href="css/style.default.css" rel="stylesheet">
  <link href="css/jquery.datatables.css" rel="stylesheet">
  <link href="css/morris.css" rel="stylesheet">

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
  <script src="js/html5shiv.js"></script>
  <script src="js/respond.min.js"></script>
  <![endif]-->
</head>

<body>
<!-- Preloader -->
<div id="preloader">
    <div id="status"><i class="fa fa-spinner fa-spin"></i></div>
</div>

<section>

  <div class="leftpanel">

    <div class="logopanel">
        <h1>SPYR Games</h1>
    </div><!-- logopanel -->

    <div class="leftpanelinner">

      <h5 class="sidebartitle">Navigation</h5>
      <ul class="nav nav-pills nav-stacked nav-bracket">
        <li class="active"><a href="index.php"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>
        <li><a href="add-account.php"><i class="glyphicon glyphicon-cog"></i> <span>Add Accounts</span></a></li>
        <li><a href="register-user.php"><i class="glyphicon glyphicon-user"></i> <span>Register User</span></a></li>
        <li><a href="help.php"><i class="glyphicon glyphicon-question-sign"></i><span>Help</span></a></li>
        <li><a href="loginform.php?action=logout"><i class="glyphicon glyphicon-log-out"></i><span>Log Out</span></a></li>
      </ul>

      <div class="infosummary">
        <h5 class="sidebartitle">Weekly Stats</h5>
        <ul>
            <li>
                <div class="datainfo">
                    <span class="text-muted">Total Installs</span>
                    <h4><?php/* echo $totalInstallsWeekly = sidebarTotalInstalls($results_weekly); */?></h4>
                </div>
            </li>
            <li>
                <div class="datainfo">
                    <span class="text-muted">Total CLicks</span>
                    <h4><?php/* echo $totalClicksWeekly = sidebarTotalClicks($results_weekly); */?></h4>
                </div>
            </li>
            <li>
                <div class="datainfo">
                    <span class="text-muted">Percentage Install</span>
                    <h4><?php /*echo $installPer = round((($totalInstallsWeekly/$totalClicksWeekly) * 100), 2, PHP_ROUND_HALF_UP); */?>%</h4>
                </div>
            </li>
            <li>
                <div class="datainfo">
                    <span class="text-muted">Revenue</span>
                    <h4>$1,234.53</h4>
                </div>
            </li>
            <li>
                <div class="datainfo">
                    <span class="text-muted">Ad Spend</span>
                    <h4>$<?php/* sidebarTotalAdSpend($results_weekly); */?></h4>
                </div>

            </li>
        </ul>
      </div><!-- infosummary -->

      <div class="col-sm-12">
        <span class="sublabel">Weekly Installs vs. Clicks (<?php /*echo $installPer; */?>%)</span>
        <div class="progress progress-sm">
          <div style="width: <?php/* echo $installPer; */?>%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="40" role="progressbar" class="progress-bar progress-bar-primary"></div>
        </div><!-- progress -->

        <span class="sublabel">Memory Usage (32.2%)</span>
        <div class="progress progress-sm">
          <div style="width: 32%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="40" role="progressbar" class="progress-bar progress-bar-success"></div>
        </div><!-- progress -->

        <span class="sublabel">Disk Usage (82.2%)</span>
        <div class="progress progress-sm">
          <div style="width: 82%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="40" role="progressbar" class="progress-bar progress-bar-danger"></div>
        </div><!-- progress -->

        <span class="sublabel">Databases (63/100)</span>
        <div class="progress progress-sm">
          <div style="width: 63%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="40" role="progressbar" class="progress-bar progress-bar-warning"></div>
        </div><!-- progress -->

        <span class="sublabel">Domains (2/10)</span>
        <div class="progress progress-sm">
          <div style="width: 20%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="40" role="progressbar" class="progress-bar progress-bar-success"></div>
        </div><!-- progress -->

        <span class="sublabel">Email Account (13/50)</span>
        <div class="progress progress-sm">
          <div style="width: %" aria-valuemax="100" aria-valuemin="0" aria-valuenow="40" role="progressbar" class="progress-bar progress-bar-success"></div>
        </div><!-- progress -->


      </div><!-- col-sm-4 -->

    </div><!-- leftpanelinner -->
  </div><!-- leftpanel -->

  <div class="mainpanel">

    <div class="headerbar">

      <a class="menutoggle"><i class="fa fa-bars"></i></a>

      <div class="header-right">
      </div><!-- header-right -->

    </div><!-- headerbar -->
