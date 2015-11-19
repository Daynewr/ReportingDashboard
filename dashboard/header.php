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
  <link href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css" rel="stylesheet">


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
        <li class="active"><a href="index.php"><i class="fa fa-home"></i> <span> Main Dashboard</span></a></li>
        <li class="nav-parent"><a href=""><i class="fa fa-edit"></i> <span>Drill Down</span></a>
          <ul class="children">
            <li><a href="sub-revenue.php"><i class="fa fa-caret-right"></i> Revenue Data</a></li>
            <li><a href="sub-cost.php"><i class="fa fa-caret-right"></i> Cost Data</a></li>
            <li><a href="sub-google.php"><i class="fa fa-caret-right"></i> Google Data</a></li>
            <li><a href="sub-analysis.php"><i class="fa fa-caret-right"></i> CPI Analysis</a></li>
            <li><a href="sub-kochava.php"><i class="fa fa-caret-right"></i> Kochava Data</a></li>
            <li><a href="sub-display.php"><i class="fa fa-caret-right"></i> Display Search+UAC</a></li>
          </ul>
        </li>
        <!--<li><a href="add-account.php"><i class="glyphicon glyphicon-cog deactive"></i> <span>Add Accounts</span></a></li>-->
        <li><a href="register-user.php"><i class="glyphicon glyphicon-user"></i> <span>Register User</span></a></li>
        <li><a href="loginform.php?action=logout"><i class="glyphicon glyphicon-log-out"></i><span>Log Out</span></a></li>
      </ul>
      <div class="infosummary">
  <h5 class="sidebartitle">Last Updated</h5>
  <ul>
      <li>
          <div class="datainfo">
              <span class="text-muted">Adwords Data</span>
              <h4><?php echo querydb('select report_date date from adwords_cost order by report_date desc limit 1;')[0]->date; ?></h4>
          </div>
      </li>
      <li>
          <div class="datainfo">
              <span class="text-muted">Kochava Data</span>
              <h4><?php echo querydb('select date(eve_date) date from kochava_runeguardian_event_launch order by eve_date desc limit 1;')[0]->date; ?></h4>
          </div>
      </li>
      <li>
          <div class="datainfo">
              <span class="text-muted">Fyber Data</span>
              <h4><?php echo querydb('select report_date date from fyber_statistics_endpoint_adnetwork order by report_date desc limit 1;')[0]->date; ?></h4>
          </div>
      </li>
  </ul>
</div><!-- infosummary -->


    </div><!-- leftpanelinner -->
  </div><!-- leftpanel -->

  <div class="mainpanel">

    <div class="headerbar">

      <a class="menutoggle"><i class="fa fa-bars"></i></a>

      <div class="header-right">
      </div><!-- header-right -->

    </div><!-- headerbar -->
