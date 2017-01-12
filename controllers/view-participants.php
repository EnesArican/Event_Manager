<?php
/**
 * Created by PhpStorm.
 * User: enes
 * Date: 01/01/2017
 * Time: 16:56
 */

require_once "../classes/sql_connector.php";
require_once "../classes/table_builder.php";
require_once "../classes/search_query_builder.php";

header("content-type: html");
$event_id = $_REQUEST["event_id"];


$sql = init();
main($sql, $event_id);

function init( ){
    $username = "project";
    $password = "root";

    $sql = new sql_connector();
    $sql->connect($username,$password);

    return $sql;
}

function main($sql, $event_id){

    $query = "SELECT events.event_name AS 'event_name',
              user_info.username AS 'participants'
              FROM bookings 
              INNER JOIN user_info
              ON bookings.user_id = user_info.id
              INNER JOIN events
              ON events.id = bookings.event_id
              WHERE bookings.event_id = ".$event_id;


    $result = $sql->execute_select_query($query);
    //$result is returned sql data

    //Check if any result is returned
    if ($result->rowCount() > 0)  {

        $display = make_list($result);
        echo $display;
    }
    else{
        echo("Nobody has booked this event");
    }

}



function make_list($result){

    $result ->setFetchMode(PDO::FETCH_ASSOC);

    $list ="<ul>";

    foreach($result as $r) {
        $list .= "<li>" . $r['participants'] . "</li>";
        $event_name = $r['event_name'];
    }

    $list .= "<ul>";
    $title = "<h2>Participants for ".$event_name."</h2>\n";

    $display = $title.$list;

    return $display;

}





















