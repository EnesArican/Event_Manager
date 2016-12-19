<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <link rel="stylesheet" href="test.css">
  </head>

  <body>


<?php








define("DBENGINE", "mysql");
define("MYSQLUSER", "sid");
define("MYSQLPASS", "root");



global $SID;

$SID["CONTENT"] = "";
$SID["CATEGORY"] ="";


// connect to the database (persistent)
$database = 'Event_Manager';

try {
  switch(DBENGINE) {
    case 'mysql':
      $dbh = new PDO('mysql:host=localhost;dbname=' . $database, MYSQLUSER, MYSQLPASS,
          array( PDO::ATTR_PERSISTENT => true ));
      break;
    default:
      error('unsupported DBENGINE: ' . DBENGINE);
  }
} catch (PDOException $e) {
  error("Error while constructing PDO object: " . $e->getMessage());
}

if($dbh) {
  // set exception mode for errors
  // this is far more portable for different DB engines than trying to
  // parse error codes
  $dbh->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
  $SID['dbh'] = $dbh;
} else {
  exit();
}

try {
  $result = $dbh->query("SELECT*FROM user_info");
} catch (PDOException $e) {
  error_message($e->getMessage());
  return;
}

//          GENERATE TABLE CODE
//############################################################

require_once "../classes/table_builder.php";

if ($result->rowCount() > 0)             //Check if any result is returned

$result ->setFetchMode(PDO::FETCH_ASSOC); //sorts data into associative array

$row = $result->fetch();                 //gets the 1st row of data

$f = new table_builder($row, $result);

$display = $f ->make_table();

echo $display;


//###############################################################
/*
 $columns = array_keys($row);              //puts column names into array
$header = table_header($columns);         //generates table header
$column_count = count($columns);          //counts number of columns
$first_row = table_row($row, $columns,$column_count);   //generates first row
$all_rows = "";
foreach ($result as $r){                //loop through rest of rows row
  $all_rows .= table_row($r, $columns,$column_count);
}
$display = "<table class=\"table\" cellspacing='0'>\n";
$display .=$header.$first_row.$all_rows;
$display .="</table>";
*/
















//$CC = array_keys($row);
//print_r($CC);
//$SID["CONTENT"] .= $CC[1];







//#################################################################



function table_header($columns){
  $header = "<thead><tr>\n";
 foreach ($columns as $c){
$header .= "<th>$c</th>";
 }
 $header .= "</tr></thead>";
  return $header;
}



function table_row($data, $columns,$count){

  $t_row = "<tr>";

  for($i = 0; $i < $count; $i++){

      $v = $data[$columns[$i]];

     $t_row .=  "<td>$v</td>";
  }

  $t_row .= "</tr>";

  return $t_row;
}


  echo $SID["CONTENT"];



?>



  </body>
</html>
