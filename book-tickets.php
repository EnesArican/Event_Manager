<?php
/**
 * Created by PhpStorm.
 * User: enes
 * Date: 26/12/2016
 * Time: 18:19
 */


require_once "classes/table_builder.php";

header("content-type: html");

_init();
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


    $f = new SQL_query_builder();
    $result = $f->book_ticket_query($dbh);

    //$result is returned sql query

    //Check if any result is returned
    if ($result->rowCount() > 0)  {
        $search_results = new table_builder($result);
        $display = $search_results ->make_table();

        echo $display;
    }
}