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

    $query = "SELECT id, event_name FROM events WHERE date_time 
           >= CURDATE()+3 AND date_time < CURDATE()+4";

    $events = $sql->execute_select_query($query);


    //check if result has anything
    if ($events->rowCount() > 0)  {
        $events ->setFetchMode(PDO::FETCH_ASSOC);

        foreach($events as $e){
            find_users($e, $sql);
        }
    }
}


function find_users($event, $sql){

    $event_name = $event['event_name'];
    $event_id = $event['id'];


    $query = "SELECT user_info.email FROM user_info
              INNER JOIN bookings
              ON user_info.id = bookings.user_id
              WHERE event_id = ".$event_id;

    $user_mails = $sql->execute_select_query($query);


    if ($user_mails->rowCount() > 0)  {
        $user_mails ->setFetchMode(PDO::FETCH_ASSOC);

        foreach($user_mails as $u){
            $email = $u['email'];
           //echo $email.$event_name;
            send_mail($email, $event_name);

        }
    }

}


function send_mail($email, $event_name){



    $body = "Your event ".$event_name." is coming soon. Don't forget to attend!";

    require_once ('/usr/share/pear/Mail.php');

    $headers = array (
        'From' => 'enesarican@hotmail.com',
        'To' => $email,
        'Subject' => 'Your Event Is Coming Soon');



    $smtpParams = array (
        'host' => 'email-smtp.us-west-2.amazonaws.com',
        'port' => '587',
        'auth' => true,
        'username' => 'AKIAI2FMDBJJZKP5QDLQ',
        'password' => 'AhTF9QQfYNt6X1WEL1PwzHjSb4ZwOz3avAmA8OTW3ACr'
    );

// Create an SMTP client.
    $mail = Mail::factory('smtp', $smtpParams);

// Send the email.
    $result = $mail->send($email, $headers, $body);

    if (PEAR::isError($result)) {
        echo("Email not sent. " .$result->getMessage() ."\n");
    } else {
        echo("Email sent!"."\n");
    }

}


