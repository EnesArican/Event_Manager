<?php


define("DBENGINE", "mysql");
define("MYSQLUSER", "sid");
define("MYSQLPASS", "root");



_init();
main();
page();


function _init( )
{
    global $SID;

    $SID["CONTENT"] = "";


    // connect to the database (persistent)
    $database = 'Event_Manager';

    try {
        switch(DBENGINE) {
            case 'mysql':
                $dbh = new PDO('mysql:host=localhost;dbname=' . $database, MYSQLUSER, MYSQLPASS,
                    array( PDO::ATTR_PERSISTENT => true ));
                $dbh->exec('set character_set_client = utf8');
                $dbh->exec('set character_set_connection = utf8');
                $dbh->exec('set character_set_database = utf8');
                $dbh->exec('set character_set_results = utf8');
                $dbh->exec('set character_set_server = utf8');
                $sth = $dbh->query("SHOW VARIABLES WHERE Variable_name = 'version'");
                $SID['DBVERSION'] = 'MySQL server version ' . $sth->fetchColumn(1);
                $SID['utf8'] = TRUE;
                break;
            default:
                error('unsupported DBENGINE: ' . DBENGINE);
        }
    } catch (PDOException $e) {
        error("Error while constructing PDO object: " . $e->getMessage());
    }

    if($dbh) {
        // set exception mode for errors
        // this is far more portable for different DB engines than trying to
        // parse error codes
        $dbh->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
        $SID['dbh'] = $dbh;
    } else {
        exit();
    }

    $SID['SELF'] = $_SERVER["SCRIPT_NAME"];

}

function main()
{
    if(isset($_REQUEST['go-button'])){    // jump($_REQUEST["a"]);

        global $SID;
        $dbh = $SID['dbh'];

        $result = $dbh->query("SELECT*FROM category");

        $display = "<ul>";

        foreach ($result as $r){

            $display .=  "<li>".$r["type"]."</li>";

        }

        $display .= "</ul>";


        $SID["CONTENT"] = $display;


    }








}

function page( )
{
    global $SID;
    //set_vars();

    require_once "browser-main.php";

}



