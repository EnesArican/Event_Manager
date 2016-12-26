<?php
/**
 * Created by PhpStorm.
 * User: enes
 * Date: 26/12/2016
 * Time: 18:19
 */



require_once "classes/table_builder.php";


//_init();  --> problem when connection is made to SQL for some reason
main();

function _init( ){
    $username = "project";
    $password = "root";

    $connect = new sql_connector();
    $connect->connect($username,$password);
}


function main(){

    global $SID;
    $dbh = $SID['dbh'];

    $event_id = $_GET{'event_id'};
    $user_id = 1; //for now (should get from global variable e.g SID)

    echo "HEllO  ";
    echo $event_id;

    /*
    $f = new SQL_query_builder();
    $result = $f->book_ticket_query($dbh, $event_id, $user_id);  //result is boolean

    //Check if any result is returned
   if ($result == TRUE)echo "DONE";

    */
}