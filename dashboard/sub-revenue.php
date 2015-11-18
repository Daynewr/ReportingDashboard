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
      <!--select game for specific data-->
      <div style="margin-top: 20px;" class="styled-select">
        <select>
          <option value="runeguardian_android">RuneGuardian Android</option>
          <option value="runeguardian_ios">RuneGuardian iOS</option>
          <option value="plucky_rush_android">Pucky Rush Android</option>
          <option value="pluckyrush_ios">Plucky Rush iOS</option>
        </select>
      </div>
    <!-- end select-->
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
                <?php createTableDataSQL('CALL DASH_fyber_revenue_total(1);'); ?>
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
                <?php createTableDataSQL('CALL DASH_fyber_rev_totals_network(1);'); ?>
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
              <?php createTableDataSQL('CALL DASH_fyber_rev_totals_network_date(1);'); ?>
            </table>
            </div>
        </div><!-- panel-body -->
      </div>
    </div><!-- contentpanel -->
  </section>

  </section>

<?php include('footer-user.php'); ?>
