<?php

/**
 * Created by PhpStorm.
 * User: enes
 * Date: 27/12/2016
 * Time: 12:53
 */
class ticket_booker{

    function already_booked($sql, $event_id, $user_id){

        $query = "SELECT * FROM bookings WHERE event_id = ".$event_id." 
                   AND user_id = ".$user_id;

        $result = $sql->execute_select_query($query);

        //Check if any result is returned
        if ($result->rowCount() > 0)  {
            return true;
        }else{
            return false;
        }
    }

    function book_ticket($sql, $event_id, $user_id){

        //update remaining tickets in events
        $query = "UPDATE events SET remaining_tickets = remaining_tickets - 1
                   WHERE events.id = ".$event_id;

        $sql->execute_CRUD_query($query);


        //insert booking into booking table
        $query = "INSERT INTO bookings (event_id, user_id)
                  VALUES (".$event_id.", ".$user_id.")";

        $sql->execute_CRUD_query($query);
    }

}