<?php

  include('dbPDO.php');

/*
  $monday = strtotime('last monday', strtotime('tomorrow'));
  $startOfWeek = date('Y-m-d',strtotime('last sunday'));
  $today = date("Y-m-d");
  $today2 = date('Y-m-d', strtotime("today"));

  $yesterday = date("Y-m-d", time() - 60 *  60 *  24);

  echo $startOfWeek."<br/>";
  echo "yesterday: ".$yesterday."<br/>";
  echo $today."</br>";
  echo $today2;

  echo "<br/>";

  var_dump($results_gplayinstalls_top);
*/
//var_dump($results_spend_rev_chart);

//echo $results_spend_rev_chart[0]->y;
//echo $yesterday;
/*
$the_date = "2015-10-29";
foreach($results_spend_rev_chart as $spend_date){
  if($spend_date->y == $the_date){
    echo $spend_date->b;
    break;
  }
}
*/


echo $today;

//var_dump($results_spend_period);


//echo $results_impr_spend[0]->kochava_today_clicks;

//echo $results_impr_spend[0]->kochava_today_impressions;


//echo $results_gplayinstalls_JSON;

?>
