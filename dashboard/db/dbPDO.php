<?php

  error_reporting(E_ALL);
  ini_set('display_errors', 1);
  //setup new PDO class
  if(!$db) {
    $db = new PDO('mysql:host=localhost;dbname=spyrgdb;charset=utf8', 'root', '');
    //$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }

////////////////////////////////////////
//                                    //
//    INTERACT WITH API TABLE         //
//                                    //
   //query all table collumn headers
   $q_table1 = $db->prepare('DESCRIBE kochava');
   $q_table1->execute();
   $col_table1 = $q_table1->fetchAll(PDO::FETCH_COLUMN);

   //query all table data
   $results_table1 = $db->query('SELECT * FROM kochava');

  // SWITCH STATEMENT TO DETERMING SQL FUNCTIONS TO EXECUTE //
  $fn = $_POST['fn'];

  switch ($fn) {
    case "update":
        updateRecord($db);
        break;
    case "add":
        addRecord($db);
        break;
    case "delete":
        deleteRecord($db);
        break;
    case "end":
        mysql_close($connect);
        break;
    case "delete-user":
        deleteUser();
        break;
  }

 // FUNCTIONS TO EXECUTE IN SWITCH STATEMENT //

 //create record function
 function updateRecord($db){
   $id    = $_POST['id'];
   $input = $_POST['input'];

   $subId = strtok($id, '-');
   $col = substr($id, strpos($id, '-') + 1);

   $query = $db->prepare("UPDATE kochava SET ".$col."=:value where Id=:id");
   $query->bindValue(':id', $subId);
   $query->bindValue(':value', $input);
   $query->execute();

    echo $input;

 }

 //update record function
 function addRecord($db){
   $query = $db->query("INSERT INTO kochava VALUES(NULL,NULL,NULL,NULL)");

   echo $query;
 }

 //delete record function
 function deleteRecord($db) {
   $id = $_POST['id'];
   $rowId = strtok($id, '-');

   $query = $db->query("DELETE FROM kochava WHERE Id=$rowId");
 }

 //delete user from .db
 function deleteUser(){
   $user   = $_POST['id'];
   $dbfile = new SQLite3('../users.db');
   $delete = $dbfile->exec("DELETE FROM users WHERE user_id = $user");
   $dbfile->close();
 }

//////////////////////////////////////////
//                                      //
//        INTERACT WITH GOOGLE          //
//        INSTALL TABLE                 //
//                                      //

//query table data get_google_overview_chart(game_id, result_amount)
// INSTALL CHART

$q_table3 = $db->prepare('CALL get_google_overview_chart(1,30);');
$q_table3->execute();
$results_gplayinstalls = $q_table3->fetchAll(PDO::FETCH_CLASS);

//convert results_gplayinstalls into an JSON object for JS usage
$results_gplayinstalls_JSON = json_encode($results_gplayinstalls);


//query table data get_spend_for_period(game_id, start_date, end_date)
//SPEND REV CHART
$q_table3 = $db->prepare('call get_spend_for_period(1, "2015-10-01", "2015-10-31");');
$q_table3->execute();
$results_spend_period = $q_table3->fetchAll(PDO::FETCH_CLASS);

//query table data get_rev_for_period(game_id, start_date, end_date)
$q_table3 = $db->prepare('call get_rev_for_period(1, "2015-10-01", "2015-10-31");');
$q_table3->execute();
$results_rev_period = $q_table3->fetchAll(PDO::FETCH_CLASS);


//convert results_gplayinstalls into an JSON object for JS usage
//$results_gplayinstalls_JSON = json_encode($results_gplayinstalls);


//query table for install/unistall totals  get_todays_google_totals(game_id, date)
$today = date("Y-m-d");
$yesterday = date("Y-m-d", time() - 60 *  60 *  24);

$d = new DateTime('first day of this month');
$first_day_month = $d->format('Y-m-d');

$d = new DateTime('first day of last month');
$first_day_last_month = $d->format('Y-m-d');

$q_table3 = $db->prepare('call get_todays_google_totals(1,"'.$today.'");');
$q_table3->execute();
$results_gplayinstalls_top = $q_table3->fetchAll(PDO::FETCH_CLASS);

//get impressions and spend get_singleday_impressions_spend(game_id, date)
$q_table3 = $db->prepare('call get_singleday_impressions_spend(1,"2015-10-28");');
$q_table3->execute();
$results_impr_spend = $q_table3->fetchAll(PDO::FETCH_CLASS);


//get spend and revenue daily number get_spend_rev_data(game_id, start_date, end_date);
$q_table3 = $db->prepare('call get_spend_rev_data(1, "2015-10-01", "2015-10-31");');
$q_table3->execute();
$results_spend_rev_chart = $q_table3->fetchAll(PDO::FETCH_CLASS);

$results_spend_rev_chart_JSON = json_encode($results_spend_rev_chart);


//function to get yesterday revenue
function getYesterdayRevenue($results){
foreach($results as $spend_date){
    if($spend_date->y == $yesterday){
        echo $spend_date->a;
        break;
      }
    };
}

//function to get last month revenue
function getLastMonthRevenue($results){
  $total_rev = 0;
  foreach($results as $spend_date){
    if($spend_date->y < $first_day_month && $spend_date->y >= $first_day_last_month){
      $total_rev += $spend_date->a;
    }
  }
  echo $total_rev;
}

//function to get this months revenue
function getThisMonthRevenue($results){
  $total_rev = 0;
  foreach($results as $spend_date){
    if($spend_date->y >= $first_day_month){
      $total_rev += $spend_date->a;
    }
  }
  echo $total_rev;
}

//function to get last months spend
function getLastMonthSpend($results){
  $total_spend = 0;
  foreach($results as $spend_date){
    if($spend_date->y < $first_day_month && $spend_date->y >= $first_day_last_month){
      $total_spend += $spend_date->b;
    }
  }
  echo $total_spend;
}

//function to get this months spend
function getThisMonthSpend($results){
  $total_spend = 0;
  foreach($results as $spend_date){
    if($spend_date->y >= $first_day_month){
      $total_spend += $spend_date->b;
    }
  }
  echo $total_spend;
}

//////////////////////////////////////////
//                                      //
//    INTERACT WITH GAME TABLE          //
//                                      //
/*
//query all table collumn headers
$q_table2 = $db->prepare('DESCRIBE RuneGuardian');
$q_table2->execute();
$col_table2 = $q_table2->fetchAll(PDO::FETCH_COLUMN);

//query all table data
$q_table2 = $db->prepare('SELECT * FROM RuneGuardian');
$q_table2->execute();
$results_table2 = $q_table2->fetchAll();

//creates table for dashboard
function expandData($table, $col) {
  $buffer = "<tbody>"; // start a table tag in the HTML
  foreach($table as $row) {   //Creates a loop to loop through results
        $buffer .= "<tr><td id='$row[0]-$col[1]'>"
              .$row[1]
              ."</td><td id='$row[0]-$col[4]'>"
              .$row[4]
              ."</td><td id='$row[0]-$col[5]'>"
              .$row[5]
              ."</td><td id='$row[0]-$col[6]'>"
              .$row[6]
              ."</td><td id='$row[0]-$col[7]'>"
              .$row[7]
              ."</td><td id='$row[0]-$col[8]'>"
              .$row[8]
              ."</td><td id='$row[0]-$col[12]'>"
              ."$".$row[12]
              ."</tr>";
      }
    $buffer .= "</tbody>"; //Close the table in HTML
    echo $buffer;
}

// FUNCTIONS TO CREATE SIDEBAR DASHBOARD DATA FOR WEEKLY TOTALS //

//set weekly dates
$startOfWeek = date('Y-m-d',strtotime('last sunday'));
$today = date("Y-m-d");

//query weekly data for sidebar
$q_table2 = $db->prepare('SELECT * FROM RuneGuardian WHERE click_date >= "'.$startOfWeek.'" and click_date <= "'.$today.'"');
$q_table2->execute();
$results_weekly = $q_table2->fetchAll();

//gets total installs for week to date
function sidebarTotalInstalls($table) {
  $totalInstalls = 0;
  foreach($table as $row){
    $totalInstalls += $row[8];
  }
  return $totalInstalls;
}

//gets total clicks for week to date
function sidebarTotalClicks($table){
  $totalClicks = 0;
  foreach($table as $row){
    $totalClicks += $row[7];
  }
  return $totalClicks;
}

//gets total ad spend for week to date
function sidebarTotalAdSpend($table){
  $totalAdSpend = 0;
  foreach($table as $row){
    $totalAdSpend += $row[12];
  }
  return $totalAdSpend;
}
*/



?>
