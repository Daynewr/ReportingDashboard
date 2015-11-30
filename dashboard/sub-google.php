<?php
    include('header.php');
 ?>
    <div class="pageheader">
      <h2><i class="fa fa-home"></i> Google Data <span>google data overview</span></h2>
      <div class="breadcrumb-wrapper">
        <span class="label">You are here:</span>
        <ol class="breadcrumb">
          <li><a href="index.html">SPYR Games</a></li>
          <li class="active">Google Data</li>
        </ol>
      </div>
      <?php include('selection.php'); ?>
    </div>
    <!-- end page header -->

    <!-- table content -->
    <section>

    <div class="contentpanel">
        <div class="panel panel-default">
          <div class="panel-body">
            <div class="clearfix mb30"></div>
            <h3>Google User/Device Installs</h3>
            <div><p></p></div>
            <br />
            <div class="table-responsive">
            <table class="table table-striped table-data">
              <?php createTableDataSQL('CALL DASH_google_overview_date('.$_SESSION["game"].', "'.$_SESSION["start_date"].'" , "'.$_SESSION["end_date"].'");'); ?>
            </table>
          </div>
        </div><!-- panel-body -->
      </div>
    </div><!-- contentpanel -->

    <div class="contentpanel">
        <div class="panel panel-default">
          <div class="panel-body">
            <div class="clearfix mb30"></div>
            <h3>Google User/Device Installs</h3>
            <div><p></p></div>
            <br />
            <div class="table-responsive">
            <table class="table table-striped table-data">
              <?php createTableDataSQL('CALL DASH_google_country_date('.$_SESSION["game"].', "'.$_SESSION["start_date"].'" , "'.$_SESSION["end_date"].'");'); ?>
            </table>
          </div>
        </div><!-- panel-body -->
      </div>
    </div><!-- contentpanel -->

  </section>

<?php include('footer-user.php'); ?>
