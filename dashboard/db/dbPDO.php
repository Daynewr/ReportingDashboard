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
//    FUNCTION TO CREATE TABLES         //
//                                      //

function createTableDataSQL($sqlcall){

  $results = querydb($sqlcall);
  $key = key($results[0]);

  $buffer  = "<thead><tr>";

  if($results && $results[0]->$key != NULL){
      //build up data from results
      foreach ($results[0] as $key => $value) { $buffer .="<th>".$key."</th>"; }
      $buffer .= "</tr></thead><tbody>";
      foreach($results as $obj_set) { $buffer .= "<tr>";
        foreach($obj_set as $row => $item){ $buffer .="<td id='$row'>".$item."</td>";}
        $buffer .="</tr>";
      }
      $buffer .= "</tbody>"; //Close the table in HTML

  } else {
      $buffer .= "<th></th></tr></thead><tbody><tr><p style='color:#EE0A15'>NO DATA AVAILABLE.  PLEASE SELECT NEW DATE RANGE OR NEW GAME.</p></tr></tbody>";
  }
  //$key = key($results[0]);
  //var_dump($key);
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
