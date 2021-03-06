<?php

/**
 * Created by PhpStorm.
 * User: enes
 * Date: 19/12/2016
 * Time: 17:50
 */
class sql_connector{


    function connect($username, $password){

        global $SID;

        define("DBENGINE", "mysql");
        define("MYSQLUSER", $username);
        define("MYSQLPASS", $password);


        // connect to the database (persistent)
        $database = 'event_manager';

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

                    $SID['utf8'] = TRUE;
                    break;
                default:
                    echo ('unsupported DBENGINE: ' . DBENGINE);
            }
        } catch (PDOException $e) {
           echo ("Error while constructing PDO object: " . $e->getMessage());
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
    }

    function execute_select_query($query){
        global $SID;
        $dbh = $SID['dbh'];

        try {
            $result = $dbh->query($query);
            return $result;
        } catch (PDOException $e) {
            echo ($e->getMessage());
            return;
        }
    }

    function execute_CRUD_query($query){
        global $SID;
        $dbh = $SID['dbh'];

        try {
            $conn = $dbh->prepare($query);
            $result = $conn->execute();
            return $result;
        } catch (PDOException $e) {
            echo ($e->getMessage());
            return;
        }
    }

}