<?php

global $SID;


require_once "../classes/sql_connector.php";
require_once "../classes/table_builder.php";
require_once "../classes/search_query_builder.php";


header("content-type: html");
$sql = init();
main($sql);

function init( ){

    $username = "project";
    $password = "root";

    $sql = new sql_connector();
    $sql->connect($username,$password);

    return $sql;
}


function main($sql){
        // print_r($_REQUEST['keyword']); //gets keyword  --> For Testing/Debugging

    $f = new SQL_query_builder();
    $query = $f->make_search_page_query($_REQUEST);

    $result = $sql->execute_select_query($query);
    //$result is returned sql data

    //Check if any result is returned
    if ($result->rowCount() > 0)  {
        $search_results = new table_builder($result);
        $display = $search_results ->make_table();

        echo $display;
    }
}









