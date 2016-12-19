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



    function __construct($row1, $result){

        $this->_row1 = $row1;
        $this->_columns = array_keys($this->_row1);
        $this->_result = $result;

    }


    function make_table(){

        $_row1 = $this->_row1;
        $_columns = $this->_columns;
        $header = $this ->table_header($_columns);
        $column_count = count($_columns);
        $_result = $this->_result;

        $first_row = $this->table_row($_row1, $_columns,$column_count);

        $all_rows = "";

        foreach ($_result as $r){
            $all_rows .= $this->table_row($r, $_columns,$column_count);
        }

        $display = "<table class=\"table\" cellspacing='0'>\n";
        $display .=$header.$first_row.$all_rows;
        $display .="</table>";

        return $display;
    }



    function table_header($columns){

        $header = "<thead><tr>\n";

        foreach ($columns as $c){
            $header .= "<th>$c</th>";
        }

        $header .= "</tr></thead>";

        return $header;
    }

    function table_row($data, $columns,$count){

        $t_row = "<tr>";

        for($i = 0; $i < $count; $i++){

            $v = $data[$columns[$i]];

            $t_row .=  "<td>$v</td>";
        }

        $t_row .= "</tr>";

        return $t_row;
    }


}