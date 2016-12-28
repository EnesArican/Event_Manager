<?php
/**
 * Created by PhpStorm.
 * User: enes
 * Date: 26/12/2016
 * Time: 18:19
 */

header("Content-type: text/plain");

require_once "classes/table_builder.php";
require_once "classes/sql_connector.php";
require_once "classes/ticket_booker.php";


$sql = init();
main($sql);

function init(){
    $username = "project";
    $password = "root";

    $connect = new sql_connector();
    $connect->connect($username,$password);

    return $connect;
}


function main($sql){

    $event_id = $_GET{'event_id'};
    $user_id = 1; //for now (should get from global variable e.g SID)

    $booker = new ticket_booker();

    //Check if ticket has already been booked by user
    $check = $booker->already_booked($sql,$event_id,$user_id);

    if ($check == true){  // User already has the event booked
        die("A booking has already been made for this event");
    }else{
        // Book ticket -> update sql tables
        $booker->book_ticket($sql,$event_id,$user_id);
        echo "Event has been booked";
    }
}