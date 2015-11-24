<?php
//////////////////////////////////////////
//                                      //
//        INTERACT WITH GOOGLE          //
//        INSTALL TABLE                 //
//                                      //

// INSTALL CHART
//query table data get_google_overview_chart(game_id, result_amount)

$q_table3 = $db->prepare('CALL get_google_overview_chart('.$_SESSION['game'].',30);');
$q_table3->execute();
$results_gplayinstalls = $q_table3->fetchAll(PDO::FETCH_CLASS);

//convert results_gplayinstalls into an JSON object for JS usage
$results_gplayinstalls_JSON = json_encode($results_gplayinstalls);

// SPEND VS REVENUE CHART
//get spend and revenue daily number get_spend_rev_data(game_id);
if(!isset($_SESSION['game'])) {
  $q_table3 = $db->prepare('call get_spend_rev_data(1);');
}else {
  $q_table3 = $db->prepare('call get_spend_rev_data('.$_SESSION['game'].');');
}
$q_table3->execute();
$results_spend_rev_chart = $q_table3->fetchAll(PDO::FETCH_CLASS);

$results_spend_rev_chart_JSON = json_encode($results_spend_rev_chart);
?>
