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

    $query = "SELECT user_info.username AS 'Participants' FROM bookings 
              INNER JOIN user_info
              ON bookings.user_id = user_info.id
              WHERE bookings.event_id = ".$event_id;


    $result = $sql->execute_select_query($query);
    //$result is returned sql data

    //Check if any result is returned
    if ($result->rowCount() > 0)  {


        //$search_results = new table_builder($result);
        //$display = $search_results ->make_table();
        //echo $display;

        $result ->setFetchMode(PDO::FETCH_ASSOC);

        $display = "<h2>Participants</h2>\n";
        $display .="<ul>";

        foreach($result as $r) {
            $display .= "<li>" . $r['Participants'] . "</li>";
        }

        $display .= "<ul>";

        echo $display;

    }

}





















