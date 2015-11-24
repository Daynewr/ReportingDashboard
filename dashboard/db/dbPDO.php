<?php

// Set initial game data ID on first page load
if(empty($_SESSION['game']) || !isset($_SESSION['game'])){
  $_SESSION['game'] = 1;
}


////////////////////////////////////////
//                                    //
//        SETTING DATE VARS           //
//                                    //

$today = date("Y-m-d");
$yesterday = date("Y-m-d", time() - 60 *  60 *  24);
$thirty_days_back = date('Y-m-d', strtotime('-30 days'));

$d = new DateTime('first day of this month');
$first_day_month = $d->format('Y-m-d');

$d = new DateTime('first day of last month');
$first_day_last_month = $d->format('Y-m-d');

////////////////////////////////////////
//                                    //
//      INITIAL DB CONNECTION         //
//                                    //

  error_reporting(E_ALL);
  ini_set('display_errors', 0);

  //setup new PDO class
  if(!$db) {
    $db = new PDO('mysql:host=localhost;dbname=spyrgdb;charset=utf8', 'root', '');
    //$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }

 //////////////////////////////////////////
 //                                      //
 //        INTERACT WITH USER DB         //
 //                                      //
 //                                      //


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

// INSTALL CHART
//query table data get_google_overview_chart(game_id, result_amount)

$q_table3 = $db->prepare('CALL get_google_overview_chart(1,30);');
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


//////////////////////////////////////////
//                                      //
//    FUNCTION TO CREATE TABLES         //
//                                      //

function createTableDataSQL($sqlcall){

  $results = querydb($sqlcall);
  //build up data from results
  $buffer  = "<thead><tr>";
  foreach ($results[0] as $key => $value) { $buffer .="<th>".$key."</th>"; }
  $buffer .= "</tr></thead><tbody>";
  foreach($results as $obj_set) { $buffer .= "<tr>";
    foreach($obj_set as $row => $item){ $buffer .="<td id='$row'>".$item."</td>";}
    $buffer .="</tr>";
  }
  $buffer .= "</tbody>"; //Close the table in HTML
      echo $buffer;
}

//simple query call
function querydb($sqlcall){
  if(!$db) {
    $db = new PDO('mysql:host=dev.spyrgames.com;port=3306;dbname=spyrgdb;charset=utf8', 'spyrgadm', '!7sHCa8c9as!sAd’');
  };

    //query table
    $q = $db->prepare($sqlcall);
    $q->execute();
    $results = $q->fetchAll(PDO::FETCH_CLASS);

  return $results;
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


//////////////////////////////////////////
//                                      //
//        FUNCTIONS TO EXECUTE          //
//        IN SWITCH STATEMENT           //
//                                      //

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


?>
