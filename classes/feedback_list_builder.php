<?php


class feedback_list_builder{

    public $_result;

    function __construct($result){
        //sorts data into associative array
        $result ->setFetchMode(PDO::FETCH_ASSOC);
        $this->_result = $result;
    }

    function make_feedback_list(){

        $ordered_list = "";
        $result = $this->_result;

        foreach ($result as $item) {

            $ordered_list .= $this->build($item);
        }

        return $ordered_list;
    }



    function build($item){

        $list = "<li><article class=\"review\">"
               ."<abbr class=\"published\"><p>".$item['date']."</p></abbr>"
               ."<address class=\"author\">By&nbsp;".$item['username']."</a></address>"
               ."<div class=\"entry-content\"><p>Event Name:&nbsp;Cognition - Night of Jazz</p></div>"
               ."<div class=\"rating\"><p>Rating:&nbsp;".$item['rating']."</p></div>"
               ."<div class=\"entry-content\"><p>".$item['comment']."</p></div>";


		$list .="</li>";

        return $list;
    }

}