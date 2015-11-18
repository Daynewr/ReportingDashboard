<?php
    include('header.php');
 ?>
    <div class="pageheader">
      <h2><i class="fa fa-home"></i> Cost Data <span>cost data overview</span></h2>
      <div class="breadcrumb-wrapper">
        <span class="label">You are here:</span>
        <ol class="breadcrumb">
          <li><a href="index.html">SPYR Games</a></li>
          <li class="active">Cost Data</li>
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
            <h3>Adwords Cost Totals (lifetime)</h3>
            <div><p></p></div>
            <br />
            <div class="table-responsive">
            <table class="table table-striped table-data">
                <?php createTableDataSQL('CALL DASH_adwords_totals_all(1);'); ?>
            </table>
          </div>
        </div><!-- panel-body -->
      </div>
    </div><!-- contentpanel -->

    <div class="contentpanel">
        <div class="panel panel-default">
          <div class="panel-body">
            <div class="clearfix mb30"></div>
            <h3>Adwords Cost Totals (date)</h3>
            <div><p></p></div>
            <br />
            <div class="table-responsive">
            <table class="table table-striped table-data">
                <?php createTableDataSQL('CALL DASH_adwords_totals_date(1);'); ?>
              </table>
              </div>
          </div><!-- panel-body -->
        </div>
      </div><!-- contentpanel -->

  <div class="contentpanel">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="clearfix mb30"></div>
          <h3>Adwords Cost by Ad (lifetime)</h3>
          <div><p></p></div>
          <br />
          <div class="table-responsive">
          <table class="table table-striped table-data">
              <?php createTableDataSQL('CALL DASH_adwords_by_ad_totals(1);'); ?>
            </table>
            </div>
        </div><!-- panel-body -->
      </div>
    </div><!-- contentpanel -->

    <div class="contentpanel">
        <div class="panel panel-default">
          <div class="panel-body">
            <div class="clearfix mb30"></div>
            <h3>Adwords Cost by Ad (date)</h3>
            <div><p></p></div>
            <br />
            <div class="table-responsive">
            <table class="table table-striped table-data">
                <?php createTableDataSQL('CALL DASH_adwords_by_ad_date(1);'); ?>
              </table>
              </div>
          </div><!-- panel-body -->
        </div>
      </div><!-- contentpanel -->

      <div class="contentpanel">
          <div class="panel panel-default">
            <div class="panel-body">
              <div class="clearfix mb30"></div>
              <h3>Adwords Cost by Ad + Ad Id (date)</h3>
              <div><p></p></div>
              <br />
              <div class="table-responsive">
              <table class="table table-striped table-data">
                  <?php createTableDataSQL('CALL DASH_adwords_by_ad_date_id(1);'); ?>
                </table>
                </div>
            </div><!-- panel-body -->
          </div>
        </div><!-- contentpanel -->
  </section>

<?php include('footer-user.php'); ?>
