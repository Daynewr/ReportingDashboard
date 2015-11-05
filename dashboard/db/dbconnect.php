<?php
//connect to database and load table
  $connect = mysql_connect('localhost', 'root', 'root');
  if (!$connect) {
      die('Could not connect to MySQL server: ' . mysql_error());
  }
  $dbname = 'SPYRgames';
  $db_selected = mysql_select_db($dbname, $connect);
  if (!$db_selected) {
      die("Could not set $dbname: " . mysql_error());
  }
  //column name
  $res = mysql_query('select * from Kochava', $connect);
  //row data
  $results = mysql_query("SELECT * FROM Kochava");

  $col1 = mysql_field_name($res, 1);
  $col2 = mysql_field_name($res, 2);
  $col3 = mysql_field_name($res, 3);
  $col4 = mysql_field_name($res, 4);
  $col5 = mysql_field_name($res, 5);

// Detemines what function to execute based on user actions //
$fn = $_POST['fn'];

switch ($fn) {
  case "update":
      updateRecord();
      break;
  case "add":
      addRecord();
      break;
  case "delete":
      deleteRecord();
      break;
  case "end":
      mysql_close($connect);
      break;
}


//create record function
function updateRecord(){
  $id    = $_POST['id']; //3-account_number
  $input = $_POST['input'];

  if(!$id || !$input){
      die('{no value received}');
  }

  $subid = strtok($id, '-');
  $col = substr($id, strpos($id, '-') + 1);

  if(!$col){
    die('{Did not receive correct database column}');
  }


  $query = mysql_query("UPDATE Kochava SET $col='$input' WHERE Id=$subid;");

   if(!$query){
     die('{Unable to write to database}');
   }

  echo $input;
}

//update record function
function addRecord(){
  $query = mysql_query("INSERT INTO Kochava VALUES(NULL,NULL,NULL,NULL,NULL,NULL);");

  echo $query;
}

//delete record function
function deleteRecord() {
  $id = $_POST['id'];
  $rowId = strtok($id, '-');

  $query = mysql_query("DELETE FROM Kochava WHERE Id=$rowId;");
}
