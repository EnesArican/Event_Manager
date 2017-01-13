<?php
require('Support.php');

$db = new Support();
$db->delete_all();

print_r($db->get_all_comments());
?>
