<?php
    include('header.php');
 ?>
    <div class="pageheader">
      <h2><i class="fa fa-home"></i> Kochava Data <span>kochava data overview</span></h2>
      <div class="breadcrumb-wrapper">
        <span class="label">You are here:</span>
        <ol class="breadcrumb">
          <li><a href="index.html">SPYR Games</a></li>
          <li class="active">Kochava Data</li>
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
            <h3>Kochava Installs by Country</h3>
            <div><p></p></div>
            <br />
            <div class="table-responsive">
            <table class="table table-striped table-data">
                <?php createTableDataSQL('CALL DASH_kochava_installs_country(1);'); ?>
            </table>
          </div>
        </div><!-- panel-body -->
      </div>
    </div><!-- contentpanel -->

  <div class="contentpanel">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="clearfix mb30"></div>
          <h3>Kochava Installs by Country (date)</h3>
          <div><p></p></div>
          <br />
          <div class="table-responsive">
          <table class="table table-striped table-data">
              <?php createTableDataSQL('CALL DASH_kochava_installs_country_date(1);'); ?>
            </table>
            </div>
        </div><!-- panel-body -->
      </div>
    </div><!-- contentpanel -->
  </section>

  <div class="contentpanel">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="clearfix mb30"></div>
          <h3>Kochava Installs by Country (creative)</h3>
          <div><p></p></div>
          <br />
          <div class="table-responsive">
          <table class="table table-striped table-data">
              <?php createTableDataSQL('CALL DASH_kochava_installs_country_creative(1);'); ?>
            </table>
            </div>
        </div><!-- panel-body -->
      </div>
    </div><!-- contentpanel -->
  </section>

<?php include('footer-user.php'); ?>
