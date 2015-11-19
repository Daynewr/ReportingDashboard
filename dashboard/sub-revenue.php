<?php
    include('header.php');
 ?>
    <div class="pageheader">
      <h2><i class="fa fa-home"></i> Revenue Data <span>revenue overview</span></h2>
      <div class="breadcrumb-wrapper">
        <span class="label">You are here:</span>
        <ol class="breadcrumb">
          <li><a href="index.html">SPYR Games</a></li>
          <li class="active">Revenue Data</li>
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
            <h3>Fyber Revenue Totals</h3>
            <div><p></p></div>
            <br />
            <div class="table-responsive">
            <table class="table table-striped table-data">
                <?php createTableDataSQL('CALL DASH_fyber_revenue_total('.$_SESSION["game"].');'); ?>
            </table>
          </div>
        </div><!-- panel-body -->
      </div>
    </div><!-- contentpanel -->

    <div class="contentpanel">
        <div class="panel panel-default">
          <div class="panel-body">
            <div class="clearfix mb30"></div>
            <h3>Fyber Revenue By Network</h3>
            <div><p></p></div>
            <br />
            <div class="table-responsive">
            <table class="table table-striped table-data">
                <?php createTableDataSQL('CALL DASH_fyber_rev_totals_network('.$_SESSION["game"].');'); ?>
              </table>
              </div>
          </div><!-- panel-body -->
        </div>
      </div><!-- contentpanel -->

  <div class="contentpanel">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="clearfix mb30"></div>
          <h3>Fyber Revenue By Network (date)</h3>
          <div><p></p></div>
          <br />
          <div class="table-responsive">
          <table class="table table-striped table-data">
              <?php createTableDataSQL('CALL DASH_fyber_rev_totals_network_date('.$_SESSION["game"].');'); ?>
            </table>
            </div>
        </div><!-- panel-body -->
      </div>
    </div><!-- contentpanel -->
  </section>

  </section>

<?php include('footer-user.php'); ?>
