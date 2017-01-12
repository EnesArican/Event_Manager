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
       check_send();
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

function time_left(){
$dbhost = 'localhost';
$dbuser = 'project';
$dbpass = 'root';
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, 'event_manager'); 
    
    $sql_u ="SELECT * FROM `events` WHERE `id`='$event_id' "; 

     $result_u = mysqli_query($conn, $sql_u );
     $array=mysqli_fetch_array($result_u,MYSQLI_NUM);  
     mysqli_free_result($result_u);
    $event=$array[2];
     $lefttime=$array[6]-time();
    if($lefttime>=86400){
        $interval=$lefttime-86400;
    }
    else{
        $interval=0;
    }
    
    
    
}

function send(){
    
$to = "$_SESSION['user_email']";
$subject = "Your Event Is Coming Soon";
$message = "Your event ".$event."is coming soon. Do forget to attend!";
$from = "wangshenbao.ben@gmail.com";
$headers = "From: $from";
mail($to,$subject,$message,$headers);


  
    
    
}
    
 function check_send(){
     if($interval<=0){
         send();
     }
     else{
         ignore_user_abort(true); 
         set_time_limit(0); 
         sleep($interval);
         send();
         ignore_user_abort(false);
     }
 }   
    
    
    
}