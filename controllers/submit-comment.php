<?php
/**
 * Created by PhpStorm.
 * User: enes
 * Date: 15/01/2017
 * Time: 14:01
 */

session_start();


require_once "../classes/sql_connector.php";

check();


function check(){
    if (isset($_SESSION['username'])) {
        $username = $_SESSION['username'];
        $sql = init();
        main($sql, $username);
    }
}
function init( ){

    $username = "project";
    $password = "root";

    $sql = new sql_connector();
    $sql->connect($username,$password);

    return $sql;
}

function main($sql, $username){

    $date = date("y-m-d");
    $event_name = $_REQUEST['event_name'];
    $rating = $_REQUEST['rating'];
    $comment = $_REQUEST['comment'];


    $query = "INSERT INTO  feedback ( date, username, event_name, rating, comment)
              VALUES('$date', '$username', '$event_name', '$rating', '$comment')";

    $sql->execute_CRUD_query($query);
}













