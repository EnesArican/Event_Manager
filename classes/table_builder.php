<?php
/**
 * Created by PhpStorm.
 * User: enes
 * Date: 19/12/2016
 * Time: 14:49
 */


class table_builder{

    public $_row1;
    public $_columns;
    public $_result;



    function __construct($result){

        //sorts data into associative array
        $result ->setFetchMode(PDO::FETCH_ASSOC);

        //gets the 1st row of data
        $this->_row1 = $result->fetch();

        $this->_columns = array_keys($this->_row1);
        $this->_result = $result;
    }


    function make_table(){

        $_row1 = $this->_row1;
        $_columns = $this->_columns;
        $header = $this ->get_table_header($_columns);
        $column_count = count($_columns);
        $_result = $this->_result;

        $first_row = $this->get_table_row($_row1, $_columns,$column_count);

        $all_rows = "";

        foreach ($_result as $r){
            $all_rows .= $this->get_table_row($r, $_columns,$column_count);
        }

        $display = "<table class=\"table\" cellspacing='0'>\n";
        $display .=$header.$first_row.$all_rows;
        $display .="</table>";

        return $display;
    }

    function get_table_header($columns){

        $header = "<thead><tr>\n";

        foreach ($columns as $c){
            $header .= "<th>$c</th>";
        }

        $header .= "</tr></thead>";

        return $header;
    }

    function get_table_row($data, $columns,$count){

        $t_row = "<tr>";

        for($i = 0; $i < $count; $i++){

            $v = $data[$columns[$i]];

            $t_row .=  "<td>$v</td>";
        }

        $t_row .= "</tr>";

        return $t_row;
    }


}