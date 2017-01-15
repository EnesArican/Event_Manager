<?php
/**
 * Created by PhpStorm.
 * User: enes
 * Date: 01/01/2017
 * Time: 22:29
 */

session_start();

if (isset ($_SESSION['username'])){
    echo $_SESSION['username'];

}

