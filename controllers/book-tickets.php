<?php
/**
 * Created by PhpStorm.
 * User: enes
 * Date: 26/12/2016
 * Time: 18:19
 */

session_start();

header("Content-type: text/plain");

require_once "../classes/table_builder.php";
require_once "../classes/sql_connector.php";
require_once "../classes/ticket_booker.php";




check();



function check(){
   if(isset($_SESSION['user_id'])){
       $user_id = $_SESSION['user_id'];
       $sql = init();
       main($sql, $user_id);

   }
    else{
    
      echo("Please Log In");
 
    
}
   
}



function init(){
    $username = "project";
    $password = "root";

    $connect = new sql_connector();
    $connect->connect($username,$password);

    return $connect;
}


function main($sql, $user_id){

    $event_id = $_GET{'event_id'};

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


function send(){
  $mail=$_SESSION['user_email'];
$to = "$mail";
$subject = "Your Event Is Coming Soon";
$message = "Your event ".$event."is coming soon. Do forget to attend!";
$from = "wangshenbao.ben@gmail.com";
$headers = "From: $from";
mail($to,$subject,$message,$headers);

// send a email//



}
    

    
    
    
