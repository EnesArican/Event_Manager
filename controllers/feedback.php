<?php
/**
 * Created by PhpStorm.
 * User: enes
 * Date: 14/01/2017
 * Time: 21:11
 */


session_start();

require_once "../classes/sql_connector.php";
require_once "../classes/feedback_list_builder.php";

//comment out for now
//header("content-type: html");

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


  $query = "SELECT * FROM feedback";

    $result = $sql->execute_select_query($query);
    //$result is returned sql data

    //Check if any result is returned
    if ($result->rowCount() > 0)  {

        $feedback = new feedback_list_builder($result);
        $display = $feedback ->make_feedback_list();

        echo $display;
    }else{
        echo "No feedback to display at the moment";
    }
}










