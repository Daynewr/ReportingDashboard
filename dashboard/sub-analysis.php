<?php
    include('header.php');
 ?>
    <div class="pageheader">
      <h2><i class="fa fa-home"></i> CPA Analysis Data <span>CPA data overview</span></h2>
      <div class="breadcrumb-wrapper">
        <span class="label">You are here:</span>
        <ol class="breadcrumb">
          <li><a href="index.html">SPYR Games</a></li>
          <li class="active">CPA Analysis Data</li>
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
            <h3>CPA Data (date)</h3>
            <div><p></p></div>
            <br />
            <div class="table-responsive">
            <table class="table table-striped table-data">
                <?php createTableDataSQL('CALL DASH_CPA_Date('.$_SESSION["game"].', "'.$_SESSION["start_date"].'" , "'.$_SESSION["end_date"].'");'); ?>
            </table>
          </div>
        </div><!-- panel-body -->
      </div>
    </div><!-- contentpanel -->
  </section>

<?php include('footer-user.php'); ?>
