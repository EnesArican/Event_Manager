<?php

global $SID;


require_once "classes/sql_connector.php";
require_once "classes/table_builder.php";
require_once "classes/sql_query_builder.php";


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

        // print_r($_REQUEST['keyword']); //gets keyword  --> For Testing/Debugging
        //print_r($_REQUEST['category']); //gets cat
        //print_r($_REQUEST['date_from']); //gets date
        //print_r($_REQUEST['date_to']); //gets date


    $f = new SQL_query_builder();
    $result = $f->make_search_page_query($_REQUEST, $dbh);

    //$result is returned sql query

    //Check if any result is returned
    if ($result->rowCount() > 0)  {
        $search_results = new table_builder($result);
        $display = $search_results ->make_table();

        echo $display;
    }
}









