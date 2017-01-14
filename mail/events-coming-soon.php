<?php
/**
 * Created by PhpStorm.
 * User: enes
 * Date: 13/01/2017
 * Time: 23:53
 */


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
    find_events($sql);
}


function find_events($sql){

    $query = "SELECT id FROM events WHERE events.date_time = CURDATE()+4";

    $events = $sql->execute_select_query($query);


    //check if result has anything
    if ($events->rowCount() > 0)  {
        $events ->setFetchMode(PDO::FETCH_ASSOC);

        foreach($events as $e){
            $e = implode("",$e);
            print_r($e);
            find_user($e, $sql);
        }
    }
}


function find_user($event_id, $sql){

    $query = "SELECT user_info.email FROM user_info
              INNER JOIN bookings
              ON user_info.id = bookings.user_id
              WHERE event_id = ".$event_id;

    $user_mails = $sql->execute_select_query($query);


    if ($user_mails->rowCount() > 0)  {
        $user_mails ->setFetchMode(PDO::FETCH_ASSOC);

        foreach($user_mails as $u){
            $u = implode("",$u);
            print_r($u);
        }
    }

}