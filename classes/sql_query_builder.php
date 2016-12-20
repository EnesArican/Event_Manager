<?php

/**
 * Created by PhpStorm.
 * User: enes
 * Date: 20/12/2016
 * Time: 20:37
 */
class SQL_query_builder{


    //public $_query;

    function get_initial_query (){

        $query = "SELECT events.event_name AS 'Event', user_info.username AS 'Host', 
                   category.type AS 'Category' , events.description AS 'Description',
                   events.location as 'Location',
                   DATE_FORMAT(events.date_time,'%d-%m-%y') AS 'Date',
                   events.remaining_tickets AS 'Tickets available',
                   DATE_FORMAT(events.sale_end_date,'%d-%m-%y') AS 'Sales End'
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

            //search keyword...... some crazy code .....
            //$query .= " ";
        }

        if (!empty ($request['category']) || $request['category'] !==""){
            $query .= " category.type = '".$request['category']."'";
        }

        if (!empty ($request['date_from']) || $request['date_from'] !==""){
          //  $query .= " category.type = '".$request['category']."'";
        }

        if (!empty ($request['date_to']) || $request['date_to'] !==""){
          //  $query .= " category.type = '".$request['category']."'";
        }


    }


    function make_search_page_query($request){

       // $_query = $this->_query;

        $_query = $this->get_initial_query();


        //get rid of button key pair
        unset($request['button']);
        if ($request['category']=="All") $request['category'] = "";


        $check = $this->check_user_input($request);


        if ($check == true) $this->modify_query($request, $_query);

             echo $_query;

            print_r($request);




    }










}