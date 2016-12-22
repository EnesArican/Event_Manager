<?php

global $SID;


require_once "classes/sql_connector.php";
require_once "classes/table_builder.php";
require_once "classes/sql_query_builder.php";


_init();
main();
page();


function _init( ){

    global $SID;

    $username = "project";
    $password = "root";

$connect = new sql_connector();
$connect->connect($username,$password);

    $SID["CONTENT"] = "";
    $SID["CATEGORY"] ="";
    $SID['SELF'] = $_SERVER["SCRIPT_NAME"];

}


function main()
{
    if(isset($_REQUEST['button'])){

        global $SID;
        $dbh = $SID['dbh'];

        //function sql query builder
        //find a way to get value of input values in form

       // print_r($_REQUEST['keyword']); //gets keyword
        //print_r($_REQUEST['category']); //gets cat
        //print_r($_REQUEST['date_from']); //gets date
        //print_r($_REQUEST['date_to']); //gets date

        $f = new SQL_query_builder();
        $result = $f->make_search_page_query($_REQUEST, $dbh);




        //sql query
        /*try {
            $result = $dbh->query("SELECT*FROM user_info");
        } catch (PDOException $e) {
            error_message($e->getMessage());
            return;
        }
        */

        //$result is returned sql query

        //Check if any result is returned
        if ($result->rowCount() > 0)  {

            $search_results = new table_builder($result);

            $display = $search_results ->make_table();

            $SID["CONTENT"] = $display;
        }
    }
}



function page( )
{
    global $SID;
    set_dropdown();

    require_once "browser-main.php";
}


function set_dropdown(){

    global $SID;
    $dbh = $SID['dbh'];

    try {
        $result = $dbh->query("SELECT DISTINCT type FROM category");
    } catch (PDOException $e) {
        error_message($e->getMessage());
        return;
    }


    $display = "<option value=\"All\">-- ALL --</option>\n";

    foreach ($result as $r){
        $display .=  "<option>".$r["type"]."</option>\n";
    }

    $SID["CATEGORY"] = $display;


/*  CODE FRMO SID -- THIS CODE KEEPS SELECTION ON PAGE RELOAD

    $a = "<option value=\"--NONE--\">-- Select Database --</option>\n";

    while ($row = $sth->fetch()) {
        $v = $row['Database'];
        foreach ($db_list as $s) {
            if ($v == $s) {
                $selected = ($v == $database) ? ' selected' : '';
                $a .= "<option$selected>$v</option>\n";
            }
*/

}










