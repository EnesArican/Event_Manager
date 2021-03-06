<?php

/**
 * Created by PhpStorm.
 * User: enes
 * Date: 20/12/2016
 * Time: 20:37
 */
class SQL_query_builder{


    function make_search_page_query($request){

        $_query = $this->get_initial_query();

        //get rid of button key pair -> fixing array
        // to work with the rest of the code
        unset($request['button']);

        //if category is 'All' then make key pair empty
        if ($request['category']=="All") $request['category'] = "";

        $check = $this->check_user_input($request);

        if ($check == true)$this->modify_query($request, $_query);

       return $_query;
    }


    function get_initial_query (){

        $query = "SELECT events.event_name AS 'Event', user_info.username AS 'Host', 
                   category.type AS 'Category' , events.description AS 'Description',
                   events.location AS 'Location',
                   DATE_FORMAT(events.date_time,'%d-%m-%y') AS 'Date',
                   events.price as 'Price',
                   events.remaining_tickets AS 'Tickets available',
                   DATE_FORMAT(events.sale_end_date,'%d-%m-%y') AS 'Sales End',
                   events.id AS 'Tickets'
                   FROM events
                   INNER JOIN user_info
                   ON events.host_id = user_info.id
                   INNER JOIN category
                   ON events.category_id = category.id";

        return $query;
    }


    function check_user_input($request){

        foreach ($request as $r){

            if(!empty ($r) || ($r !== "")){
                return true;
            }
        }
        return false;
    }


    function modify_query($request, &$query){

        $query .= "\n WHERE";


        if (!empty ($request['keyword']) || $request['keyword'] !==""){
            $query .= " CONCAT(events.event_name, user_info.username, category.type,
                        events.description, events.location) 
                        LIKE '%".$request['keyword']."%'";
        }

        if (!empty ($request['category']) || $request['category'] !==""){
            $this->check_if_additional_input($query);
            $query .= " category.type = '".$request['category']."'";
        }

        if (!empty ($request['date_from']) || $request['date_from'] !==""){
            $this->correct_date_format($request['date_from']);
            $this->check_if_additional_input($query);
            $query .= " events.date_time >= '".$request['date_from']."'";
        }

        if (!empty ($request['date_to']) || $request['date_to'] !==""){
            $this->correct_date_format($request['date_to']);
            $this->check_if_additional_input($query);
            $query .= " events.date_time <= '".$request['date_to']."'";
        }


    }

    // If additional input insert 'AND' to sql query
    function check_if_additional_input(&$query){

        if(strlen($query) > 750 ) $query .= " AND";

    }

    // Put date into correct format for sql
    function correct_date_format(&$date){
        $a = explode('/',$date);
        $date = $a[2].'-'.$a[1].'-'.$a[0];
    }

}





