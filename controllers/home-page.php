<?php

session_start();

require_once "../classes/sql_connector.php";
require_once "../classes/table_builder.php";
require_once "../classes/search_query_builder.php";

header("content-type: html");

$user_id = $_SESSION['user_id'];

$sql = init();
main($sql, $user_id);

function init( ){
    $username = "project";
    $password = "root";

    $sql = new sql_connector();
    $sql->connect($username,$password);

    return $sql;
}

function main($sql, $user_id){

    if($_REQUEST["btn_id"] == "btn-booked-events") {
       $query = booked_events_query($user_id);
    }

    if($_REQUEST["btn_id"] == "btn-hosted-events") {
        $query = hosted_events_query($user_id);
    }


    $result = $sql->execute_select_query($query);
    //$result is returned sql data

    //Check if any result is returned
    if ($result->rowCount() > 0)  {
        $search_results = new table_builder($result);
        $display = $search_results ->make_table();

        echo $display;
    }else{no_results_returned();}
}


function booked_events_query($user_id){

    $query = "SELECT events.event_name AS 'Event', user_info.username AS 'Host', 
                   category.type AS 'Category' , events.description AS 'Description',
                   events.location AS 'Location',
                   DATE_FORMAT(events.date_time,'%d-%m-%y') AS 'Date',
                   events.price as 'Price'
                   FROM events
                   INNER JOIN user_info
                   ON events.host_id = user_info.id
                   INNER JOIN category
                   ON events.category_id = category.id
		   INNER JOIN bookings
                   ON events.id = bookings.event_id
                   WHERE bookings.user_id = ".$user_id;


    return $query;
}


function hosted_events_query($user_id){

    $query = "SELECT events.event_name AS 'Event', category.type AS 'Category' ,
                   events.location AS 'Location',
                   DATE_FORMAT(events.date_time,'%d-%m-%y') AS 'Date',
                   events.price AS 'Price',
		           DATE_FORMAT(events.sale_end_date, '%d-%m-%y') AS 'Sale Ends',
		           events.no_of_tickets AS 'No of Tickets',
		           events.remaining_tickets AS 'Remaining_tickets',
		           events.id AS 'participants'							
                   FROM events
                   INNER JOIN category
                   ON events.category_id = category.id
                   WHERE events.host_id = ".$user_id;

    return $query;
}

function no_results_returned(){

    if($_REQUEST["btn_id"] == "btn-booked-events") {
        echo "No events have been booked";
    }

    if($_REQUEST["btn_id"] == "btn-hosted-events") {
        echo "no events have been hosted";
    }


}






