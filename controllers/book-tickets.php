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
    
    $sql_u ="SELECT * FROM `events` WHERE `id`='$event_id' "; // getting data from database

     $result_u = mysqli_query($conn, $sql_u );
     $array=mysqli_fetch_array($result_u,MYSQLI_NUM);  
     mysqli_free_result($result_u);
    $event=$array[2]; // event name
     $lefttime=strtotime($array[6])-time();//  time（） is the current time when user book the event.  $array[6] is the event start time.
    if($lefttime>=86400){
        $interval=$lefttime-86400;     // if the lefttime larger than 86400 which means it is more than one day. so we need ask php code sleep for these time until it is one day before the event
    }
    else{
        $interval=0;     //else intervel =0 .so in check_send function, the email will send immediately. 
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
    
 function check_send(){
     if($interval<=0){
         send();
     }
     else{
         ignore_user_abort(true); // php still working in webserve after user close the window
         set_time_limit(0); // continue do php for infinite time
         sleep($interval); // sleep for some time 
         send();//send email
         ignore_user_abort(false);// stop the php
     }
 }   
    
    
    
