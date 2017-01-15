<?php
/**
 * Created by PhpStorm.
 * User: enes
 * Date: 15/01/2017
 * Time: 11:39
 */

session_start();

require_once "../classes/sql_connector.php";

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
    if (isset ($_SESSION['username'])){
        $user_id = $_SESSION['user_id'];
        get_events($sql, $user_id);
    }else{echo "Not logged in";}
}




function get_events($sql, $user_id){

    $query = "SELECT events.event_name FROM events 
              INNER JOIN bookings
              ON events.id = bookings.event_id
              WHERE bookings.user_id = ".$user_id.
              " AND events.date_time <= CURDATE();";



    $result = $sql->execute_select_query($query);
    //$result is returned sql data

    //Check if any result is returned
    if ($result->rowCount() > 0)  {

        $display = make_dropdown($result);

        echo $display;
    }else{
        echo "<strong>You have not attended any events</strong>";
    }
}


function make_dropdown($result){

    $result ->setFetchMode(PDO::FETCH_ASSOC);

    $option = "<select name='event_name'>";
    foreach ($result as $item) {
        $name = $item['event_name'];
        $option .= "<option>".$name."</option>";
    }
    $option .= "</select>";
    return $option;
}











