<?php
    include('header.php');
 ?>


    <div class="pageheader">
      <h2><i class="fa fa-home"></i> Dashboard <span>All data overview</span></h2>
      <div class="breadcrumb-wrapper">
        <span class="label">You are here:</span>
        <ol class="breadcrumb">
          <li><a href="index.html">SPYR Games</a></li>
          <li class="active">Dashboard</li>
        </ol>
      </div>
      <?php
        include('selection.php');
        $top_array = querydb('CALL DASH_main_top('.$_SESSION['game'].');');
      ?>
    </div>
    <div class="contentpanel">

      <div class="row">

        <div class="col-sm-6 col-md-3">
          <div class="panel panel-dark panel-stat">
            <div class="panel-heading">

              <div class="stat">
                <div class="row">
                  <div class="col-xs-4">
                    <img src="images/is-user.png" alt="" />
                  </div>
                  <div class="col-xs-8">
                    <small class="stat-label">Installs On <?php echo $top_array[0]->{'GooglePlay'} ?></small>
                    <h1><?php echo (!isset($top_array[0]->{'GooglePlay Installs'}) ? 'N/A' : $top_array[0]->{'GooglePlay Installs'}); ?></h1>
                  </div>
                </div><!-- row -->

                <div class="mb15"></div>
                <div class="row">
                  <div class="col-xs-6">
                    <small class="stat-label">Current Installs</small>
                    <h4><?php echo (!isset($top_array[0]->{'Current Installs'}) ? 'N/A' : $top_array[0]->{'Current Installs'}); ?></h4>
                  </div>
                  <div class="col-xs-6">
                    <small class="stat-label">Lifetime Installs</small>
                    <h4><?php echo (!isset($top_array[0]->{'Total Installs'}) ? 'N/A' : $top_array[0]->{'Total Installs'}); ?></h4>
                  </div>
                </div><!-- row -->
              </div><!-- stat -->

            </div><!-- panel-heading -->
          </div><!-- panel -->
        </div><!-- col-sm-6 -->

        <div class="col-sm-6 col-md-3">
          <div class="panel panel-primary panel-stat">
            <div class="panel-heading">

              <div class="stat">
                <div class="row">
                  <div class="col-xs-4">
                    <img src="images/is-document.png" alt="" />
                  </div>
                  <div class="col-xs-8">
                    <small class="stat-label">Clicks On <?php echo $top_array[0]->{'AdWords Most Recent'}; ?></small>
                    <h1><?php echo (!isset($top_array[0]->{'Clicks Most Recent'}) ? 'N/A' : $top_array[0]->{'Clicks Most Recent'}); ?></h1>
                  </div>
                </div><!-- row -->

                <div class="mb15"></div>

                <div class="row">
                  <div class="col-xs-4">
                    <small class="stat-label">Impressions</small>
                    <h4><?php echo (!isset($top_array[0]->{'Impressions Most Recent'}) ? 'N/A' : $top_array[0]->{'Impressions Most Recent'}); ?></h4>
                  </div>

                  <div class="col-xs-4">
                    <small class="stat-label">CTR %</small>

                    <h4><?php echo (!isset($top_array[0]->{'CTR Most Recent'}) ? 'N/A ' : $top_array[0]->{'CTR Most Recent'}); ?>%</h4>
                  </div>
                  <div class="col-xs-4">
                    <small class="stat-label">Uninstalls</small>
                    <h4><?php echo (!isset($top_array[0]->{'Uninstalls'}) ? 'N/A' : $top_array[0]->{'Uninstalls'}); ?></h4>
                  </div>
                </div><!-- row -->
              </div><!-- stat -->

            </div><!-- panel-heading -->
          </div><!-- panel -->
        </div><!-- col-sm-6 -->

        <div class="col-sm-6 col-md-3">
          <div class="panel panel-success panel-stat">
            <div class="panel-heading">

              <div class="stat">
                <div class="row">
                  <div class="col-xs-4">
                    <img src="images/is-money.png" alt="" />
                  </div>
                  <div class="col-xs-8">
                    <small class="stat-label">Revenue On <?php echo $top_array[0]->{'GooglePlay'}; ?></small>
                    <h1>$<?php echo (!isset($top_array[0]->{'Revenue Most recent'}) ? ' N/A' : $top_array[0]->{'Revenue Most recent'}); ?></h1>
                  </div>
                </div><!-- row -->

                <div class="mb15"></div>
                <div class="row">
                  <div class="col-xs-6">
                    <small class="stat-label">This Month</small>
                    <h4>$<?php echo (!isset($top_array[0]->{'Revenue This Month'}) ? ' N/A' : $top_array[0]->{'Revenue This Month'}); ?></h4>
                  </div>

                  <div class="col-xs-6">
                    <small class="stat-label">Last Month</small>
                    <h4>$<?php echo (!isset($top_array[0]->{'Revenue Last Month'}) ? ' N/A' : $top_array[0]->{'Revenue Last Month'}); ?></h4>
                  </div>
                </div><!-- row -->
              </div><!-- stat -->

            </div><!-- panel-heading -->
          </div><!-- panel -->
        </div><!-- col-sm-6 -->


        <div class="col-sm-6 col-md-3">
          <div class="panel panel-danger panel-stat">
            <div class="panel-heading">

              <div class="stat">
                <div class="row">
                  <div class="col-xs-4">
                    <img src="images/is-money.png" alt="" />
                  </div>
                  <div class="col-xs-8">
                    <small class="stat-label">Spend On <?php echo $top_array[0]->{'AdWords Most Recent'}; ?></small>
                    <h1>$<?php echo (!isset($top_array[0]->{'Spend Most Recent'}) ? ' N/A' : $top_array[0]->{'Spend Most Recent'}); ?></h1>
                  </div>
                </div><!-- row -->

                <div class="mb15"></div>

                <div class="row">
                  <div class="col-xs-6">
                    <small class="stat-label">This Month</small>
                    <h4>$<?php echo (!isset($top_array[0]->{'Spend This Month'}) ? ' N/A' : $top_array[0]->{'Spend This Month'}); ?></h4>
                  </div>

                  <div class="col-xs-6">
                    <small class="stat-label">Last Month</small>
                    <h4>$<?php echo (!isset($top_array[0]->{'Spend Last Month'}) ? ' N/A' : $top_array[0]->{'Spend Last Month'}); ?></h4>
                  </div>
                </div><!-- row -->

              </div><!-- stat -->

            </div><!-- panel-heading -->
          </div><!-- panel -->
        </div><!-- col-sm-6 -->
      </div><!-- row -->
      <div class="panel panel-default panel-morris">
        <div class="panel-heading">
          <h2 class="panel-title">Monthly Data</h2>
        </div><!-- panel-heading -->
        <div class="panel-body">
          <div class="row">
            <div class="col-md-6 mb30">
              <h5 class="subtitle"><?php echo ($_SESSION['game'] == 1 ? 'Google Installs/Uninstalls' : 'Apple Installs/Uninstalls'); ?></h5>
              <div id="line-chart" class="body-chart" style="height: 400px;"></div>
            </div>
            <div class="col-md-6 mb30">
              <h5 class="subtitle mb5">Spend VS Revenue</h5>
              <div id="bar-chart" style="width: 100%; height: 400px"></div>
            </div><!-- col-md-6 -->
          </div><!-- row -->
        </div><!-- panel-body -->
      </div><!-- panel -->

      <div class="contentpanel">
        <div class="panel panel-default">
          <div class="panel-body">
            <div class="clearfix mb30"></div>
            <h3>Cost by Country, by Campaign</h3>

            <div>
              <p>Ratio is CountryAcquiredUsers / TotalCampaignAcquiredUsers</p>
            </div>
            <br />
            <div class="table-responsive">
              <table class="table table-striped table-data">
                  <?php createTableDataSQL('CALL DASH_adwords_cost_by_country('.$_SESSION["game"].', "'.$_SESSION["start_date"].'" , "'.$_SESSION["end_date"].'");'); ?>
              </table>
            </div><!-- panel-body -->

      </div><!-- contentpanel -->

    </div><!-- mainpanel -->

  </section>



<?php include('footer-user.php'); ?>
